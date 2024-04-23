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
$pageUrl = $currentUser['type'] < 1 ?"../user/services/services.data.php":"../admin/services/services.data.php";

if (isset($_POST['description'])) {

    $id = isset($_POST['item_id']) ?$_POST['item_id']:"";
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    if(!empty($id)){
        $sql="update services set name=:name, description=:description, price=:price, status=:status where id=:id";
        $query = $dbh->prepare($sql);
        $query-> bindParam(':id', $id, PDO::PARAM_STR);
    }else{
        $sql = "INSERT INTO services (name, description, price, status) VALUES ( :name, :description, :price, :status)";
        $query = $dbh->prepare($sql);
    }
    
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':description', $description, PDO::PARAM_STR);
    $query->bindParam(':price', $price, PDO::PARAM_STR);
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