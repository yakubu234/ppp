<?php 
include('../../conn/auth_checker.php');
error_reporting(E_ALL);

$userId =$_SESSION['obbsuid'] ;

// Fetch user data based on email
$sql = "SELECT 
(SELECT COUNT(*) FROM bookings WHERE user_id=:user_id) AS total_bookings,
(SELECT COUNT(*) FROM messages WHERE user_id=:user_id) AS total_messages,
COUNT(*) AS total_services 
FROM 
services";
$query = $dbh->prepare($sql);
$query->bindParam(':user_id', $userId, PDO::PARAM_STR);
$query->execute();
// Fetch a single row containing the count
$result = $query->fetch(PDO::FETCH_ASSOC);
// Access the count using the key 'total_bookings'
$totalBookings = $result['total_bookings'];
$totalMessages = $result['total_messages'];
$totalServices = $result['total_services'];
include('dashboard.php');
?>