<?php 
include('../../conn/auth_checker.php');
error_reporting(E_ALL);

$userId =$_SESSION['obbsuid'] ;

// Fetch user data based on email
$sql = "SELECT * FROM users";
$query = $dbh->prepare($sql);
$query->execute();
$registeredUsers = $query->fetchAll(PDO::FETCH_ASSOC);
// print_r($messages);die;
// Access the count using the key 'total_bookings'
include('view.users.php');
?>