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

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Log the form data
    file_put_contents('form_data.log', print_r($_POST, true), FILE_APPEND | LOCK_EX);
    	// run this for update
         $bookingsData = [
            'bookign_id'=> $_POST['booking_id'],
            'user_id' => $_POST['user_id'],
            'event_type' => $_POST['type_of_event'],
            'number_of_guest' => $_POST['number_of_guest'],
            'date_start' => formatDate($_POST['from']),
            'time_start' => format_time_with_am_pm($_POST['time_start']),
            'time_end' => format_time_with_am_pm($_POST['time_end']),
            'tax' => isset($_POST['tax']) ? $_POST['tax']:"",
            'message' => isset($_POST['message']) ? $_POST['message']:"",
            'discount' => isset( $_POST['discount']) ? $_POST['discount']:"",
            'customer_email' => $_POST['customer_email'],
            'customer_fullname' => $_POST['customer_fullname'],
            'customer_phone' => $_POST['customer_phone'],
            'customer_address' => $_POST['customer_address'],
            'customer_contact_person_fullname' => $_POST['customer_contact_person_fullname'],
            'customer_contact_person_phone' => $_POST['customer_contact_person_phone'],
            'admin_id' => $currentUser['fullname']
         ];

         //insert into bookings
            $sql = "UPDATE bookings set user_id=:user_id, event_type=:event_type, number_of_guest=:number_of_guest, date_start=:date_start, time_start=:time_start, time_end=:time_end, tax=:tax, message=:message, discount=:discount, customer_email=:customer_email, customer_fullname=:customer_fullname, customer_phone=:customer_phone, customer_address=:customer_address, customer_contact_person_fullname=:customer_contact_person_fullname, customer_contact_person_phone=:customer_contact_person_phone,admin_id=:admin_id WHERE bookign_id=:bookign_id";
            
            $query = $dbh->prepare($sql);

            // Bind parameters
            foreach ($bookingsData as $column => $value) {
            // Check if the value is null or not empty
                if ($value !== null && $value !== '') {
                    $query->bindParam(':' . $column, $bookingsData[$column], PDO::PARAM_STR);
                } else {
                    $null = null;
                    $query->bindParam(':' . $column, $null, PDO::PARAM_NULL);
                }
            }

            if($query->execute()){
                $lastInsertedId = $_POST['booking_update_id'];

                //  select all services 
                $status = "enabled";
                $sql = "SELECT * FROM services WHERE status=:status";
                $query = $dbh->prepare($sql);
                $query->bindParam(':status', $status, PDO::PARAM_STR);
                $query->execute();
                $databaseService = $query->fetchAll(PDO::FETCH_ASSOC);

                // delete from booking services where id is not equal to id that was just inserted
                $del = "DELETE FROM bookings_services 
                        WHERE bookings_id = :bookings_id";
                $stmt = $dbh->prepare($del);
                // Bind parameters
                $stmt->bindParam(':bookings_id', $lastInsertedId, PDO::PARAM_STR); 
                // Execute the prepared statement
                $stmt->execute();
                // Check for errors
                if ($stmt->errorCode() !== 0) {
                    $error = $stmt->errorInfo();
                    file_put_contents('form_data.log', ["Error deleting records: " . $error[2], print_r($error, true)], FILE_APPEND | LOCK_EX);
                } 

                // Process services data
                $finalAmount = 0.0;
                $services = [];
                $isertedIdsServices = [];
                for ($i = 0; $i < count($_POST['item_id']); $i++) {
                    $itemId = $_POST['item_id'][$i];
                    $found_service = array_values(array_filter($databaseService, function($existing_service) use ($itemId) {
                        return $existing_service['id'] ==  $itemId;
                    }));

                    //  insert into bookings_services
                    $sql = "INSERT INTO bookings_services (bookings_id, service_id, name, description, quantity,status, amount) VALUES (:bookings_id, :service_id, :name, :description, :quantity, :status, :amount)";
                    $query = $dbh->prepare($sql);
                    $status = "active";
                    $query->bindParam(':bookings_id', $lastInsertedId, PDO::PARAM_STR);
                    $query->bindParam(':service_id', $_POST['item_id'][$i], PDO::PARAM_STR);
                    $query->bindParam(':name',$found_service[0]['name'], PDO::PARAM_STR);
                    $query->bindParam(':description', $found_service[0]['description'], PDO::PARAM_STR);
                    $query->bindParam(':quantity',$_POST['quantity'][$i], PDO::PARAM_STR);
                    $query->bindParam(':status', $status, PDO::PARAM_STR);
                    $query->bindParam(':amount', $found_service[0]['price'], PDO::PARAM_STR);
                    $query->execute();
                    $finalAmount = $finalAmount+ ($_POST['quantity'][$i] * remove_commas($found_service[0]['price']));
                    $isertedIdsServices[] = $dbh->lastInsertId(); // get for deleting multiple
                }

                
                file_put_contents('form_data.log', print_r($isertedIdsServices, true), FILE_APPEND | LOCK_EX);


                // update the bookings with amount
                $status = "active";
                $paymentStatus = (($finalAmount - $_POST['amount_paid']) <= 0)?"completed":"part payment";
                  // $data['amount_paid'] = ;
                $finalAmount = addCommasToMoney($finalAmount);
                $sql="update bookings set total_amount=:amount,payment_status=:payment_status, status=:status where id=:id";
                $query = $dbh->prepare($sql);
                $query-> bindParam(':amount', $finalAmount, PDO::PARAM_STR);
                $query-> bindParam(':payment_status', $paymentStatus, PDO::PARAM_STR);
                $query-> bindParam(':status', $status, PDO::PARAM_STR);
                $query-> bindParam(':id', $lastInsertedId, PDO::PARAM_STR);
                $query->execute();
                 if ($query->errorCode() !== 0) {
                    $error = $query->errorInfo();
                    file_put_contents('form_data.log', ["Error deleting records: " . $error[2], print_r($error, true)], FILE_APPEND | LOCK_EX);
                } 
                
                // insert into payments 
                $booking_id  = $bookingsData['bookign_id'];
                $action = "successfully added ₦$finalAmount being paid as $paymentStatus  payment for booking id  $booking_id ";
                logAuditTrail($currentUser['id'], $action, $currentUser['email'], $currentUser['fullname'], $bookingsData['bookign_id']);

                $isertedIdsPayment = [];
                $sql = "INSERT INTO payments (booking_id, amount) VALUES (:booking_id, :amount)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':booking_id', $bookingsData['bookign_id'], PDO::PARAM_STR);
                $query->bindParam(':amount', $_POST['amount_paid'], PDO::PARAM_STR);
                $query->execute();
                $id = $dbh->lastInsertId();
                //delete from payment the former payment histories since the new payment is added
                $del = "DELETE FROM payments 
                        WHERE booking_id = :bookings_id 
                        AND id != :excluded_id";
                $stmt = $dbh->prepare($del);
                // Bind parameters
                $stmt->bindParam(':bookings_id', $bookingsData['bookign_id'], PDO::PARAM_STR); 
                $stmt->bindParam(':excluded_id', $id, PDO::PARAM_STR);
                $stmt->execute();
                // Send response back to client
                file_put_contents('form_data.log', print_r($dbh->lastInsertId(), true), FILE_APPEND | LOCK_EX);

                $response = ['success' => true, 'message' => 'Form data processed successfully', 'id' => $bookingsData['bookign_id']];
                http_response_code(200); // OK
                echo json_encode($response);
            }else{
                $response = ['success' => false, 'message' => 'Error processing form data'];
                http_response_code(400);
                echo json_encode($response);
            }   
} else {
    // Invalid request method
    $response = ['success' => false, 'message' => 'Invalid request method'];
    http_response_code(400);
    echo json_encode($response);
}



?>

