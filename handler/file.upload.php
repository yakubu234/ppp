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

if (isset($_POST['form_type']) && $_POST['form_type'] === 'delete_image' && isset($_POST['id'])) {

    if (!isset($_POST['id'])) {
        echo json_encode(['success' => false, 'message' => 'Invalid request']);
        exit;
    }

    $imageId = $_POST['id'];

    try {
        // Fetch the image record from the database
        $sql = "SELECT img FROM gallery WHERE id = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $imageId, PDO::PARAM_INT);
        $stmt->execute();
        $image = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($image) {
            $imagePath = '../../uploads/' . $image['img'];
            // Delete the image file from the server
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Delete the record from the database
            $sql = "DELETE FROM gallery WHERE id = :id";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id', $imageId, PDO::PARAM_INT);
            $stmt->execute();

            echo json_encode(['success' => true, 'message' => 'Image deleted successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Image not found']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} 


// Function to handle file uploads
if (isset($_POST['form_type']) && $_POST['form_type'] == "files") {
    if (isset($_FILES['files'])) {
        $fileNames = [];
        $fileCount = count($_FILES['files']['name']);
        $uploadDirectory = '../uploads/';

        if (!is_writable($uploadDirectory)) {
            $permissions = 0777;
            chmod($uploadDirectory, $permissions);
        }

        for ($i = 0; $i < $fileCount; $i++) {
            if ($_FILES['files']['error'][$i] == UPLOAD_ERR_OK) {
                $fileName = $_FILES['files']['name'][$i];
                $tempFilePath = $_FILES['files']['tmp_name'][$i];
                $targetFilePath = $uploadDirectory . basename($fileName);

                if (move_uploaded_file($tempFilePath, $targetFilePath)) {
                    $fileNames[] = $fileName;
                } else {
                    // Handle file upload error
                    $_SESSION['errors'] = 'Failed to move uploaded file: ' . $fileName;
                    header("Refresh:0; url=$pageUrl");
                    exit();
                }
            } else {
                // Handle file upload error
                $_SESSION['errors'] = 'Error uploading file: ' . $_FILES['files']['name'][$i];
                header("Refresh:0; url=$pageUrl");
                exit();
            }
        }

        if (!empty($fileNames)) {
            insertFileNames($fileNames);
            $_SESSION['success'] = 'Files uploaded successfully';
            header("Refresh:0; url=$pageUrl");
            exit();
        } else {
            $_SESSION['errors'] = 'No files uploaded';
            header("Refresh:0; url=$pageUrl");
            exit();
        }
    } else {
        $_SESSION['errors'] = 'No files uploaded';
        header("Refresh:0; url=$pageUrl");
        exit();
    }
}

// Handle file upload  file
if (isset($_FILES['file'])  && isset($_POST['form_type']) && $_POST['form_type'] == "file" ) {
    $fileName = $_FILES['file']['name'];
    $tempFilePath = $_FILES['file']['tmp_name'];
    $uploadDirectory = '../uploads/'; // Directory where files will be uploaded
    $targetFilePath = $uploadDirectory . basename($fileName);
    $desc = $_POST['description'] ?? "." ;
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
        $stmt->bindParam(':heading', $desc);
        $stmt->execute();
        $_SESSION['success'] = 'File uploaded successfully';
        header("Refresh:0; url=$pageUrl");
    } else {
        $_SESSION['errors'] =  'Error uploading file';
        header("Refresh:0; url=$pageUrl");
    }
}

?>
