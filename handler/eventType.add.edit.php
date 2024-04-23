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
$pageUrl = $currentUser['type'] < 1 ?"../user/events/event.type.list.php":"../admin/events/event.type.list.php";

if (isset($_POST['name'])) {

    $id = isset($_POST['item_id']) ?$_POST['item_id']:"";
    $name = $_POST['name'];
    $status = $_POST['status'];
    if(!empty($id)){
        $sql="update event_type set name=:name, status=:status where id=:id";
        $query = $dbh->prepare($sql);
        $query-> bindParam(':id', $id, PDO::PARAM_STR);
    }else{
        $sql = "INSERT INTO event_type (name, status) VALUES ( :name, :status)";
        $query = $dbh->prepare($sql);
    }
    
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);

    if($query->execute() === TRUE){
        $_SESSION['success'] = 'Ok successful';
        header("Refresh:0; url=$pageUrl");
    }else{
        $_SESSION['errors'] ='action not successful';
        header("Refresh:0; url=$pageUrl");
    }

}

?>