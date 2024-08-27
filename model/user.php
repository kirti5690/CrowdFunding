<?php
class user{
    private $conn;
    public $table_name = "campaigns";
   
    public $id;
    public $username;
    public $email;
    public $password_hash;
    public $profile_picture;
    public $contact_information;
    public $organization_name;
    public $description;
    public $start_date;
    public $end_date;
    public $oldPassword;
    public $newPassword;
    public $category;
    public $occupation;
    public $photo;
    public $address;
    public $adhaar_number;
    private $table_fundraisers = "fundraisers";
    private $table_donors = "donors";
    private $table_volunteers = "volunteers";
    private $table_admins = "admins";

  

    public function __construct($db) {
        $this->conn = $db;
    }
     




    public function loginDon() {
        $query = "SELECT donor_id ,username, email, password_hash FROM  donors WHERE email = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt;
    }
    public function getCampaigns() {
        $query = "SELECT campaign_id, category, photo, title, description, goal_amount, raised_amount, status 
        FROM " . $this->table_name . " 
        WHERE status = 'Active' 
        ORDER BY campaign_id DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getVolunteer() {
        $query = "SELECT id, bio_description, photo, name, occupation FROM volunteers where status='Completed'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function getDonors(){
        $query = "SELECT  donor_id, email, contact_information, description, photo, username, occupation FROM donors";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function getFundraiser(){
        $query = "SELECT * FROM fundraisers"; 
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function getCampaignsByFundraiser($fundraiser_id) {
        $query = "SELECT * FROM campaigns WHERE fundraiser_id = :fundraiser_id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':fundraiser_id', $fundraiser_id);
        $stmt->execute();
        return $stmt;
    }
    
    public function getCampaignDetails($id) {
        $query = "SELECT * FROM campaigns WHERE campaign_id = :id and status = 'Active'  ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt;
    }
    public function getCampaignbyCategory($category){
        $query="SELECT * FROM campaigns WHERE category=:category and status = 'Active' ";
        $stmt= $this->conn->prepare($query);
        $stmt->bindParam(':category',$category);
        $stmt->execute();
        return $stmt;
    }
   
    public function getProfile() {
        $query = "SELECT  username, email, profile_picture, contact_information, organization_name, description FROM fundraisers WHERE fundraiser_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt;
    }

    public function getCampaignPro() {
        $query = "SELECT * FROM campaigns WHERE fundraiser_id = :fundraiser_id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':fundraiser_id', $this->id);
        $stmt->execute();
        return $stmt;
    }
  
   

    public function createCampaign($data) {
       
        $query1 = "SELECT status FROM fundraisers WHERE fundraiser_id = :fundraiser_id";
        $stmt1 = $this->conn->prepare($query1);
        $stmt1->bindParam(':fundraiser_id', $_SESSION['user_id']);
        $stmt1->execute();
        
        $fundraiser = $stmt1->fetch(PDO::FETCH_ASSOC);
    
        // If the status is not 'Approved', return false or handle the error
        if ($fundraiser['status'] !== 'Approved') {
            return false; // You can return a message or handle this case differently
        }
    
        // If the status is 'Approved', proceed to create the campaign
        $query2 = "INSERT INTO campaigns (title, description, goal_amount, raised_amount, status, category, start_date, end_date, photo, fundraiser_id) 
                   VALUES (:title, :description, :goal, 0, :status, :category, :start, :end, :image, :fundraiser_id)";
        $stmt2 = $this->conn->prepare($query2);
    
        $stmt2->bindParam(':title', $data['title']);
        $stmt2->bindParam(':description', $data['description']);
        $stmt2->bindParam(':goal', $data['goal']);
       
        $stmt2->bindParam(':status', $data['status']);
        $stmt2->bindParam(':category', $data['category']);
        $stmt2->bindParam(':start', $data['start']);
        $stmt2->bindParam(':end', $data['end']);
        $stmt2->bindParam(':image', $data['image']);
        $stmt2->bindParam(':fundraiser_id', $_SESSION['user_id']);
    
        return $stmt2->execute();
    }
    

public function updateCampaign($campaignId, $title, $description, $goal, $endDate, $imageName) {
    $query = "UPDATE campaigns SET title = :title, description = :description, goal = :goal, end_date = :end_date, photo = :image WHERE campaign_id = :campaign_id";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':goal', $goal);
    $stmt->bindParam(':end_date', $endDate);
    $stmt->bindParam(':image', $imageName);
    $stmt->bindParam(':campaign_id', $campaignId);

    return $stmt->execute();
}


public function registerDon() {
    $query = "INSERT INTO donors (username, email, password_hash, contact_information, occupation, description, photo) 
              VALUES (:username, :email, :password, :contact_information, :occupation, :description, :photo)";
    
    $stmt = $this->conn->prepare($query);

    // Sanitize
    $this->username = htmlspecialchars(strip_tags($this->username));
    $this->email = htmlspecialchars(strip_tags($this->email));
    $this->password_hash = htmlspecialchars(strip_tags($this->password_hash));
    $this->contact_information = htmlspecialchars(strip_tags($this->contact_information));
    $this->occupation = htmlspecialchars(strip_tags($this->occupation));
    $this->description = htmlspecialchars(strip_tags($this->description));
  

    $this->photo = htmlspecialchars(strip_tags($this->photo));

    // Bind data
    $stmt->bindParam(":username", $this->username);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":password", $this->password_hash);
    $stmt->bindParam(":contact_information", $this->contact_information);
    $stmt->bindParam(":occupation", $this->occupation);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":photo", $this->photo);

    if ($stmt->execute()) {
        return true;
    }

    return false;
}

public function registerFund() {
    $query = "INSERT INTO fundraisers (username, email, password_hash, contact_information, organization_name, description, adhaar_number, profile_picture, status) 
              VALUES (:username, :email, :password, :contact_information, :organization_name, :description, :adhaar_number, :profile_picture, 'Pending')";
    
    $stmt = $this->conn->prepare($query);

    // Sanitize
    $this->username = htmlspecialchars(strip_tags($this->username));
    $this->email = htmlspecialchars(strip_tags($this->email));
    $this->password = htmlspecialchars(strip_tags($this->password));
    $this->contact_information = htmlspecialchars(strip_tags($this->contact_information));
    $this->organization_name = htmlspecialchars(strip_tags($this->organization_name));
    $this->description = htmlspecialchars(strip_tags($this->description));
    $this->adhaar_number = htmlspecialchars(strip_tags($this->adhaar_number));
    $this->profile_picture = htmlspecialchars(strip_tags($this->profile_picture));

    // Bind data
    $stmt->bindParam(":username", $this->username);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(":contact_information", $this->contact_information);
    $stmt->bindParam(":organization_name", $this->organization_name);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":adhaar_number", $this->adhaar_number);
    $stmt->bindParam(":profile_picture", $this->profile_picture);

    if ($stmt->execute()) {
        return true;
    }

    return false;
}

    public function registerVol() {
        $query = "INSERT INTO volunteers (name,bio_description, occupation,email, address, photo ,hours,status) 
                  VALUES (:username, :description, :occupation, :email,  :address, :photo,10,'Not Completed')";
        
        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->address = htmlspecialchars(strip_tags($this->address));
        $this->occupation = htmlspecialchars(strip_tags($this->occupation));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->photo = htmlspecialchars(strip_tags($this->photo));

        // Bind data
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":occupation", $this->occupation);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":photo", $this->photo);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }


    public function getCampaignsByDonor($donorId) {
        $query = "SELECT c.campaign_id, c.title, c.photo, c.category, c.raised_amount, c.goal_amount 
                  FROM campaigns c 
                  INNER JOIN donations d ON c.campaign_id = d.campaign_id 
                  WHERE d.donor_id = :donor_id";
    
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':donor_id', $donorId);
        $stmt->execute();
    
        return $stmt;
    }
    public function getDonationsByDonor($donorId) {
        $query = "SELECT d.donation_id, d.campaign_id, d.amount, d.donation_date, d.message, 
                         c.title, c.photo, c.goal_amount, c.raised_amount
                  FROM donations d
                  INNER JOIN campaigns c ON d.campaign_id = c.campaign_id
                  WHERE d.donor_id = :donor_id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':donor_id', $donorId);
        $stmt->execute();
        
        return $stmt;
    }
    public function changePasswordDon() {
        $query = "SELECT password_hash FROM donors WHERE donor_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
            if ($this->oldPassword == $row['password_hash']) {
                
               
    
                $query = "UPDATE donors SET password_hash = :newPassword WHERE donor_id = :id";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':newPassword', $this->newPassword);
                $stmt->bindParam(':id', $this->id);
                return $stmt->execute();
            } 
            else {
                return false; 
            }
        } 
        else {
            return false;
        }
    }
    public function changePasswordFun() {
        $query = "SELECT * FROM fundraisers WHERE fundraiser_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
            if ($this->oldPassword == $row['password_hash']) {
                $query = "UPDATE fundraisers SET password_hash = :newPassword WHERE fundraiser_id = :id";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':newPassword', $this->newPassword);
                $stmt->bindParam(':id', $this->id);
                return $stmt->execute();
            } 
            else {
                return false; 
            }
        } 
        else {
            return false;
        }
    }
    
   
    public function updateFundraiser() {
        $query = "UPDATE fundraisers SET 
                    username = :username, 
                    email = :email, 
                    contact_information = :contact_information,
                    organization_name = :organization_name,
                    description = :description
                  WHERE fundraiser_id = :id";
        
        $stmt = $this->conn->prepare($query);
    
        // Bind the data
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':contact_information', $this->contact_information);
        $stmt->bindParam(':organization_name', $this->organization_name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':id', $_SESSION['user_id']);
        // Execute the query
        return $stmt->execute();
    }
    
    public function updateDonor() {
        $query = "UPDATE donors SET 
                    username = :username, 
                    email = :email, 
                    contact_information = :contact_information,
                    occupation = :organization_name,
                    description = :description
                  WHERE donor_id = :id";
        
        $stmt = $this->conn->prepare($query);
    
        // Bind the data
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':contact_information', $this->contact_information);
        $stmt->bindParam(':organization_name', $this->occupation);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':id', $_SESSION['user_id']);
        // Execute the query
        return $stmt->execute();
    }
    

    public function emailExists() {
        $query = "SELECT fundraiser_id FROM fundraisers WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function updatePassword($new_password) {
        $query = "UPDATE fundraisers SET password_hash = :password WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':password', $new_password);
        $stmt->bindParam(':email', $this->email);
        return $stmt->execute();
    }
    public function donate($data) {
        try {
            $this->conn->beginTransaction();
    
            // Insert the donation
            $query = "INSERT INTO donations (campaign_id, donor_id, amount, donation_date, message) 
                      VALUES (:campaign_id, :donor_id, :amount, NOW(), :message)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':campaign_id', $data['campaign_id']);
            $stmt->bindParam(':donor_id', $data['donor_id']);
            $stmt->bindParam(':amount', $data['amount']);
            $stmt->bindParam(':message', $data['message']);
            $stmt->execute();
    
            // Update the campaign's goal amount and raised amount
            $query = "UPDATE campaigns 
                      SET goal_amount = goal_amount - :amount, 
                          raised_amount = raised_amount + :amount
                      WHERE campaign_id = :campaign_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':amount', $data['amount']);
            $stmt->bindParam(':campaign_id', $data['campaign_id']);
            $stmt->execute();
    
            $this->conn->commit();
    
            return [
                'status' => true,
                'message' => 'Donation successful'
            ];
        } catch (Exception $e) {
            $this->conn->rollBack();
            return [
                'status' => false,
                'message' => 'Failed to donate: ' . $e->getMessage()
            ];
        }
    }
    
    public function loginAdmin() {
        $query = "SELECT admin_id, username, password_hash FROM admins WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
    
        return $stmt;
    }

    public function login() {
        $query = "SELECT fundraiser_id, username ,email, password_hash FROM  fundraisers WHERE email = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt;
    }
    function getPendingFundraisers() {
    
        $query = "SELECT * FROM fundraisers WHERE status='Pending'";
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function getApprovedFundraisers() {

        $query = "SELECT f.*, af.approved_at, af.status 
                  FROM approvedfundraisers af
                  JOIN fundraisers f ON af.fundraiser_id = f.fundraiser_id";
              $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
     public function approveFundraiser($fundraiser_id, $admin_id) {
         
        $this->conn->beginTransaction();
        try { 
        $query1 = "INSERT INTO approvedfundraisers (fundraiser_id, admin_id, approved_at, status)
                   VALUES (:fundraiser_id, :admin_id, NOW(), 'Approved')";
        
                   $stmt1 = $this->conn->prepare($query1);
                   $stmt1->bindParam(':fundraiser_id', $fundraiser_id);
                   $stmt1->bindParam(':admin_id', $admin_id);
                   $stmt1->execute();
        
       
        $query2 = "UPDATE fundraisers SET status = 'Approved' WHERE fundraiser_id = :fundraiser_id";
        
        $stmt2 = $this->conn->prepare($query2);
        $stmt2->bindParam(':fundraiser_id', $fundraiser_id);
        $stmt2->execute();

        $this->conn->commit();
        return true; 
      } catch (Exception $e) {
          
        $this->conn->rollBack();
        return false;
      }
    }
    
    
    function rejectFundraiser($fundraiser_id) {
       
        $query = " UPDATE fundraisers SET status='Rejected' WHERE fundraiser_id=:fundrasier_id";
        
       
        $stmt = $this->conn->prepare($query);
    
     
        $stmt->bindParam(':fundraiser_id', $fundraiser_id);
        $stmt->bindParam(':admin_id', $_SESSION['admin_id']); 
    
        $stmt->execute();
        return $stmt;
    }
    
    public function deleteFundraiser($id) {
       
        $this->conn->beginTransaction();
        
        try {
            
            $query1 = "DELETE FROM approvedfundraisers WHERE fundraiser_id = :fundraiser_id";
            $stmt1 = $this->conn->prepare($query1);
            $stmt1->bindParam(':fundraiser_id', $id);
            $stmt1->execute();
            
           
            $query2 = "DELETE FROM fundraisers WHERE fundraiser_id = :fundraiser_id";
            $stmt2 = $this->conn->prepare($query2);
            $stmt2->bindParam(':fundraiser_id', $id);
            $stmt2->execute();
            
           
            $this->conn->commit();
            
            return true;
        } 
        catch (Exception $e) {
          
            $this->conn->rollBack();
            return false;
        }
    }
    
   
    public function deleteDonor($donor_id) {
       
        $this->conn->beginTransaction();
    
        try {
            // First, delete associated donations
            $query1 = "DELETE FROM donations WHERE donor_id = :donor_id";
            $stmt1 = $this->conn->prepare($query1);
            $stmt1->bindParam(":donor_id", $donor_id);
            $stmt1->execute();
        
            // Then, delete the donor
            $query2 = "DELETE FROM " . $this->table_donors . " WHERE donor_id = :donor_id";
            $stmt2 = $this->conn->prepare($query2);
            $stmt2->bindParam(":donor_id", $donor_id);
            $stmt2->execute();
    
           
            $this->conn->commit();
            return true;
        } catch (Exception $e) {
           
            $this->conn->rollBack();
            return false;
        }
    }
    
    
    public function deleteVolunteer($id) {
        $query = "DELETE FROM " . $this->table_volunteers . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
    public function deleteCampaign($id) {
        try {
            
            $query1 = "DELETE FROM donations WHERE campaign_id = :id";
            $stmt1 = $this->conn->prepare($query1);
            $stmt1->bindParam(":id", $id);
            $stmt1->execute();
        
            $query = "DELETE FROM campaigns WHERE campaign_id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
    
           
            $this->conn->commit();
            return true;
        } catch (Exception $e) {
           
            $this->conn->rollBack();
            return false;
        }

   
    }

    public function getVolunteer1() {
        $query = "SELECT * FROM " . $this->table_volunteers;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCampaigns1() {
        $query = "SELECT * FROM campaigns";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

  
    public function getFundraiser1() {
        $query = "SELECT * FROM " . $this->table_fundraisers;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDonors1() {
        $query = "SELECT * FROM " . $this->table_donors;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

   
    public function getFundraisersCount() {
        $query = "SELECT COUNT(*) AS totalFundraisers FROM " . $this->table_fundraisers;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['totalFundraisers'];
    }
    public function getCampaignsCount() {
        $query = "SELECT COUNT(*) AS totalCampaigns FROM campaigns";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['totalCampaigns'];
    }

   
    public function getDonorsCount() {
        $query = "SELECT COUNT(*) AS totalDonors FROM " . $this->table_donors;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['totalDonors'];
    }

   
    public function getVolunteersCount() {
        $query = "SELECT COUNT(*) AS totalVolunteers FROM " . $this->table_volunteers;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['totalVolunteers'];
    }
   public function getNonVolunteer(){
    $query = "SELECT * FROM " . $this->table_volunteers." WHERE status='Not Completed'";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

public function statusComplete($id, $admin_id)  {
    // Start a transaction
    $this->conn->beginTransaction();
    
    try {
        
        $query2 = "UPDATE volunteers SET status = 'Completed' WHERE id = :id";
        $stmt2 = $this->conn->prepare($query2);
        $stmt2->bindParam(':id', $id);
        $stmt2->execute();
    
        $this->conn->commit();
        
        return true;
    } catch (Exception $e) {
      
        $this->conn->rollBack();
        return false;
    }
}
public function saveContact($name, $email, $phone, $subject, $message) {
    
        $query = "INSERT INTO emails (name, email, phone, subject, message) VALUES (:name, :email, :phone, :subject, :message)";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':message', $message);
        if ($stmt->execute()) {
            return true;
        }

        return false;

}
public function sentEmails(){
    $query = "SELECT * FROM emails where status='Not Replied'";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
}
public function statusReply($id, $admin_id)  {
   
    $this->conn->beginTransaction();
    
    try {
        
        $query2 = "UPDATE emails SET status = 'Replied' WHERE id = :id";
        $stmt2 = $this->conn->prepare($query2);
        $stmt2->bindParam(':id', $id);
        $stmt2->execute();
    
        $this->conn->commit();
        
        return true;
    } catch (Exception $e) {
      
        $this->conn->rollBack();
        return false;
    }
}
public function getDonorEmail($donor_id) {
    $query = "SELECT email FROM donors WHERE donor_id = :donor_id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':donor_id', $donor_id);
    $stmt->execute();
    return $stmt->fetchColumn();
}

public function getDonorName($donor_id) {
    $query = "SELECT username FROM donors WHERE donor_id = :donor_id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':donor_id', $donor_id);
    $stmt->execute();
    return $stmt->fetchColumn();
}

public function getCampaignTitle($campaign_id) {
    $query = "SELECT title FROM campaigns WHERE campaign_id = :campaign_id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':campaign_id', $campaign_id);
    $stmt->execute();
    return $stmt->fetchColumn();
}
public function getVolunteerStats() {
    try {
        // Query to get the total number of volunteers
        $volunteersQuery = "SELECT COUNT(*) as total_volunteers FROM volunteers";
        $stmt1 = $this->conn->prepare($volunteersQuery);
        $stmt1->execute();
        $totalVolunteers = $stmt1->fetch(PDO::FETCH_ASSOC)['total_volunteers'];

        // Query to get the total number of hours volunteered
        $hoursQuery = "SELECT SUM(hours) as total_hours FROM volunteers";
        $stmt2 = $this->conn->prepare($hoursQuery);
        $stmt2->execute();
        $totalHours = $stmt2->fetch(PDO::FETCH_ASSOC)['total_hours'];

        // Query to get the total number of projects completed
        $projectsQuery = "SELECT COUNT(*) as total_projects FROM volunteers WHERE status = 'Completed'";
        $stmt3 = $this->conn->prepare($projectsQuery);
        $stmt3->execute();
        $totalProjects = $stmt3->fetch(PDO::FETCH_ASSOC)['total_projects'];

        // Return the stats as an associative array
        return [
            'volunteers' => $totalVolunteers,
            'hours' => $totalHours,
            'projects' => $totalProjects
        ];
    } catch (Exception $e) {
        // Handle any potential errors
        error_log("Error fetching volunteer stats: " . $e->getMessage());
        return [
            'volunteers' => 0,
            'hours' => 0,
            'projects' => 0
        ];
    }
}
}

?>