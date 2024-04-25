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


$pageUrl = $currentUser['type'] < 1 ?"../user/bookings/booking.single.data.php?id=":"../admin/bookings/booking.single.data.php?id=";
if (isset($_POST['balance']) && isset($_POST['booking_id']) && !empty($_POST['booking_id'])) {

	 $existing_pay = $_POST['existing_pay'];
	 $total_amount = $_POST['total_amount'];
	 $booking_id = $_POST['booking_id'];
	 $balance = $_POST['balance'];

	if(( $total_amount - ($balance + $existing_pay) ) <= 0){
		//update the booking payment status
		$description = 'completed';
        $sql="update bookings set payment_status=:payment_status where bookign_id=:booking_id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':payment_status', $description, PDO::PARAM_STR);
        $query->bindParam(':booking_id', $booking_id, PDO::PARAM_STR);
		$query->execute();
	}

	$pageUrl = $pageUrl.$booking_id;//update the page url here to consist of the booking id

    $sql = "INSERT INTO payments (booking_id, amount) VALUES (:booking_id, :amount)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':booking_id', $booking_id, PDO::PARAM_STR);
    $query->bindParam(':amount', $balance, PDO::PARAM_STR);

    if($query->execute() === TRUE){
        $_SESSION['success'] = 'Ok successful';
        header("Refresh:0; url=$pageUrl");
    }else{
        $_SESSION['errors'] ='action not successful';
        header("Refresh:0; url=$pageUrl");
    }

}

?>