<?php
include("../conn/database.php");
error_reporting(E_ALL);


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

$pageUrl = $currentUser['type'] < 1 ?"../user/gallery/gallery.data.php":"../admin/gallery/gallery.data.php";
function insertFileNames($fileNames) {
    global $dbh;
    $status = "active";

    $sql = "INSERT INTO gallery (img, status) VALUES (:fileName, :status)";
    $stmt = $dbh->prepare($sql);

    foreach ($fileNames as $fileName) {
        $stmt->bindParam(':fileName', $fileName);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
    }
}

// Function to handle file uploads
if(isset($_POST['form_type']) && $_POST['form_type'] == "files"){
    if (isset($_FILES['files'])) {
        $fileNames = [];
        $fileCount = 1;

        if (isset($_FILES['files']) && is_array($_FILES['files']['name'])) {
            $fileCount = count($_FILES['files']['name']);
        }
 
        for ($i = 0; $i < $fileCount; $i++) {
            $fileName = $_FILES['files']['name'][$i];
            $tempFilePath = $_FILES['files']['tmp_name'][$i];
            $uploadDirectory = '../uploads/'; // Directory where files will be uploaded
            $targetFilePath = $uploadDirectory . basename($fileName);

            if (!is_writable($uploadDirectory)) {
                $permissions = 0777; 
                exec("chmod -R {$permissions} {$uploadDirectory}");
            }

            if (move_uploaded_file($tempFilePath, $targetFilePath)) {
                $fileNames[] = $fileName;
            } else {
                // Handle file upload error
            }
        }

        if (!empty($fileNames)) {
            insertFileNames($fileNames);
            $_SESSION['success'] = 'File uploaded successfully';
            // header("Refresh:0; url=$pageUrl");
        } else {  
            $_SESSION['errors'] =  'No files uploaded';
            // header("Refresh:0; url=$pageUrl");
        }
    } else {
        $_SESSION['errors'] =  'No files uploaded';
        // header("Refresh:0; url=$pageUrl");
    }
}

// Handle file upload  file
if (isset($_FILES['file'])  && isset($_POST['form_type']) && $_POST['form_type'] == "file" ) {
    $fileName = $_FILES['file']['name'];
    $tempFilePath = $_FILES['file']['tmp_name'];
    $uploadDirectory = '../uploads/'; // Directory where files will be uploaded
    $targetFilePath = $uploadDirectory . basename($fileName);
    $status = "active";
    // Check if permissions were successfully changed
    if (!is_writable($uploadDirectory)) {
        $permissions = 0777; 
        exec("chmod -R {$permissions} {$uploadDirectory}");
    } 

    if (move_uploaded_file($tempFilePath, $targetFilePath)) {
        
        $sql = "INSERT INTO gallery (img, status, heading) VALUES (:fileName, :status, :heading)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':fileName', $fileName);
        $stmt->bindParam(':status', $status);

        if(!empty($_POST['description'])){
            $stmt->bindParam(':heading', $_POST['description']);
        }

        $stmt->execute();
        $_SESSION['success'] = 'File uploaded successfully';
        // header("Refresh:0; url=$pageUrl");
    } else {
        $_SESSION['errors'] =  'Error uploading file';
        // header("Refresh:0; url=$pageUrl");
    }
}

?>
