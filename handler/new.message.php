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
$succesPageUrl = $currentUser['type'] < 1 ?"../user/message/message.view.data.php":"../admin/message/message.view.data.php";

if(isset($_POST['form_type']) && $_POST['form_type'] == "message_save"){
        
    $recepient = trim($_POST['recepient']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
    $userId = trim($_POST['user_id']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);
    $isRead = 0;

        // Insert user into database
        $sql = "INSERT INTO messages (recepient, email, user_id, message, subject, is_read) VALUES (:recepient, :email, :user_id, :message, :subject, :is_read)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':recepient', $recepient, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $query->bindParam(':message', $message, PDO::PARAM_STR);
        $query->bindParam(':subject', $subject, PDO::PARAM_STR);
        $query->bindParam(':is_read', $isRead, PDO::PARAM_NULL);
        
        if($query->execute() === TRUE){
            $lastInsertedId =  $dbh->lastInsertId();
            $uniqueId = $lastInsertedId."_".uniqid();
            $_SESSION['success'] = 'Message has been Queue successful';
            header("Refresh:0; url=$succesPageUrl?id=$uniqueId");
        }else{
            $_SESSION['errors'] ='Error Trying to queue message';
            header("Refresh:0; url=$pageUrl");
        }
}



if(isset($_POST['form_type']) && $_POST['form_type'] == "message_update"){
     // Initialize an empty array to store the update data
     $updateData = array();

     // Define the fields to update and sanitize their values
     $fields = array(
         'fullname' => FILTER_SANITIZE_STRING,
         'username' => FILTER_SANITIZE_STRING,
         'email' => FILTER_SANITIZE_EMAIL,
         'phone' => FILTER_SANITIZE_STRING,
         'status' => FILTER_SANITIZE_STRING
     );
 
     // Loop through the fields, sanitize their values, and add them to the update data array if they are not empty
     foreach ($fields as $field => $filter) {
         if (isset($_POST[$field]) && !empty(trim($_POST[$field]))) {
             $updateData[$field] = filter_var(trim($_POST[$field]), $filter);
         }
     }
 
     // Check if any fields were provided for update
     if (!empty($updateData)) {
         // Construct the SQL query dynamically
         $sql = "UPDATE users SET ";
         $setValues = array();
         foreach ($updateData as $field => $value) {
             $setValues[] = "$field=:$field";
         }
         $sql .= implode(", ", $setValues);
         $sql .= " WHERE id=:id";
 
         // Prepare and execute the query
         $query = $dbh->prepare($sql);
         foreach ($updateData as $field => $value) {
             $query->bindParam(":$field", $updateData[$field], PDO::PARAM_STR);
         }
         $query->bindParam(':id', $currentUser['id'], PDO::PARAM_STR);
         

    if($query->execute() === TRUE){
        $sql = "SELECT * FROM users WHERE id = :id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id',  $currentUser['id'], PDO::PARAM_INT);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        $_SESSION["current_user"] = $user;
        $_SESSION['success'] = 'Profile update successful';
        header("Refresh:0; url=$pageUrl");
    }else{
        $_SESSION['errors'] ='Profile update not successful';
        header("Refresh:0; url=$pageUrl");
    }
}else{
        $_SESSION['errors'] ='No fields provided for update';
        header("Refresh:0; url=$pageUrl");  
    }
}

if(isset($_POST['form_type']) && $_POST['form_type'] == "profile_update_old"){
    $fullname = trim($_POST['fullname']);
    $username = trim($_POST['username']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
    $phone = trim($_POST['phone']);
    $status = trim($_POST['status']);


        
    $sql="update users set  fullname=:fullname, username=:username, email=:email, phone=:phone,  status=:status,  where id=:id";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':fullname', $fullname, PDO::PARAM_STR);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> bindParam(':phone', $phone, PDO::PARAM_STR);
    $query-> bindParam(':status', $status, PDO::PARAM_STR);
    $query-> bindParam(':id', $currentUser['id'], PDO::PARAM_STR);
        
    if($query->execute() === TRUE){
        $_SESSION['success'] = 'Profile update successful';
        header("Refresh:0; url=$pageUrl");
    }else{
        $_SESSION['errors'] ='Profile update not successful';
        header("Refresh:0; url=$pageUrl");
    }
    
}

?>