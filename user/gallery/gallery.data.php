<?php 
include('../../conn/auth_checker.php');
error_reporting(E_ALL);

$userId =$_SESSION['obbsuid'] ;

// Fetch user data based on email
$sql = "SELECT * FROM gallery WHERE status=:status";
$status = "active";
$query = $dbh->prepare($sql);
$query->bindParam(':status', $status, PDO::PARAM_STR);
$query->execute();
$galleries = $query->fetchAll(PDO::FETCH_ASSOC);
include('gallery.php');
?>