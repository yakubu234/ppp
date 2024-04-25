<?php 
include('../../conn/auth_checker.php');
error_reporting(E_ALL);

$userId =$_SESSION['obbsuid'] ;
$data = [];
if(isset($_GET['id']) ){
    $id = $_GET['id'];
    
    // Fetch user data based on email
    $sql = "SELECT  bookings_services.*, bookings.*, users.phone AS user_phone, users.email AS user_email, users.fullname AS user_fullname
    FROM bookings
    LEFT JOIN bookings_services ON bookings.id = bookings_services.bookings_id
    LEFT JOIN users ON bookings.user_id = users.id
    WHERE bookings.bookign_id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id , PDO::PARAM_STR);
    $query->execute();
    $bookings = $query->fetchAll(PDO::FETCH_ASSOC);

    // print_r($bookings);die;

    $data['bookign_id'] = $bookings[0]['bookign_id'];
    $data['user_id'] = $bookings[0]['user_id'];
    $data['email'] = $bookings[0]['user_email'];
    $data['phone'] =  $bookings[0]['user_phone'];
    $data['fullname']  =  $bookings[0]['user_fullname'];
    $data['type_of_event']  =  $bookings[0]['event_type'];
    $data['number_of_guest'] =  $bookings[0]['number_of_guest'];
    $data['from'] =  $bookings[0]['date_start'];
     $data['time_start'] = $bookings[0]['time_start'];
     $data['time_end'] =  $bookings[0]['time_end'];
     $data['payment_status'] =  $bookings[0]['payment_status'];

    $data['apply_date'] =  $bookings[0]['date_of_application'];
    $data['tax']  =  $bookings[0]['tax'];
    $data['message']  =  $bookings[0]['message'];
    $data['discount'] =  $bookings[0]['discount'];
     $data['customer_email'] =$bookings[0]['customer_email'];
     $data['status'] =$bookings[0]['status'];
         $data['customer_fullname'] = $bookings[0]['customer_fullname'];
         $data['customer_phone'] = $bookings[0]['customer_phone'];
         $data['customer_address'] = $bookings[0]['customer_address'];
         $data['customer_contact_person_fullname'] = $bookings[0]['customer_contact_person_fullname'];
         $data['customer_contact_person_phone'] = $bookings[0]['customer_contact_person_phone'];
    
    $services = [];
    for ($i = 0; $i < count($bookings); $i++) {
        $service = [
            'item_id' => $bookings[$i]['service_id'],
            'service_name' => $bookings[$i]['name'],
            'service_description' =>$bookings[$i]['description'],
            'quantity' => $bookings[$i]['quantity'],
            'price' => $bookings[$i]['amount']
        ];
        $services[] = $service;
    }
    $data['services'] = $services;

    $sql = "SELECT * FROM payments WHERE booking_id=:booking_id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':booking_id', $bookings[0]['bookign_id'], PDO::PARAM_STR);
    $query->execute();
    $payments = $query->fetchAll(PDO::FETCH_ASSOC);
    $data['payments_details'] = $payments;
    

    include('booking.single.php');
}else{
    $_SESSION['errors'] ='Error the booking ID is missing';
    header("Refresh:0; url=booking_history.data.php");
}

?>