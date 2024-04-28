<?php 
include('../../conn/auth_checker.php');
error_reporting(E_ALL);

$userId =$_SESSION['obbsuid'] ;

// Fetch user data based on email
$sql = "SELECT * FROM messages WHERE status=:status";
$status = "active";
$query = $dbh->prepare($sql);
$query->bindParam(':status', $status, PDO::PARAM_STR);
$query->execute();
$messages = $query->fetchAll(PDO::FETCH_ASSOC);
// print_r($messages);die;
// Access the count using the key 'total_bookings'
include('message.php');
?>