<?php
session_start();
header("Content-Type: application/json");

include_once '../model/databse.php';
include_once '../model/user.php';
require '../vendor/autoload.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

$contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : '';

if ($contentType === 'application/json') {
    $data = json_decode(file_get_contents("php://input"));
} else {
    $data = $_POST;
}

// Determine the action
$action = isset($data->action) ? $data->action : (isset($data['action']) ? $data['action'] : '');


switch ($action) {
    case 'logIn':
        logIn($user, $data);
        break;
    case 'loginDon':
        loginDon($user, $data);
        break;
    case 'campaign':
        campaign($user);
        break;
    case 'volunteer':
        volunteer($user);
        break;
    case 'donors':
        donors($user);
        break;
    case 'fundraiser':
        fundraiser($user);
        break;
    case'getCampaignsByFundraiser':
        getCampaignsByFundraiser($user ,$data->fundraiser_id);
        break;
    case 'getCampaignDetails':
        getCampaignDetails($user, $data->id);
        break;
    case 'getCampaign':
         getCampaign($user, $data->category);
        break;
        case 'registerFund':
            registerFund($user, $data, $_FILES);
            break;
            case 'registerVol':
                registerVol($user, $data, $_FILES);
                break;
                case 'registerDon':
                    registerDon($user, $data, $_FILES);
                    break;
            case 'updateFundraiser':
                updateFundraiser($user, $data);
                break;
                case 'updateDonor':
                    updateDonor($user, $data);
                    break;
                case 'sendOTP':
                    sendOTP($user, $data);
                    break;
                case 'verifyOTP':
                    verifyOTP($user, $data);
                    break; 
                    case 'verifyOtp1':
                        verifyOtp1($user, $data);
                        break;  
                    case 'saveContact':
                         saveContact($user, $data);
                        
                        break;      
    case 'changePasswordDon':
        changePasswordDon($user, $data);
        break;
        case 'changePasswordFun':
            changePasswordFun($user, $data);
            break;
            case 'createCampaign':
                $response = createCampaign($user, $_POST, $_FILES);
                echo json_encode($response);
                break;
            case 'updateCampaign':
                $response = updateCampaign($user, $data, $_FILES);
                echo json_encode($response);
                break;  
   case 'getCampaignsByDonor':
         getCampaignsByDonor($user, $data->donorId);
                break;
                case 'makeDonation':
                    makeDonation($user, $data);
                    break;
                    case 'getVolunteerStats':
                        getVolunteerStats($user);
                        break;
    default:
        echo json_encode(array("message" => "Invalid action"));
}

function logIn($user, $data) {
    $user->id = $data->email;
    $user->password = $data->password_hash;

    $stmt = $user->login();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user->password===$row['password_hash']) {
         
            $_SESSION['user_id'] = $row['fundraiser_id'];
            $_SESSION['username'] = $row['username']; 
            $_SESSION['email']=$row['email'];
            $_SESSION['role']='fundraiser';
            $response = array(
                "status" => true,
                "message" => "Successfully logged in!",
                "id" => $row['fundraiser_id'],
                "username" => $row['username'],
            );
        } 
        else {
            $response = array(
                "status" => false,
                "message" => "Invalid  Password!"
            );
        }
    } 
    else {
        $response = $stmt;
    }

    echo json_encode($response);
}


function loginDon($user, $data) {
    $user->id = $data->email;
    $user->password = $data->password_hash;

    $stmt = $user->loginDon();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user->password === $row['password_hash']) {
            $_SESSION['user_id'] = $row['donor_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role']='donor';
            $response = array(
                "status" => true,
                "message" => "Successfully Login!",
                "id" => $row['donor_id'],
                "username" => $row['username']
            );
        } else {
            $response = array(
                "status" => false,
                "message" => "Invalid  Password!"
            );
        }
    } else {
        $response = array(
            "status" => false,
            "message" => "Invalid Username and Password!"
        );
    }

    echo json_encode($response);
}

function campaign($user) {
    $stmt = $user->getCampaigns();
    $num = $stmt->rowCount();

    if ($num > 0) {
        $campaigns_arr = array();

        
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $campaign_item = array(
                    "id" => $campaign_id,
                    "category" => $category,
                    "photo" => $photo,
                    "title" => $title,
                    "description" => $description,
                    "goal_amount" => $goal_amount,
                    "raised_amount" => $raised_amount
                );
                array_push($campaigns_arr, $campaign_item);
            }
        

        echo json_encode($campaigns_arr);
    } 
    else {
        echo json_encode(array());
    }
}

function volunteer($user) {
    $stmt = $user->getVolunteer();
    $num = $stmt->rowCount();

    if ($num > 0) {
        $volunteers_arr = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $volunteer_item = array(
                "bio_description" => $bio_description,
                "photo" => $photo,
                "name" => $name,
                "occupation" => $occupation
            );
            array_push($volunteers_arr, $volunteer_item);
        }

        echo json_encode($volunteers_arr);
    } else {
        echo json_encode(array());
    }
}

function donors($user) {
    $stmt = $user->getDonors();
    $num = $stmt->rowCount();
    
    if ($num > 0) {
        $donors_arr = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $donor_item = array(
                "id"=>$donor_id,
                "description" => $description,
                "photo" => $photo,
                "username" => $username,
                "occupation" => $occupation
            );
            array_push($donors_arr, $donor_item);
        }

        echo json_encode($donors_arr);
    } else {
        echo json_encode(array());
    }
}
function fundraiser($user) {
    $stmt = $user->getFundraiser();
    $num = $stmt->rowCount();

    if ($num > 0) {
        $fundraisers_arr = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $fundraiser_item = array(
                "fundraiser_id" => $fundraiser_id,
                "username" => $username,
                "profile_picture" => $profile_picture, 
                "organization_name" => $organization_name,
                "contact_information" => $contact_information,
                "description" => $description,
                "email" => $email
            );
            array_push($fundraisers_arr, $fundraiser_item);
        }

        echo json_encode($fundraisers_arr);
    } else {
        echo json_encode(array());
    }
}
function getCampaignsByFundraiser( $user ,$fundraiser_id) {
    
    $stmt = $user->getCampaignsByFundraiser($fundraiser_id);
    $num = $stmt->rowCount();

    if ($num > 0) {
        $campaigns_arr = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $campaign_item = array(
                "id" => $campaign_id,
                "title" => $title,
                "photo" => $photo,
                "category" => $category,
                "raised_amount" => $raised_amount,
                "goal_amount" => $goal_amount
            );
            array_push($campaigns_arr, $campaign_item);
        }

        echo json_encode($campaigns_arr);
    } else {
        echo json_encode(array());
    }
}

function getCampaignDetails($user, $id) {
    $stmt = $user->getCampaignDetails($id);
    $num = $stmt->rowCount();

    if ($num > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $campaign_details = array(
            "id" => $row['campaign_id'],
            "category" => $row['category'],
            "photo" => $row['photo'],
            "title" => $row['title'],
            "description" => $row['description'],
            "start_date" => $row['start_date'],
            "end_date" => $row['end_date'],
            "goal_amount" => $row['goal_amount'],
            "raised_amount" => $row['raised_amount'],
            "more_about"=>$row['more_about']
        );
        echo json_encode($campaign_details);
    } else {
        echo json_encode(array("error" => "Campaign not found"));
    }
}
function getCampaign($user, $category) {
    $stmt = $user->getCampaignbyCategory($category);
    $num = $stmt->rowCount();

    if ($num > 0) {
        $campaigns_arr = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $campaign_item = array(
                "id" => $row['campaign_id'],
                "category" => $row['category'],
                "photo" => $row['photo'],
                "title" => $row['title'],
                "description" => $row['description'],
                "start_date" => $row['start_date'],
                "end_date" => $row['end_date'],
                "goal_amount" => $row['goal_amount'],
                "raised_amount" => $row['raised_amount']
            );
            array_push($campaigns_arr, $campaign_item);
        }

        echo json_encode($campaigns_arr);
    } else {
        echo json_encode(array("error" => "Campaigns not found"));
    }
}



function createCampaign($user, $postData, $fileData) {
    // Ensure the session is active and the user is logged in
    if (!isset($_SESSION['user_id'])) {
        return ['status' => false, 'message' => 'User not logged in'];
    }

    // Validate and process the file upload
    if (isset($fileData['image']) && $fileData['image']['error'] == UPLOAD_ERR_OK) {
        $file = $fileData['image'];
        $uploadDir = '../assets/images/campaign/';
        $fileName = basename($file['name']);
        $uploadFile = $uploadDir . $fileName;

        // Move uploaded file to the desired directory
        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            // Prepare campaign data
            $campaignData = [
                'title' => $postData['title'],
                'description' => $postData['description'],
                'goal' => $postData['goal'],
                
                'status' => $postData['status'],
                'category' => $postData['category'],
                'start' => $postData['start'],
                'end' => $postData['end'],
                'image' => $fileName
            ];

            // Call the User model function to save campaign data
            if ($user->createCampaign($campaignData)) {
                return ['status' => true, 'message' => 'Campaign created successfully!'];
            } 
            else {
                return ['status' => false, 'message' => 'Failed to create the campaign ,You are not approved by the Admin'];
            }
        } else {
            return ['status' => false, 'message' => 'Failed to upload image'];
        }
    } else {
        return ['status' => false, 'message' => 'No image uploaded or upload error'];
    }
}


function updateCampaign($user, $data, $files) {
    $campaignId = $data['campaign_id'];
    $title = $data['title'];
    $description = $data['description'];
    $goal = $data['goal'];
    $endDate = $data['end'];
    $imageName = '';

    // Handle image upload
    if (!empty($files['image']['name'])) {
        $image = $files['image'];
        $imageTmpName = $image['tmp_name'];
        $imageName = basename($image['name']);
        $targetDir = '../assets/images/campaign/';
        $targetFilePath = $targetDir . $imageName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($imageTmpName, $targetFilePath)) {
            // File uploaded successfully
        } else {
            // Handle error
            echo json_encode([
                "status" => false,
                "message" => "Failed to upload image."
            ]);
            return;
        }
    } else {
        // If no new image, keep the old one
        $imageName = $data['existing_image']; // This should be provided in the form if you want to keep the old image
    }

    // Update campaign details
    $response = $user->updateCampaign($campaignId, $title, $description, $goal, $endDate, $imageName);

    if ($response) {
        echo json_encode([
            "status" => true,
            "message" => "Campaign updated successfully."
        ]);
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Failed to update campaign."
        ]);
    }
}





function registerFund($user, $data, $files) {
    $user->username = $data['username'];
    $user->email = $data['email'];
    $user->password = $data['password']; 
    $user->contact_information = $data['contact_information'];
    $user->organization_name = $data['organization_name'];
    $user->description = $data['description'];
    $user->adhaar_number=$data['adhaar_number'];
    $email= $data['email'];
    
    $profile_picture = $files['profile_picture'];
    $targetDir = "../assets/images/fundraiser/";
    $fileName = basename($profile_picture['name']); 
    $targetFile = $targetDir . $fileName; 
    
    $valid_extensions = array("jpg", "jpeg", "png", "gif");
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (!in_array($imageFileType, $valid_extensions)) {
        echo json_encode(array("status" => false, "message" => "Invalid image file type. Please upload a JPG, JPEG, PNG, or GIF."));
        return;
    }
    
    
    if (move_uploaded_file($profile_picture['tmp_name'], $targetFile)) {
        $user->profile_picture = $fileName; 
    } else {
        echo json_encode(array("status" => false, "message" => "There was an error uploading the image."));
        return;
    }

    
    if ($user->registerFund()) {
        echo json_encode(array("status" => true, "message" => "Registration successful!"));
        $otp = rand(100000, 999999); 
        $_SESSION['otp'] = $otp;
        $_SESSION['otp_expiry'] = time() + 300; 
        $_SESSION['email'] = $email;

        
        $mail = new PHPMailer(true);
        try {
          
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;                                 
            $mail->Username   = 'ks6741948@gmail.com';               
            $mail->Password   = 'oewr rvct hjqu ilhx';                       
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        
            $mail->Port       = 587;                                 

            
            $mail->setFrom('ks6741948@gmail.com', 'Your Website');
            $mail->addAddress($email);                               

            
            $mail->isHTML(true);                                  
            $mail->Subject = 'Your OTP Code';
            $mail->Body    = "Your OTP code is: $otp";

            $mail->send();
            echo json_encode(array("status" => true, "message" => "OTP sent to your email"));
        } 
        catch (Exception $e) {
            echo json_encode(array("status" => false, "message" => "Failed to send OTP. Mailer Error: " . $mail->ErrorInfo));
        }

    } else {
        echo json_encode(array("status" => false, "message" => "Registration failed. Please try again."));
    }
}
 




function getCampaignsByDonor($user, $donorId) {
    $stmt = $user->getCampaignsByDonor($donorId);
    $num = $stmt->rowCount();

    if ($num > 0) {
        $campaigns_arr = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $campaign_item = array(
                "id" => $row['campaign_id'],
                "title" => $row['title'],
                "photo" => $row['photo'],
                "category" => $row['category'],
                "raised_amount" => $row['raised_amount'],
                "goal_amount" => $row['goal_amount']
            );
            array_push($campaigns_arr, $campaign_item);
        }

        echo json_encode($campaigns_arr);
    } else {
        echo json_encode(array());
    }
}

function changePasswordDon($user, $data) {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['success' => false, 'message' => 'User not logged in']);
        exit();
    }

    $user->id = $_SESSION['user_id'];
    $user->oldPassword = $data->password;
    $user->newPassword = $data->newpass;
    $email=$_SESSION['email'];

    if ($user->changePasswordDon()) {
        echo json_encode([
            "status" => true,
            "message" => "Password changed successfully!"
        ]);
        
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'ks6741948@gmail.com';
            $mail->Password   = 'oewr rvct hjqu ilhx';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

           $mail->setFrom('ks6741948@gmail.com', 'Your Website');
           $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Your password has changed!';
            $mail->Body    = "Dear user,<br><br>Your password is changed successfully.<br><br>Best regards,<br>Qrowd Team";

            $mail->send();
        } catch (Exception $e) {
           
            error_log("Mailer Error: " . $mail->ErrorInfo);
        }

    } else {
        echo json_encode([
            "status" => false,
            "message" => "Failed to change the password"
        ]);
    }
}
function changePasswordFun($user, $data) {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['success' => false, 'message' => 'User not logged in']);
        exit();
    }

    $user->id = $_SESSION['user_id'];
    $user->oldPassword = $data->password;
    $user->newPassword = $data->newpass;
    $email=$_SESSION['email'];

    if ($user->changePasswordFun()) {
        echo json_encode([
            "status" => true,
            "message" => "Password changed successfully!"
        ]);
    
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'ks6741948@gmail.com';
            $mail->Password   = 'oewr rvct hjqu ilhx';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

           $mail->setFrom('ks6741948@gmail.com', 'Your Website');
           $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Your password has changed!';
            $mail->Body    = "Dear user,<br><br>Your password is changed successfully.<br><br>Best regards,<br>Qrowd Team";

            $mail->send();
        } catch (Exception $e) {
           
            error_log("Mailer Error: " . $mail->ErrorInfo);
        }

    } 
    else {
        echo json_encode([
            "status" => false,
            "message" => "Failed to change the password"
        ]);
    }
}


function updateFundraiser($user, $data) {
    $user->username = $data->username;
    $user->email = $data->email;
    $user->contact_information = $data->contact_information;
    $user->organization_name = $data->organization_name;
    $user->description = $data->description;

    if ($user->updateFundraiser()) {
        echo json_encode(array("status" => true, "message" => "Fundraiser details updated successfully!"));
    } else {
        echo json_encode(array("status" => false, "message" => "Failed to update fundraiser details."));
    }
}
function sendOTP($user, $data) {
    $email = $data->email;
    $user->email = $email;

    if ($user->emailExists()) {
        $otp = rand(100000, 999999); 
        $_SESSION['otp'] = $otp;
        $_SESSION['otp_expiry'] = time() + 300; 
        $_SESSION['email'] = $email;

        
        $mail = new PHPMailer(true);
        try {
          
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;                                 
            $mail->Username   = 'ks6741948@gmail.com';               
            $mail->Password   = 'oewr rvct hjqu ilhx';                       
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        
            $mail->Port       = 587;                                 

            
            $mail->setFrom('ks6741948@gmail.com', 'Your Website');
            $mail->addAddress($email);                               

            //Content
            $mail->isHTML(true);                                  
            $mail->Subject = 'Your OTP Code';
            $mail->Body    = "Your OTP code is: $otp";

            $mail->send();
            echo json_encode(array("status" => true, "message" => "OTP sent to your email"));
        } 
        catch (Exception $e) {
            echo json_encode(array("status" => false, "message" => "Failed to send OTP. Mailer Error: " . $mail->ErrorInfo));
        }
    } else {
        echo json_encode(array("status" => false, "message" => "Email not found"));
    }
}


function verifyOTP($user, $data) {
    $otp = $data->otp;
    $new_password = $data->new_password;
    if (isset($_SESSION['otp']) && $_SESSION['otp'] == $otp && time() < $_SESSION['otp_expiry']) {
        $email = $_SESSION['email'];
        $user->email = $email;

       

        if ($user->updatePassword($new_password)) {
            // Clear OTP session data
            unset($_SESSION['otp']);
            unset($_SESSION['otp_expiry']);
            unset($_SESSION['email']);
            
            echo json_encode(array("status" => true, "message" => "Password updated successfully"));
        } else {
            echo json_encode(array("status" => false, "message" => "Failed to update password"));
        }
    } else {
        echo json_encode(array("status" => false, "message" => "Invalid or expired OTP"));
    }
}


function makeDonation($user, $data) {
    $donationData = [
        'campaign_id' => $data->campaign_id,
        'donor_id' => $data->donor_id,
        'amount' => $data->amount,
        'message' => 'Completed'
    ];

    $response = $user->donate($donationData);

   
    if ($response['status']) {
       
        $donorEmail = $user->getDonorEmail($data->donor_id);
        $donorName = $user->getDonorName($data->donor_id);
        
       
        $campaignTitle = $user->getCampaignTitle($data->campaign_id);

        
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'ks6741948@gmail.com';
            $mail->Password   = 'oewr rvct hjqu ilhx';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

           $mail->setFrom('ks6741948@gmail.com', 'Your Website');
           $mail->addAddress($donorEmail, $donorName);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Thank You for Your Donation!';
            $mail->Body    = "Dear $donorName,<br><br>Thank you for your generous donation of $$data->amount to the '$campaignTitle' campaign. We truly appreciate your support!<br><br>Best regards,<br>Your Website Team";

            $mail->send();
        } catch (Exception $e) {
           
            error_log("Mailer Error: " . $mail->ErrorInfo);
        }
    }

    echo json_encode($response);
}


function updateDonor($user, $data) {
    $user->username = $data->username;
    $user->email = $data->email;
    $user->contact_information = $data->contact_information;
    $user->occupation = $data->organization_name;
    $user->description = $data->description;

    if ($user->updateDonor()) {
        echo json_encode(array("status" => true, "message" => "Fundraiser details updated successfully!"));
    } else {
        echo json_encode(array("status" => false, "message" => "Failed to update fundraiser details."));
    }
}
function getVolunteerStats($user) {
    $response = $user->getVolunteerStats();
    echo json_encode($response);
}

function registerVol($user, $data, $files) {
    $user->username = $data['username'];
    $user->email = $data['email'];
    $user->occupation = $data['occupation'];
    $user->address = $data['address'];
    $user->description = $data['description'];
    
    $photo = $files['photo'];
    $targetDir = "../assets/images/volunteer/";
    $fileName = basename($photo['name']); 
    $targetFile = $targetDir . $fileName; 
    
    $valid_extensions = array("jpg", "jpeg", "png", "gif");
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (!in_array($imageFileType, $valid_extensions)) {
        echo json_encode(array("status" => false, "message" => "Invalid image file type. Please upload a JPG, JPEG, PNG, or GIF."));
        return;
    }
    
    
    if (move_uploaded_file($photo['tmp_name'], $targetFile)) {
        $user->photo = $fileName; // Store only the file name in the database
    } else {
        echo json_encode(array("status" => false, "message" => "There was an error uploading the image."));
        return;
    }

    
    if ($user->registerVol()) {
        echo json_encode(array("status" => true, "message" => "Registration successful!"));
    } else {
        echo json_encode(array("status" => false, "message" => "Registration failed. Please try again."));
    }
}
function saveContact($user, $data) {
    $name = $data->name;
    $email = $data->email;
    $phone = $data->phone;
    $subject = $data->subject;
    $message = $data->message;

    if ($user->saveContact($name, $email, $phone, $subject, $message)) {
        echo json_encode(array("status" => true, "message" => "Message sent successfully!"));
    } else {
        echo json_encode(array("status" => false, "message" => "Failed to send message. Please try again."));
    }
}

function registerDon($user, $data, $files) {
    $user->username = $data['username'];
    $user->email = $data['email'];
    $user->password_hash=$data['password'];
    $user->contact_information=$data['contact_information'];
    $user->occupation = $data['occupation'];
    $user->description = $data['description'];
    
    $photo = $files['photo'];
    $targetDir = "../assets/images/donors/";
    $fileName = basename($photo['name']); 
    $targetFile = $targetDir . $fileName; 
    
    $valid_extensions = array("jpg", "jpeg", "png", "gif");
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (!in_array($imageFileType, $valid_extensions)) {
        echo json_encode(array("status" => false, "message" => "Invalid image file type. Please upload a JPG, JPEG, PNG, or GIF."));
        return;
    }
    
    
    if (move_uploaded_file($photo['tmp_name'], $targetFile)) {
        $user->photo = $fileName; // Store only the file name in the database
    } else {
        echo json_encode(array("status" => false, "message" => "There was an error uploading the image."));
        return;
    }

    
    if ($user->registerDon()) {
        echo json_encode(array("status" => true, "message" => "Registration successful!"));
    } else {
        echo json_encode(array("status" => false, "message" => "Registration failed. Please try again."));
    }
}
?>

