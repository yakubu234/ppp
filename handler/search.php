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


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $search_key = $_POST['search_key'];
    $type = identifyInputType($search_key);
    // echo $type;
    $sql = "SELECT b.* FROM bookings b ";
    if ($type === 'booking_id') {
        $sql .= "WHERE b.bookign_id = :search_key";// If the search key is a booking ID, select bookings with that ID
    } else {
        // If the search key is not a booking ID, select bookings associated with the user
        $sql .= "JOIN users u ON b.user_id = u.id WHERE u.email = :search_key OR u.phone = :search_key";
    }

    $query = $dbh->prepare($sql);
    $query->bindParam(':search_key', $search_key, PDO::PARAM_STR);

    if($query->execute()){
        
        $bookings = $query->fetchAll(PDO::FETCH_ASSOC);
        file_put_contents('form_data.log', print_r($bookings, true), FILE_APPEND | LOCK_EX);
        $response = ['success' => true, 'message' => 'Form data processed successfully', 'data' => $bookings];
        http_response_code(200); // OK
        echo json_encode($response);
    } else {
    // Invalid request method
        $response = ['success' => false, 'message' => 'Invalid request method'];
        http_response_code(400);
        echo json_encode($response);
    }
}

function identifyInputType($input) {
    // Check if input is a valid email address
    if (filter_var($input, FILTER_VALIDATE_EMAIL) !== false) {
        return 'email';
    }
     // Check if input is a valid phone number
    if (preg_match('/^\+?\d{1,3}(\(\d{1,3}\))?\d{3,14}$/', $input)) {
        return 'phone';
    }
    // If input doesn't match email or phone number format, assume it's a regular string
    return 'booking_id';
}