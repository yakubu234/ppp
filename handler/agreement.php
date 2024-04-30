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
$pageUrl = "../admin/agreement/agrrement.list.php";

if (isset($_POST['description'])) {

    $id = isset($_POST['item_id']) ?$_POST['item_id']:"";
    $description = htmlentities($_POST['description']);
    if(!empty($id)){
        $sql="update agreement set description=:description";
        $query = $dbh->prepare($sql);
    }else{
        $sql = "INSERT INTO agreement (description) VALUES (:description)";
        $query = $dbh->prepare($sql);
    }
    
    $query->bindParam(':description', $description, PDO::PARAM_STR);

    if($query->execute() === TRUE){
        $_SESSION['success'] = 'Ok successful';
        header("Refresh:0; url=$pageUrl");
    }else{
        $_SESSION['errors'] ='action not successful';
        header("Refresh:0; url=$pageUrl");
    }

}

?>