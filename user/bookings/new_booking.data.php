<?php 
include('../../conn/auth_checker.php');
error_reporting(E_ALL);

$userId =$_SESSION['obbsuid'] ;

$status = "enabled";
$sql = "SELECT * FROM services WHERE status=:status";
$query = $dbh->prepare($sql);
$query->bindParam(':status', $status, PDO::PARAM_STR);
$query->execute();
$services = $query->fetchAll(PDO::FETCH_ASSOC);


// Query for selecting data from the event_type table
$sqlEventTypes = "SELECT id, name FROM event_type WHERE status=:status";
$queryEventTypes = $dbh->prepare($sqlEventTypes);
$queryEventTypes->bindParam(':status', $status, PDO::PARAM_STR);
$queryEventTypes->execute();
$eventTypes = $queryEventTypes->fetchAll(PDO::FETCH_ASSOC);

include('new_booking.php');
?>