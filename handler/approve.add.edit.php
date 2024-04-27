<?php 
include("../conn/database.php");


if(!isset($_SESSION['obbsuid'])){
    $_SESSION['message'] = "your session timed out";
    header("Refresh:0; url=../../logout.php");
}

$currentUser = $_SESSION["current_user"];

// Fetch user data based on email
$sql = "SELECT * FROM users";
$query = $dbh->prepare($sql);
$query->execute();
$userList = $query->fetchAll(PDO::FETCH_ASSOC);

error_reporting(E_ALL);

$userId =$_SESSION['obbsuid'] ;
if (isset($_POST['start_date'])) {

     $id = isset($_POST['item_id']) ?$_POST['item_id']:"";
     $booking_id = $_POST['booking_id'];
     $status = $_POST['status'];

        $sql="update bookings set status=:status where id=:id";
        $query = $dbh->prepare($sql);
        $query-> bindParam(':id', $id, PDO::PARAM_STR);
    
    	$query->bindParam(':status', $status, PDO::PARAM_STR);

		$pageUrl = "../admin/bookings/booking.single.data.php?id=".$booking_id;

    if($query->execute() === TRUE){
        $action = "successfully change the booking status to  $status of booking id  ".$booking_id;
        logAuditTrail($currentUser['id'], $action, $currentUser['email'], $currentUser['fullname'], $booking_id);

        $_SESSION['success'] = 'Ok successful';
        header("Refresh:0; url=$pageUrl");
    }else{

        $action = "unable to change the booking status to  $status of booking id  $booking_id ";
        logAuditTrail($currentUser['id'], $action, $currentUser['email'], $currentUser['fullname'], $booking_id);
        $_SESSION['errors'] ='action not successful';
        header("Refresh:0; url=$pageUrl");
    }

}

?>