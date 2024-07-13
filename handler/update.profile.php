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
error_reporting(0);

$userId =$_SESSION['obbsuid'] ;
$pageUrl = $currentUser['type'] < 1 ?"../user/profile/profile.data.php":"../admin/profile/profile.data.php";

if(isset($_POST['form_type']) && $_POST['form_type'] == "password_update"){
    $password = trim($_POST['password']);
    $password_confirm = trim($_POST['password_confirm']);
    if($password !== $password_confirm){
        $_SESSION['errors'] = "your password and confirm password do no match";
    }

    if (!isset( $_SESSION['errors'])) {
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql="update users set password=:password where id=:id";
        $query = $dbh->prepare($sql);
        $query-> bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $query-> bindParam(':id', $currentUser['id'], PDO::PARAM_STR);
        
        if($query->execute() === TRUE){
            $_SESSION['success'] = 'Password update successful';
            header("Refresh:0; url=$pageUrl");
        }else{
            $_SESSION['errors'] ='password update not successful';
            header("Refresh:0; url=$pageUrl");
        }
    }else{
        header("Refresh:0; url=$pageUrl");
    }
}



if(isset($_POST['form_type']) && $_POST['form_type'] == "profile_update"){
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

if(isset($_POST['form_type']) && $_POST['form_type'] == "update_email"){
        // Load the existing configuration
        $configFilePath = '../conn/configs.txt';
        $config = file($configFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Update the password in the configuration array
        foreach ($config as &$line) {
            if (strpos($line, 'MAIL_PASSWORD=') === 0) {
                $line = 'MAIL_PASSWORD=' . $newPassword;
                break;
            }
        }

        // Save the updated configuration back to the file
        file_put_contents($configFilePath, implode(PHP_EOL, $config));
        echo "i am here";
}


?>