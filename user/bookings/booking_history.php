<?php include('../../includes/header.php'); ?>
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/vendors/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/vendors/datatables.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/vendors/prism.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/responsive.css">
  </head>
  <body> 
    
        <?php include('../../includes/nav.php'); ?>
        <!-- Page Sidebar Ends-->
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6 ps-0">
                  <h3>Your booking history</h3>
                </div>
                <div class="col-sm-6 pe-0">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.data.php">                                       
                        <svg class="stroke-icon">
                          <use href="../../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">History</li>
                    <li class="breadcrumb-item active">Booking history</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
             
               
              <!-- State saving Starts-->
              <div class="col-sm-12">
                <div class="card">
                <div class="card-header pb-0 card-no-border">
                    <h3 style="float: left;">State saving</h3>
                    <a href="new_booking.data.php" style="text-decoration: none;" ><button style="float: right;" class="btn btn-square btn-success" type="button"> <i data-feather="edit"></i> Book Now  </button></a>
                    <div style="clear: both;margin-bottom:20px;"></div> <!-- Clear floats -->
                </div>
                  <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                      <table class="display" id="basic-9" >
                        <thead>
                          <tr>
                            <th>booking id</th>
                            <th>event type</th>
                            <th>date</th>
                            <th>number of guest</th>
                            <th>status</th>
                            <th>total amount</th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            if(isset($bookings) && !empty($bookings)) {
                              foreach($bookings as $booking) {  
                                echo '
                                <tr>
                                  <td>#'.$booking['bookign_id'].'</td>
                                  <td><span class="">'.$booking['event_type'].'</span></td>
                                  <td> <span class=""> <b>'.$booking['date_start'].  " from ". $booking['time_start'].' to '.$booking['time_end'].'</b></span></td>
                                  <td> <span class="">'.$booking['number_of_guest'].'</span></td>';
                                $bookingStatus =' <span class="badge rounded-pill badge-primary">Under Review</span>'; 
                                  if($booking['status'] == 'approved') $bookingStatus =' <span class="badge rounded-pill badge-success">'.$booking['status'].'</span>'; 
                                  if($booking['status'] == 'declined') $bookingStatus =' <span class="badge rounded-pill badge-danger">'.$booking['status'].'</span>'; 
                                 echo' <td>'.$bookingStatus.'</td>
                                  <td>&#x20A6;'.$booking['total_amount'].'</td>
                                  <td> 
                                  <ul class="action">
                                      <li class="edit"><a href="booking.single.data.php?id='.$booking['bookign_id'].'"><button class="btn btn-primary"><i class="icofont icofont-open-eye" style="color: white;"></i></button> </a></li> 
                                  </ul>
                                  </td> 
                                  <td> 
                                  <ul class="action">
                                      
                                  </ul>
                                  </td> 
                                  <td> 
                                  <ul class="action">
                                     
                                  </ul>


                                  </td>
                                </tr>
                                ';
                              }
                            }else{
                              echo '<tr><td colspan="7" class="text-center"><span class="text-center badge rounded-pill badge-danger" style="text-align:centre;">No Booking records for now</span></td></tr>';
                            }
                          ?>
                         
                        </tbody>
                        <tfoot>
                          <tr>
                          <th>booking id</th>
                            <th>event type</th>
                            <th>date</th>
                            <th>number of guest</th>
                            <th>status</th>
                            <th>total amount</th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- State saving Ends-->
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <?php  include('../../includes/footer.php'); ?>
      </div>
    </div>
    
    <!-- latest jquery -->
    <?php include('../../includes/js.php'); ?>
    <script src="../../assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="../../assets/js/datatable/datatables/datatable.custom.js"></script>
    <script src="../../assets/js/prism/prism.min.js"></script>
    <script src="../../assets/js/clipboard/clipboard.min.js"></script>
    <script src="../../assets/js/custom-card/custom-card.js"></script>
    <script src="../../assets/js/tooltip-init.js"></script>
    <script src="../../assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="../../assets/js/icons/icons-notify.js"></script>
    <script src="../../assets/js/icons/feather-icon/feather-icon-clipart.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../../assets/js/script.js"></script>
    <script src="../../assets/js/theme-customizer/customizer.js"></script>
    <!-- Plugin used-->
    
    <?php include('../../error_handler.php'); ?>
  </body>
</html> 