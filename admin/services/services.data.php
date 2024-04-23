<?php 
include('../../conn/auth_checker.php');
error_reporting(E_ALL);

$userId =$_SESSION['obbsuid'] ;
$status = "enabled";
// Fetch user data based on email
$sql = "SELECT * FROM services WHERE status=:status";
$query = $dbh->prepare($sql);
$query->bindParam(':status', $status, PDO::PARAM_STR);
$query->execute();

$services = $query->fetchAll(PDO::FETCH_ASSOC);
// Access the count using the key 'total_bookings'
include('services.php');
?>