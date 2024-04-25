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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Log the form data
    file_put_contents('form_data.log', print_r($_POST, true), FILE_APPEND | LOCK_EX);
    $data = [];
         // Process the form data
         $data['user_id'] = $_POST['user_id'];
         $data['form_action'] = $_POST['form_action'];
         $data['email'] = $_POST['email'];
         $data['time_start'] = format_time_with_am_pm($_POST['time_start']);
         $data['time_end'] = format_time_with_am_pm($_POST['time_end']);
         $data['customer_email'] = $_POST['customer_email'];
         $data['customer_fullname'] = $_POST['customer_fullname'];
         $data['customer_phone'] = $_POST['customer_phone'];
         $data['customer_address'] = $_POST['customer_address'];
         $data['customer_contact_person_fullname'] = $_POST['customer_contact_person_fullname'];
         $data['customer_contact_person_phone'] = $_POST['customer_contact_person_phone'];
         $data['amount_paid'] = $_POST['amount_paid'];
         
         $data['phone'] = isset($_POST['user_phone']) ? $_POST['user_phone']:"";
         $data['fullname']  = $_POST['fullname'];
         $data['type_of_event']  = $_POST['type_of_event'];
         $data['number_of_guest'] = $_POST['number_of_guest'];
         $data['from'] = formatDate($_POST['from']);
         $data['apply_date'] = formatDate(date('Y-m-d'));
         $data['tax']  = isset($_POST['tax']) ? $_POST['tax']:"";
         $data['message']  = isset($_POST['message']) ? $_POST['message']:"";
         $data['discount'] = isset( $_POST['discount']) ? $_POST['discount']:"";
         
        //  select all services 
        $status = "enabled";
        // Fetch user data based on email
        $sql = "SELECT * FROM services WHERE status=:status";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();
        $databaseService = $query->fetchAll(PDO::FETCH_ASSOC);

         // Process services data
         $services = [];
         for ($i = 0; $i < count($_POST['item_id']); $i++) {
            $itemId = $_POST['item_id'][$i];
            $found_service = array_values(array_filter($databaseService, function($existing_service) use ($itemId) {
                return $existing_service['id'] ==  $itemId;
            }));

             $service = [
                 'item_id' => $_POST['item_id'][$i],
                 'service_name' => $found_service[0]['name'],
                 'service_description' =>$found_service[0]['description'],
                 'quantity' => $_POST['quantity'][$i],
                 'price' =>$found_service[0]['price']
             ];
             $services[] = $service;
         }
         $data['services'] = $services;

        file_put_contents('form.log', print_r($data, true), FILE_APPEND | LOCK_EX);

        // Send response back to client
        $response = ['success' => true, 'message' => 'Form data processed successfully', 'data' => $data];
        http_response_code(200); // OK
        echo json_encode($response);
} else {
    // Invalid request method
    $response = ['success' => false, 'message' => 'Invalid request method'];
    http_response_code(400);
    echo json_encode($response);
}

function formatDate($date){
    return $formattedDate = date("l, F j, Y", strtotime($date));
}

function format_time_with_am_pm($timeString) {
  
  /*

  Formats a time string to include AM or PM based on the hour.

  Args:
      timeString: A string representing the time in 24-hour format (e.g., '10:30','17:15').

  Returns:
      A string representing the formatted time with AM or PM appended.
  """

  */

  // Convert the time string to a DateTime object
  $dateTime = DateTime::createFromFormat('H:i', $timeString);

  // Extract the hour (0-23)
  $hour = $dateTime->format('H');

  // Determine AM/PM based on the hour
  $amPm = ($hour < 12) ? 'AM' : 'PM';

  // Format the time with leading zeros (optional)
  $formattedTime = $dateTime->format('h:i'); // Use 'h' for 12-hour format with leading zeros

  // Combine formatted time and AM/PM
  return $timeString . ' ' . $amPm;
}

?>