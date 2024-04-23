<?php
session_start();
$message =    $_SESSION['message'];

echo  $message;
session_unset();
session_destroy();
header('location:index.php');

?>