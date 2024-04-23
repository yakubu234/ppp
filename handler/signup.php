<?php 
include("../conn/database.php");
error_reporting(E_ALL);

if (isset($_POST['signup'])) {

  $lastname = trim($_POST['login']['lastname']);
  $firstname = trim($_POST['login']['firstname']);
  $email = filter_var($_POST['login']['email'], FILTER_SANITIZE_EMAIL); 
  $password = trim($_POST['login']['password']);
  $phone = trim($_POST['login']['phone']);
  $type = '0';

  // Input validation (add more as needed)
  if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
    $_SESSION['errors'] = "Please fill in all required fields.";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['errors'] = "Invalid email address.";
  }else if (empty($firstname)) {
    $_SESSION['errors'] = "Invalid firstname .";
  }else if (empty($lastname)) {
    $_SESSION['errors'] = "Invalid lastname .";
  }

  $fullname = $firstname ." ". $lastname;	

  // Check for existing email (optional)
  $sql = "SELECT COUNT(*) FROM users WHERE email=:email";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->execute();
  $rowCount = $query->fetchColumn();

  if ($rowCount > 0) {
    $_SESSION['errors'] = "Email already exists.";
  }

  if (!isset( $_SESSION['errors'])) {
    // Hash the password with a strong algorithm
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $status = 'active';
    $null = null;

    // Insert user into database
    $sql = "INSERT INTO users (fullname, email, password, status, type, username, phone) VALUES (:fullname, :email, :password,:status, :type, :username, :phone)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->bindParam(':type', $type, PDO::PARAM_STR);
    $query->bindParam(':username', $null, PDO::PARAM_NULL);
    $query->bindParam(':phone', $phone, PDO::PARAM_STR);
    if ($query->execute()) {
      
      $lastInsertedId =  $dbh->lastInsertId();
        $sql = "SELECT * FROM users WHERE id = :id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $lastInsertedId, PDO::PARAM_INT);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        $_SESSION['success'] = "Signup successful!";
        $_SESSION['obbsuid'] =$dbh->lastInsertId();
        $_SESSION["current_user"] = $user;
        $_SESSION['user_type'] = $type;
        header("Refresh:0; url=../user/dashboard/dashboard.php");
    } else{
      $_SESSION['errors'] = "Signup failed. Please try again.";
      header("Refresh:0; url=../signup.php"); 
    }
    
  }else{
  header("Refresh:0; url=../signup.php");
  }
}


?>