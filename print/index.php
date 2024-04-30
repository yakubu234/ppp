<?php 
include('../conn/database.php');
error_reporting(E_ALL);


$currentUser = $_SESSION["current_user"];
$data = [];

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    
    // Fetch user data based on email
    $sql = "SELECT bookings_services.service_id, bookings_services.name, bookings_services.description, bookings_services.quantity, bookings_services.amount, bookings.*, users.phone AS user_phone, users.email AS user_email, users.fullname AS user_fullname
    FROM bookings
    LEFT JOIN bookings_services ON bookings.id = bookings_services.bookings_id
    LEFT JOIN users ON bookings.user_id = users.id
    WHERE bookings.bookign_id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id , PDO::PARAM_STR);
    $query->execute();
    $bookings = $query->fetchAll(PDO::FETCH_ASSOC);

    $data['user_id'] = $bookings[0]['user_id'];
    $data['booking_id'] = $bookings[0]['bookign_id'];
    $data['email'] = $bookings[0]['user_email'];
    $data['phone'] =  $bookings[0]['user_phone'];
    $data['fullname']  =  $bookings[0]['user_fullname'];
    $data['type_of_event']  =  $bookings[0]['event_type'];
    $data['number_of_guest'] =  $bookings[0]['number_of_guest'];
    $data['from'] =  $bookings[0]['date_start'];
    $data['time_start'] =  $bookings[0]['time_start'];
    $data['time_end'] =  $bookings[0]['time_end'];
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


    //agreement
    $sql = "SELECT * FROM agreement";
    $query = $dbh->prepare($sql);
    $query->execute();

    $service = $query->fetch(PDO::FETCH_ASSOC);


    $action = "printed ticket with booking id  $booking_id ";
    logAuditTrail($currentUser['id'], $action, $currentUser['email'], $currentUser['fullname'], $data['booking_id']);

    
    // include('booking.single.php');
}else{
    echo 'you acidentally viewed this page';
}


?>

<!DOCTYPE html>
<html lang="zxx" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Digital Invoica</title>
    <link href="assets/images/favicon/icon.png" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/media-query.css">
</head>
<body>
    <!--Invoice wrap start here -->
    <div class="invoice_wrap train-invoice">
        <div class="invoice-container">
            <div class="invoice-content-wrap" id="download_section">
                <!--Header start here -->
                <header class="train-header" id="invo_header">
                    <div class="invoice-logo-content">
                        <div class="invoice-logo">
                            <div>
                                <a href="train_booking.html" class="logo"><img src="../assets/images/logo/logo.png" width="200" alt="this is a invoice logo"></a>
                            </div>
                            
                            <div>
                                <div class="invo-cont-wrap">
                                    <div class="invo-social-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_6_108)"><path d="M19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5Z" stroke="#12151C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M3 7L12 13L21 7" stroke="#12151C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath ><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
                                    </div>
                                    <div class="invo-social-name">
                                        <p class="font-md-grey color-grey">NO 1 OKO-OGBA ROAD, IRHIRHI JUNCTION. BENIN EDO STATE. NIGERIA</p>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-header-contact pt-15">
                               
                                <div class="invo-cont-wrap">
                                    <div class="invo-social-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_6_108)"><path d="M19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5Z" stroke="#12151C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M3 7L12 13L21 7" stroke="#12151C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath ><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
                                    </div>
                                    <div class="invo-social-name">
                                        <a href="mailto:RESERVATION@LIORACITYEVENTCENTER.COM" class="font-18 color-grey">reservation@lioracityeventcenter.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invo-head-content">
                            <div class="train-header-sec">
                                <h1 class="train-txt">INVOICE</h1>
                                <div class="invo-head-wrap">
                                    <div class="w-40">Invoice No: </div>
                                    <div class="invo-num inter-400">#<?php echo $data['booking_id'];  ?></div>
                                </div>
                                <div class="invo-head-wrap invoi-date-wrap">
                                    <div class="w-40">Invoice Date: </div>
                                    <div class="invo-num inter-400"><?php echo date('d-m-Y'); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!--Header end here -->
                <!--Invoice content start here -->
                <section class="bus-booking-content pt-40" id="train_booking">
                    <div class="container">
                        <!--Invoice owner name start here -->
                        <div class="invoice-owner-conte-wrap">
                            <div class="invo-to-wrap width-50">
                                <div class="invoice-to-content">
                                    <p class="font-md color-light-black">Customer Info: </p>
                                    <h2 class="font-lg color-train pt-10"><?php echo $data['customer_fullname']; ?> </h2>
                                    <p class="font-md-grey color-grey pt-10">Phone: <?php echo $data['customer_phone']; ?> <br> Email: <?php echo $data['customer_email']; ?></p>
                                </div>
                            </div>
                            <div class="invo-pay-to-wrap width-50">
                                <div class="movie-detail-col train-detail-col border-bottom table-bg">
                                    <div class="font-md color-light-black w-90 text-left">Contact Person Details:</div>
                                    <div class="font-md-grey color-grey" ></div>
                                </div>
                                <div class="movie-detail-col border-bottom  train-detail-col">
                                    <div class="font-md color-light-black w-40 text-left">Name:</div>
                                    <div class="font-md-grey color-grey" > <?php echo $data['customer_contact_person_fullname']; ?> </div>
                                </div>
                                <div class="movie-detail-col border-bottom table-bg train-detail-col train-detail-col">
                                    <div class="font-md color-light-black w-40 text-left">  phone:</div>
                                    <div class="font-md-grey color-grey" ><?php echo $data['customer_contact_person_phone']; ?></div>
                                </div>
                                
                            </div>
                        </div>
                        <!--Invoice owner name end here -->
                        <!--Train info details start -->
                        <div class="money-send-title-wrap mt pt-40">
                            <h3 class="font-lg color-train transfer-title">Booking Info</h3>
                            <div class="mon-sent-content-wrap">
                                <div class="mon-send-left-data">
                                    <div class="mon-send-col-one">
                                        <span class="font-sm-500 color-light-black">Booking Stauts:</span>
                                        <span class="font-sm color-grey"><?php echo $data['status']; ?></span>
                                    </div>
                                    <div class="mon-send-col-one">
                                        <span class="font-sm-500 color-light-black">Booking From:</span>
                                        <span class="font-sm color-grey"><?php  echo $data['from']; ?></span>
                                    </div>
                                    <div class="mon-send-col-one">
                                        <span class="font-sm-500 color-light-black">Usage  Time:</span>
                                        <span class="font-sm color-grey"><?php echo $data['time_start']; ?> to <?php echo $data['time_end']; ?></span>
                                    </div>
                                    
                                </div>
                                <div class="mon-send-right-data">
                                    <div class="mon-send-col-two">
                                        <span class="font-sm-500 color-light-black">Number of Guest:</span>
                                        <span class="font-sm color-grey"><?php echo $data['number_of_guest']; ?></span>
                                    </div>
                                    <div class="mon-send-col-two">
                                        <span class="font-sm-500 color-light-black"> Apply Date:</span>
                                        <span class="font-sm color-grey"><?php echo $data['apply_date']; ?></span>
                                    </div>
                                    <div class="mon-send-col-two">
                                        <span class="font-sm-500 color-light-black">Event Type:</span>
                                        <span class="font-sm color-grey"><?php echo $data['type_of_event']; ?></span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!--Train info details end -->
                        <!--Train table data start here -->
                        <div class="table-wrapper pt-40">
                            <table class="invoice-table train-table">
                                <thead>
                                    <tr class="invo-tb-header">
                                        <th class="font-md color-light-black wid-20">Service Name</th>
                                        <th class="font-md color-light-black w-40">Description</th>
                                        <th class="font-md color-light-black width-20">Qty X Price</th>
                                        <th class="font-md color-light-black wid-20">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="invo-tb-body">
                                    <?php 
                                    $amountSubtotal = 0.00;
                                    foreach($data['services'] as $key => $value){

                                        $amountSubtotal = (remove_commas($amountSubtotal) + ($value["quantity"]*remove_commas($value["price"])));

                                        $price_with_comma =  addCommasToMoney(remove_commas($value["price"]));

                                        $pre_sum = addCommasToMoney(($value["quantity"]*remove_commas($value["price"])));

                                        $rapped = wordwrap($value["service_description"], 50, "<br />\n", true);
                                        echo '<tr class="invo-tb-row">
                                                <td class="font-sm"> '.$value["service_name"].'</td>
                                                <td class="font-sm"> '. $rapped.'</td>
                                                 <td class="font-sm ">&nbsp; '.$value["quantity"].' x &#8358;'.$price_with_comma.'</td>
                                                <td class="font-sm ">&nbsp; &#8358;'.$pre_sum.'</td>
                                            </tr>';
                                        }
                                     ?> 
                                </tbody>
                            </table>
                        </div>
                        <!--Train table data end here -->
                        <!--Invoice additional info start here -->
                        <div class="invo-addition-wrap pt-20">
                            <div class="invo-add-info-content">
                                <?php if(isset($data['message']) && !empty($data['message'])){ ?>
                                    <h3 class="font-md color-light-black">Additional Information:</h3>
                                    <p class="font-sm color-grey pt-10"><?php echo isset($data['message'])?$data['message']:""; ?>
                                    </p>
                                <?php } ?>
                                
                            </div>
                            <div class="invo-bill-total width-30">
                                <table class="invo-total-table">
                                    <tbody>
                                        <tr>
                                            <td class="font-md color-light-black ">Sub Total:</td>
                                            <td class="font-md-grey color-grey text-right">&#8358;<?php echo addCommasToMoney($amountSubtotal); ?></td>
                                        </tr>
                                        <?php if(!empty($data['tax'])){
                                            ?>

                                            <tr class="tax-row bottom-border">
                                            <td class="font-md color-light-black ">Tax <span class="font-md color-grey"></span></td>
                                            <td class="font-md-grey color-grey text-right">&#8358;<?php echo !empty($data['tax']) ? addCommasToMoney($data['tax']):"" ; ?></td>
                                        </tr>
                                        <?php
                                        }
                                        if(!empty($data['discount'])){
                                            ?>

                                            <tr class="tax-row bottom-border">
                                            <td class="font-md color-light-black ">Discount <span class="font-md color-grey"></span></td>
                                            <td class="font-md-grey color-grey text-right">&#8358; <?php echo !empty($data['discount']) == true ? '-'.addCommasToMoney($data['discount']):"" ; ?></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        
                                        <?php

                                        $discount = empty($data['discount']) == true? 0.0:remove_commas($data['discount']);
                                        $total = $discount == 0 ? ($amountSubtotal):($amountSubtotal - $discount);
                                        ?>
                                        <tr class="invo-grand-total">
                                            <td class="font-18-700 color-train font-18-500 pt-20">Grand Total:</td>
                                            <td class="font-18-500 color-light-black pt-20 text-right">&#8358;<?php echo addCommasToMoney($total); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--Invoice additional info end here -->
                        <!-- agreement -->
                        <!--Invoice additional info start here -->
                        <div class="invo-addition-wrap pt-20">
                            <div class=" width-100 ">
                                <h3 class="font-md color-light-black text-center">Agreement :</h3>
                                <p class="font-sm color-grey pt-10" id="summernoteContent">
                                </p>
                            </div>
                        </div>
                        <!-- agreement ended -->
                    </div>
                    <div class="train-thanks-bg bg-train ">
                        <p>Thank you for choosing our service. See you soon 🙂 . contact us <a href="tel:+12345678899" class="font-18 color-white ">+234 704 116 7461</a></p>
                    </div>
                </section>
                <!--Invoice content end here -->
            </div>
            <!--Bottom content start here -->
            <section class="agency-bottom-content d-print-none" id="agency_bottom">
                <!--Print-download content start here -->
                <div class="invo-buttons-wrap">
                    <div class="invo-print-btn invo-btns">
                        <a href="javascript:window.print()" class="print-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <g clip-path="url(#clip0_10_61)">
                                    <path d="M17 17H19C19.5304 17 20.0391 16.7893 20.4142 16.4142C20.7893 16.0391 21 15.5304 21 15V11C21 10.4696 20.7893 9.96086 20.4142 9.58579C20.0391 9.21071 19.5304 9 19 9H5C4.46957 9 3.96086 9.21071 3.58579 9.58579C3.21071 9.96086 3 10.4696 3 11V15C3 15.5304 3.21071 16.0391 3.58579 16.4142C3.96086 16.7893 4.46957 17 5 17H7" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M17 9V5C17 4.46957 16.7893 3.96086 16.4142 3.58579C16.0391 3.21071 15.5304 3 15 3H9C8.46957 3 7.96086 3.21071 7.58579 3.58579C7.21071 3.96086 7 4.46957 7 5V9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7 15C7 14.4696 7.21071 13.9609 7.58579 13.5858C7.96086 13.2107 8.46957 13 9 13H15C15.5304 13 16.0391 13.2107 16.4142 13.5858C16.7893 13.9609 17 14.4696 17 15V19C17 19.5304 16.7893 20.0391 16.4142 20.4142C16.0391 20.7893 15.5304 21 15 21H9C8.46957 21 7.96086 20.7893 7.58579 20.4142C7.21071 20.0391 7 19.5304 7 19V15Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_10_61">
                                        <rect width="24" height="24" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <span class="inter-700 medium-font">Print</span>
                        </a>
                    </div>
                    <div class="invo-down-btn invo-btns">
                        <a class="download-btn" id="generatePDF">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_5_246)">
                                <path d="M4 17V19C4 19.5304 4.21071 20.0391 4.58579 20.4142C4.96086 20.7893 5.46957 21 6 21H18C18.5304 21 19.0391 20.7893 19.4142 20.4142C19.7893 20.0391 20 19.5304 20 19V17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M7 11L12 16L17 11" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 4V16" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_5_246"><rect width="24" height="24" fill="white"/></clipPath></defs>
                            </svg>
                            <span class="inter-700 medium-font">Download</span>
                        </a>
                    </div>
                </div>
                <!--Print-download content end here -->
                <!--Note content start-->
                <div class="invo-note-wrap">
                    <div class="note-title">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_8_240)"><path d="M14 3V7C14 7.26522 14.1054 7.51957 14.2929 7.70711C14.4804 7.89464 14.7348 8 15 8H19" stroke="#12151C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M17 21H7C6.46957 21 5.96086 20.7893 5.58579 20.4142C5.21071 20.0391 5 19.5304 5 19V5C5 4.46957 5.21071 3.96086 5.58579 3.58579C5.96086 3.21071 6.46957 3 7 3H14L19 8V19C19 19.5304 18.7893 20.0391 18.4142 20.4142C18.0391 20.7893 17.5304 21 17 21Z" stroke="#12151C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 7H10" stroke="#12151C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 13H15" stroke="#12151C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M13 17H15" stroke="#12151C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_8_240"><rect width="24" height="24" fill="white"/>
                        </clipPath></defs></svg>
                        <span class="font-md color-light-black">Note:</span>
                    </div>
                    <h3 class="font-md-grey color-grey note-desc">This is computer generated receipt and does not require physical signature.</h3>
                </div>
                <!--Note content end-->
            </section>  
            <!--Bottom content end here -->
        </div>
    </div>
    <!--Invoice wrap End here -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jspdf.min.js"></script>
    <script src="assets/js/html2canvas.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        var encodedContent = "<?php echo $$service['description']; ?>";

        // Decode HTML entities back to HTML
        var decodedContent = decodeEntities(encodedContent);


        // Set the decoded HTML content to a div element
        document.getElementById("summernoteContent").innerHTML = decodedContent;



    </script>
</body>
</html>