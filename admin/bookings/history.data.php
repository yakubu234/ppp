<?php 

include('../../conn/auth_checker.php');
error_reporting(E_ALL);

$currentUser = $_SESSION["current_user"];
$userId =$_SESSION['obbsuid'] ;


if(isset($_GET['id'])){ $booking_id = $_GET['id']; }else{ header('Location:booking_history.data.php'); }

// Fetch user data based on email
$sql = "SELECT * FROM audits WHERE booking_id=:booking_id";
$query = $dbh->prepare($sql);
$query->bindParam(':booking_id', $booking_id, PDO::PARAM_STR);
$query->execute();

$audits = $query->fetchAll(PDO::FETCH_ASSOC);

include('../../includes/header.php'); 

?>
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
                  <h3>Audit of activities</h3>
                </div>
                <div class="col-sm-6 pe-0">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.data.php">                                       
                        <svg class="stroke-icon">
                          <use href="../../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Audit</li>
                    <li class="breadcrumb-item active">View all Services</li>
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
               <!--  <div class="card-header pb-0 card-no-border">
                    <h3 style="float: left;">All Available Services</h3>
                    <a href="../bookings/new_booking.data.php" style="text-decoration: none;" ><button style="float: right;" class="btn btn-square btn-success" type="button"> <i data-feather="bookmark"></i> Book Now </button></a>
                    <div style="clear: both;margin-bottom:20px;"></div> !-- Clear floats ->
                </div> -->
                  <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                      <table class="display" id="basic-9" border="1">
                        <thead>
                          <tr>
                            <th></th>
                            <th>name</th>
                            <th>email</th>
                            <th>action</th>
                            <th>booking id</th>
                            <th>date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            if(isset($audits ) && !empty($audits)) {
                              foreach($audits as $key => $audit) {  
                                echo '
                                <tr>
                                  <td>'.($key + 1).'</td>
                                  <td>'.$audit['user_name'].'</td>
                                  <td>'.$audit['user_email'].'</td>
                                  <td>'.$audit['action'].'</td>
                                  <td>'.$audit['booking_id'].'</td>
                                  <td>'.$audit['created_at'].'</td>

                                </tr>
                                ';
                              }
                            }else{
                              echo '<tr><td colspan="3">No Audit records for this booking for now</td></tr>';
                            }
                          ?>
                        </tbody>
                        <tfoot>
                          <tr>
                          	<th></th>
                            <th>name</th>
                            <th>email</th>
                            <th>action</th>
                            <th>booking id</th>
                            <th>date</th>
                          
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
    
    <?php include('../../error_handler.php'); ?>
    <!-- Plugin used-->
  </body>
</html> 