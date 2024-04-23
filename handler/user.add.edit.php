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
$pageUrl = $currentUser['type'] < 1 ?"../user/dashboard/view.users.data.php":"../admin/dashboard/view.users.data.php";

if (isset($_POST['email'])) {

    $id = isset($_POST['item_id']) ?$_POST['item_id']:"";
    $status = isset($_POST['status']) ?$_POST['status']:"active";
    
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $type = $_POST['type'];
    

    if(!empty($id)){
        $sql="update users set fullname=:fullname, username=:username, email=:email, phone=:phone, type=:type, status=:status where id=:id";
        $query = $dbh->prepare($sql);
        $query-> bindParam(':id', $id, PDO::PARAM_STR);
    }else{

        // Check for existing email (optional)
        $sql = "SELECT COUNT(*) FROM users WHERE email=:email";
        $query = $dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $rowCount = $query->fetchColumn();

        if ($rowCount > 0) {
            $_SESSION['errors'] = "Email already exists.";
            header("Refresh:0; url=$pageUrl");
        }

        $password = password_hash('password', PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (fullname, username, email, phone,type,status, password) VALUES ( :fullname, :username, :email, :phone, :type, :status, :password)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
    }
    
    $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':phone', $phone, PDO::PARAM_STR);
    $query->bindParam(':type', $type, PDO::PARAM_STR);
    $query-> bindParam(':status', $status, PDO::PARAM_STR);
    
    if($query->execute() === TRUE){
        $_SESSION['success'] = 'Ok successful';
        header("Refresh:0; url=$pageUrl");
    }else{
        $_SESSION['errors'] ='action not successful';
        header("Refresh:0; url=$pageUrl");
    }

}

?>