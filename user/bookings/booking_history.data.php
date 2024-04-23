<?php 
include('../../conn/auth_checker.php');
error_reporting(E_ALL);

$userId =$_SESSION['obbsuid'] ;
// Fetch user data based on email
$sql = "SELECT * FROM bookings";
$query = $dbh->prepare($sql);
$query->execute();
$bookings = $query->fetchAll(PDO::FETCH_ASSOC);
// Access the count using the key 'total_bookings'
include('booking_history.php');
?>