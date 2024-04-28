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
$pageUrl = $currentUser['type'] < 1 ?"../user/message/message.data.php":"../admin/message/message.data.php";

if (isset($_GET['id'])) {

    $userEnteredId = (int) filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);  // Assuming ID comes from GET
    $sql = "DELETE FROM messages WHERE id = :id";

    $query = $dbh->prepare($sql);
	$query->bindParam(':id', $userEnteredId, PDO::PARAM_INT);

    if($query->execute() === TRUE){
        $_SESSION['success'] = 'Ok successful';
        header("Refresh:0; url=$pageUrl");
    }else{
        $_SESSION['errors'] ='action not successful';
        header("Refresh:0; url=$pageUrl");
    }

}

?>