<?php 
include("conn/database.php");
// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader (assuming you have Composer installed)
require 'mail/src/PHPMailer.php';
require 'mail/src/SMTP.php';
require 'mail/src/Exception.php';

error_reporting(0);

function formatTimeWithSeconds($timeString) {

  $formattedTime = substr($timeString,0, -3);
  // Append ":00" for seconds
  return $formattedTime . ':00';
}

function formatDates($dateArray) {
    foreach ($dateArray as &$item) {
        $dateStart = DateTime::createFromFormat('l, F j, Y', $item['date_start']);
        $dateEnd =  DateTime::createFromFormat('l, F j, Y', $item['date_start']);

        // Check if the month and day have leading zeros and remove them if present
        $item['date_start'] = preg_replace('/^0(\d+)/', '$1', $dateStart->format('n/j/Y'));
        $item['date_end'] = preg_replace('/^0(\d+)/', '$1', $dateEnd->format('n/j/Y'));
    }
    return $dateArray;
}


function formatDatesInternal($dateArray) {
    $data2 = [];
    foreach ($dateArray as &$item) {
        $dateStart = DateTime::createFromFormat('l, F j, Y', $item['date_start']);
        $dateEnd = DateTime::createFromFormat('l, F j, Y', $item['date_start']);

        $data['start'] = $dateStart->format('Y-m-d'). 'T'.formatTimeWithSeconds($item['time_start']);
        $data['end'] = $dateEnd->format('Y-m-d'). 'T'. formatTimeWithSeconds($item['time_end']);
        $data['title'] = "Booked";
        $data2[] = $data;
    }
    return $data2;
}

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['name']) && $_GET['name'] == 'calendar_internal') {

    $currentDate = date('l, F j, Y'); // Get the current date in the same format as stored in the database
    $sql = "SELECT date_start, time_start, time_end FROM bookings WHERE STR_TO_DATE(date_start, '%W, %M %e, %Y') >= STR_TO_DATE(:currentDate, '%W, %M %e, %Y')";
    $query = $dbh->prepare($sql);
    $query->bindParam(':currentDate', $currentDate, PDO::PARAM_STR);
    if($query->execute()){
        $bookings = $query->fetchAll(PDO::FETCH_ASSOC);
        $bookings = formatDatesInternal($bookings);
        file_put_contents('form_data.log', print_r($bookings, true), FILE_APPEND | LOCK_EX);
        $response = ['data' => $bookings];
        http_response_code(200); // OK
        echo json_encode($response);
    } else {
        $response = ['success' => false, 'message' => 'Invalid request method'];
        http_response_code(400);
        echo json_encode($response);
    }
}elseif ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['name']) && $_GET['name'] == 'calendar') {

    $currentDate = date('l, F j, Y'); // Get the current date in the same format as stored in the database
    $sql = "SELECT date_start FROM bookings WHERE STR_TO_DATE(date_start, '%W, %M %e, %Y') >= STR_TO_DATE(:currentDate, '%W, %M %e, %Y')";
    $query = $dbh->prepare($sql);
    $query->bindParam(':currentDate', $currentDate, PDO::PARAM_STR);
    if($query->execute()){
        $bookings = $query->fetchAll(PDO::FETCH_ASSOC);
        $bookings = formatDates($bookings);
        file_put_contents('form_data.log', print_r($bookings, true), FILE_APPEND | LOCK_EX);
        $response = ['success' => true, 'message' => 'Form data processed successfully', 'data' => $bookings];
        http_response_code(200); // OK
        echo json_encode($response);
    } else {
        $response = ['success' => false, 'message' => 'Invalid request method'];
        http_response_code(400);
        echo json_encode($response);
    }
}elseif($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['name']) && $_GET['name'] == 'gallery') {

    $sql = "SELECT * FROM gallery WHERE  status=:status";
    $status = "active";
    $query = $dbh->prepare($sql);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    if($query->execute()){
        $bookings = $query->fetchAll(PDO::FETCH_ASSOC);
        file_put_contents('form_data.log', print_r($bookings, true), FILE_APPEND | LOCK_EX);
        $response = ['success' => true, 'message' => 'Form data processed successfully', 'data' => $bookings];
        http_response_code(200); // OK
        echo json_encode($response);
    } else {
        $response = ['success' => false, 'message' => 'Invalid request method'];
        http_response_code(400);
        echo json_encode($response);
    }
}elseif($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['name']) && $_GET['name'] == 'contact') {

    $sql = "SELECT * FROM contact_page ";
    $query = $dbh->prepare($sql);
    if($query->execute()){
        $contact = $query->fetchAll(PDO::FETCH_ASSOC);
        file_put_contents('form_data.log', print_r($contact, true), FILE_APPEND | LOCK_EX);
        $response = ['success' => true, 'message' => 'Form data processed successfully', 'data' => $contact];
        http_response_code(200); // OK
        echo json_encode($response);
    } else {
        $response = ['success' => false, 'message' => 'Invalid request method'];
        http_response_code(400);
        echo json_encode($response);
    }
}elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['name']) && $_GET['name'] == 'contact_message') {

    $recepient = "admin";
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
    $name = trim($_POST['name']);
    $subject = trim($_POST['subject']) ?? "message";
    $message = trim($_POST['message']);
    $isRead = 0;

        // Insert user into database
        $sql = "INSERT INTO messages (recepient, email, name, message, subject, is_read) VALUES (:recepient, :email, :name, :message, :subject, :is_read)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':recepient', $recepient, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':message', $message, PDO::PARAM_STR);
        $query->bindParam(':subject', $subject, PDO::PARAM_STR);
        $query->bindParam(':is_read', $isRead, PDO::PARAM_NULL);
        
        sendEmail($_POST); // send email to the lioracity email.
        if($query->execute() === TRUE){
            file_put_contents('form_data.log', print_r($_POST, true), FILE_APPEND | LOCK_EX);
            $response = ['success' => true, 'message' => 'Form data processed successfully', 'data' => "your message is received, we will get back shortly"];
            http_response_code(200); // OK
            echo json_encode($response);
        }else{
            $response = ['success' => false, 'message' => 'Invalid request method'];
            http_response_code(400);
            echo json_encode($response);
        }

}elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['name']) && $_GET['name'] == 'book_now') {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
    $fullname = trim($_POST['fullname']);
    $date = trim($_POST['date']);

        // Insert user into database
        $sql = "INSERT INTO bookings (user_id, date_start) VALUES (:user_id, :date_start)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':user_id', $recepient, PDO::PARAM_STR);
        $query->bindParam(':date_start', $email, PDO::PARAM_STR);
        
        if($query->execute() === TRUE){
            file_put_contents('form_data.log', print_r($bookings, true), FILE_APPEND | LOCK_EX);
            $response = ['success' => true, 'message' => 'Form data processed successfully', 'data' => "your message is received, we will get back shortly"];
            http_response_code(200); // OK
            echo json_encode($response);
        }else{
            $response = ['success' => false, 'message' => 'Invalid request method'];
            http_response_code(400);
            echo json_encode($response);
        }

}else{

    $response = ['success' => false, 'message' => 'Expecting query  '];
    http_response_code(400);
    echo json_encode($response);
}


function generateCaptcha()
{
    //custom function for getting headers if not available in php
    if (!function_exists('getallheaders')) {
        function getallheaders() {
            $headers = [];
            foreach ($_SERVER as $name => $value) {
                if (substr($name, 0, 5) == 'HTTP_') {
                    $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
                }
            }
            return $headers;
        }
    }

    // Get all headers
    $headers = getallheaders();
    $captchaKey = isset($headers['captcha-key']) ? $headers['captcha-key'] : null;

    // Get the form data generate validate
    $type = isset($_POST['type']) ? $_POST['type'] : null;

    // Check if captcha-key or type is missing
    if (!$captchaKey || !$type) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing captcha-key or type']);
        exit;
    }

    if($type = 'generate'){
        $code = generateCaptchaText();
        $_SESSION[$captchaKey] = $code; // set the captcha into a session with the captcha-key header
        http_response_code(201);
        echo json_encode(['success' => 'Generated successfully','data' => $code]);
        exit;
    }

    // Validate the captcha-key
    if ($type = 'validate' && $captchaKey == $_SESSION[$captchaKey]) {
        $userCode = isset($_POST['code']) ? $_POST['code'] : null;
        $code = $_SESSION[$captchaKey];
        if($userCode === $code){
            http_response_code(200);
            echo json_encode(['success' => 'Valid captcha-key']);
            exit;
        }

        http_response_code(400);
        echo json_encode(['error' => 'Incorrect captcha-code']);
        exit;
    }

    http_response_code(400);
    echo json_encode(['error' => 'Incorrect captha code supplied']);
    exit;


}

function generateCaptchaText($length = 6) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
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

function sendEmail($data) {
    global $config;
    $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL); 
    $name = trim($data['name']);
    $subject = trim($data['subject']);
    $message = trim($data['message']);

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.zohocloud.ca';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = MAIL_USERNAME;                     //SMTP username
        $mail->Password   = $config['MAIL_PASSWORD'];                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587; //465                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS` PHPMailer::ENCRYPTION_SMTPS;

        //Recipients
        $mail->setFrom(MAIL_USERNAME, $name);
        $mail->addAddress('yakubu.abiola@yahoo.com', 'Joe User');   
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'A message from '.$name;
        $mail->Body    = '<html>
                            <head>
                            <title></title>
                            </head>
                            <body>
                                <p>You have a message from '.$name .'</p>
                                <p>Email: '.$email .'</p>
                                <h3 style="color:grey;">The Message</h3>
                                <p>'.$message .'</p>
                            </body>
                        </html>';
        $mail->AltBody = '<html>
                            <head>
                            <title></title>
                            </head>
                            <body>
                                <p>You have a message from '.$name .'</p>
                                <p>Email: '.$email .'</p>
                                <p>Message:</p>
                                <p>'.$message .'</p>
                            </body>
                        </html>';

        $mail->send();
        echo 'Message has been sent'. $config['MAIL_PASSWORD'];
    } catch (Exception $e) {
        echo $e->getMessage();
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}".$config['MAIL_PASSWORD'];
    }
}