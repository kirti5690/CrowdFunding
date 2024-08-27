<?php
session_start();



$role = $_POST['role'];  

$_SESSION['role'] = $role;

// Redirect to the homepage or dashboard
header('Location: index.php');
exit();
?>
