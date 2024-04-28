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

    $sql = "SELECT * FROM bookings WHERE created_at BETWEEN :startDate AND :endDate";
    // $sql = "SELECT b.*, SUM(p.amount) AS total_paid_amount 
    //         FROM bookings b 
    //         LEFT JOIN payments p ON b.bookign_id COLLATE utf8mb4_general_ci = p.booking_id COLLATE utf8mb4_general_ci
    //         WHERE b.created_at BETWEEN :startDate COLLATE utf8mb4_general_ci AND :endDate COLLATE utf8mb4_general_ci
    //         GROUP BY b.id";


    $startDate = date('Y-m-d H:i:s', strtotime($_POST['start_date']));  // Assuming startDate comes from user input
    $endDate = date('Y-m-d H:i:s', strtotime($_POST['end_date']));    // Assuming endDate comes from user input

    $query = $dbh->prepare($sql);
    $query->bindParam(':startDate', $startDate, PDO::PARAM_STR);
    $query->bindParam(':endDate', $endDate, PDO::PARAM_STR);

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