<?php 
include("../conn/database.php");

error_reporting(E_ALL);

if (isset($_POST['login'])) {
  $email = filter_var($_POST['login']['email'], FILTER_SANITIZE_EMAIL);
  $password = trim($_POST['login']['password']);
  $active  =  "active";
  // Input validation (add more as needed)
  if (empty($email) || empty($password)) {
    $_SESSION['errors'] = "Please enter your email and password.";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['errors'] = "Invalid email address.";
  }

  if (!isset( $_SESSION['errors'])) {
    // Fetch user data based on email
    $sql = "SELECT * FROM users WHERE email=:email AND status=:status";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':status', $active, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
      // Verify password (using password_verify)
      if (password_verify($password, $user['password'])) {
        $_SESSION['success'] = "Login successful!";
        $_SESSION["current_user"] = $user;
        $_SESSION['obbsuid'] = $user['id'];
        $_SESSION['user_type'] = $user['type'];
       
        if($user['type'] == 0){
            header("Refresh:0; url=../user/dashboard/dashboard.data.php");
        }else{
            header("Refresh:0; url=../admin/dashboard/dashboard.data.php");
        }
        exit;
      } else {
        $_SESSION['errors'] = "Invalid  password.";
        header("Refresh:0; url=../index.php");
      }
    } else {
        $_SESSION['errors'] = "Invalid email.";
        header("Refresh:0; url=../index.php");
    }
  }
  header("Refresh:0; url=../index.php");
}

?>