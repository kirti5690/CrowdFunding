<?php
session_start();
header("Content-Type: application/json");

include_once '../model/databse.php';
include_once '../model/user.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

$contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : '';

if ($contentType === 'application/json') {
    $data = json_decode(file_get_contents("php://input"));
} else {
    $data = $_POST;
}


$action = isset($data->action) ? $data->action : (isset($data['action']) ? $data['action'] : '');


switch ($action) {
    case 'logIn':
        logIn($user, $data);
        break;
        case 'approveFundraiser':
            approveFundraiser($user, $data);
            break;
    
        case 'rejectFundraiser':
            rejectFundraiser($user, $data);
            break;
    
        case 'deleteFundraiser':
            deleteFundraiser($user, $data);
            break;

    case 'getVolunteers1':
        getVolunteers1($user);
        break;

    case 'getFundraisers1':
        getFundraisers1($user);
        break;

    case 'getDonors1':
        getDonors1($user);
        break;
        case 'getCampaigns1':
            getCampaigns1($user);
            break;
    case 'getFundraisersCount':
        getFundraisersCount($user);
        break;

    case 'getDonorsCount':
        getDonorsCount($user);
        break;

    case 'getVolunteersCount':
        getVolunteersCount($user);
        break;
        case 'deleteDonor':
            deleteDonor($user ,$data);
            break;
        case 'deleteVolunteer':
            deleteVolunteer($user,$data);
            break;
            case 'deleteCampaign':
                deleteCampaign($user,$data);
                break;
        case 'statusComplete':
            statusComplete($user,$data);
            break;
            case 'statusReply':
                statusReply($user,$data);
                break;
    case 'getCampaignsCount':
        getCampaignsCount($user);
        break;
    default:
        echo json_encode(array("message" => "Invalid action"));
}


function logIn($user, $data) {
    $user->email = $data->email;
    $inputPassword = $data->password;

    $stmt = $user->loginAdmin();
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($inputPassword === $row['password_hash']) {
            $_SESSION['admin_id'] = $row['admin_id'];
            $_SESSION['admin_username'] = $row['username'];
            
            $response = array(
                "status" => true,
                "message" => "Successfully logged in!",
                "id" => $row['admin_id'],
                "username" => $row['username'],
            );
        } else {
            $response = array(
                "status" => false,
                "message" => "Invalid Password!"
            );
        }
    } else {
        $response = array(
            "status" => false,
            "message" => "Admin not found!"
        );
    }

    echo json_encode($response);
}



// Function to get all volunteers
function getVolunteers1($user) {
    $volunteers = $user->getVolunteer1();
    echo json_encode($volunteers);
}

// Function to get all fundraisers
function getFundraisers1($user) {
    $fundraisers = $user->getFundraiser1();
    echo json_encode($fundraisers);
}

// Function to get all donors
function getDonors1($user) {
    $donors = $user->getDonors1();
    echo json_encode($donors);
}
function getCampaigns1($user) {
    $donors = $user->getCampaigns1();
    echo json_encode($donors);
}
// Function to get the count of fundraisers
function getFundraisersCount($user) {
    $count = $user->getFundraisersCount();
    echo json_encode(['totalFundraisers' => $count]);
}
function getCampaignsCount($user){
    $count = $user->getCampaignsCount();
    echo json_encode(['totalCampaigns' => $count]);
}
// Function to get the count of donors
function getDonorsCount($user) {
    $count = $user->getDonorsCount();
    echo json_encode(['totalDonors' => $count]);
}

// Function to get the count of volunteers
function getVolunteersCount($user) {
    $count = $user->getVolunteersCount();
    echo json_encode(['totalVolunteers' => $count]);
}
function approveFundraiser($user, $data) {
    $fundraiser_id = $data->fundraiser_id;
    $admin_id = $_SESSION['admin_id']; 
    $result = $user->approveFundraiser($fundraiser_id, $admin_id);
    echo json_encode(['status' => $result, 'message' => $result ? 'Fundraiser approved successfully' : 'Approval failed']);
}
function rejectFundraiser($user, $data) {
    $fundraiser_id = $data->fundraiser_id;
    $result = $user->rejectFundraiser($fundraiser_id);
    echo json_encode(['status' => $result, 'message' => $result ? 'Fundraiser rejected successfully' : 'Rejection failed']);
}
function deleteFundraiser($user, $data) {
    $result = $user->deleteFundraiser($data->id);
    echo json_encode([
        'status' => $result,'message' => $result ? 'Fundraiser deleted successfully' : 'Fundraiser deleted successfully'
    ]);
}

function deleteDonor($user, $data) {
    $result = $user->deleteDonor($data->donor_id);
    echo json_encode([
        'status' => $result,
        'message' => $result ? 'Donor deleted successfully' : 'Deletion failed'
    ]);
}
function deleteCampaign($user, $data) {
    $result = $user->deleteCampaign($data->id);
    echo json_encode([
        'status' => $result,
        'message' => $result ? 'Campaign deleted successfully' : 'Deletion failed'
    ]);
}
function deleteVolunteer($user, $data) {
    $result = $user->deleteVolunteer($data->id);
    echo json_encode([
        'status' => $result,
        'message' => $result ? 'Volunteer deleted successfully' : 'Deletion failed'
    ]);
}

function statusComplete($user, $data) {
    $id = $data->id;
    $admin_id = $_SESSION['admin_id']; 
    $result = $user->statusComplete($id, $admin_id);
    echo json_encode(['status' => $result, 'message' => $result ? 'Volunteer Project Completed' : 'Failed Changes']);
}
function statusReply($user, $data) {
    $id = $data->id;
    $admin_id = $_SESSION['admin_id']; 
    $result = $user->statusReply($id, $admin_id);
    echo json_encode(['status' => $result, 'message' => $result ? 'Replied Successfully!' : 'Failed Changes']);
}

?>
