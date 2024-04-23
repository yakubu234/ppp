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
$pageUrl = $currentUser['type'] < 1 ?"../user/contact/contact.us.php":"../admin/contact/contact.us.php";

if (isset($_POST['address'])) {

    $id = isset($_POST['item_id']) ?$_POST['item_id']:"";
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    if(!empty($id)){
        $sql="update contact_page set address=:address, phone=:phone, email=:email";        
    }else{
        $sql = "INSERT INTO contact_page (address, phone, email) VALUES ( :address, :phone, :email)";        
    }

    $query = $dbh->prepare($sql);
    $query->bindParam(':address', $address, PDO::PARAM_STR);
    $query->bindParam(':phone', $phone, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);

    if($query->execute() === TRUE){
        $_SESSION['success'] = 'Ok successful';
        header("Refresh:0; url=$pageUrl");
    }else{
        $_SESSION['errors'] ='action not successful';
        header("Refresh:0; url=$pageUrl");
    }

}

?>