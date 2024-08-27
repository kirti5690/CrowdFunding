<?php
session_start();
include_once '../model/databse.php';
include_once '../model/user.php';

// Database connection
$database = new Database();
$db = $database->getConnection();
$user = new User($db);

// Get search query from GET request
$searchQuery = isset($_GET['query']) ? $_GET['query'] : '';

if (!empty($searchQuery)) {
    // Sanitize the input
    $searchQuery = htmlspecialchars(strip_tags($searchQuery));

    // Prepare the SQL statement
    $query = "SELECT * FROM campaigns WHERE title LIKE :searchQuery OR description LIKE :searchQuery";
    $stmt = $db->prepare($query);
    $searchParam = "%{$searchQuery}%";
    $stmt->bindParam(':searchQuery', $searchParam, PDO::PARAM_STR);

    // Execute the query
    $stmt->execute();
    
    // Fetch results
    $campaigns = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return results as JSON
    header('Content-Type: application/json');
    echo json_encode($campaigns);
} else {
    // No search query provided
    echo json_encode(array("message" => "No search query provided"));
}
?>
