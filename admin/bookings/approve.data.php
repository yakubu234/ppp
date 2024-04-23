<?php 
include('../../conn/auth_checker.php');
error_reporting(E_ALL);


$userId =$_SESSION['obbsuid'] ;
$status = "enabled";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    // Fetch user data based on email
    $sql = "SELECT * FROM bookings WHERE bookign_id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();

    $bookingInfo = $query->fetch(PDO::FETCH_ASSOC);
    
}
// Access the count using the key 'total_bookings
include('../../includes/header.php'); 

if(isset($_POST['']) ){

}
?>
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
    <!-- loader starts-->
    
    <?php include('../../includes/nav.php'); ?>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6 ps-0">
                  <h3>Approve Booking</h3>
                </div>
                <div class="col-sm-6 pe-0">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Form Controls</li>
                    <li class="breadcrumb-item active">Base inputs</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header pb-0">
                    <h3>Approval form</h3>
                    <p class="f-m-light mt-1">
                       Approve the below booking</p>
                  </div>
                  <div class="card-body">
                    <div class="card-wrapper border rounded-3">
                      <form class="row g-3" method="POST" action="../../handler/approve.add.edit.php">
                        <input type="hidden" value="<?php echo isset($bookingInfo['id'])? $bookingInfo['id']:""; ?>" name="item_id" />
                        <input type="hidden" value="<?php echo isset($bookingInfo['bookign_id'])? $bookingInfo['bookign_id']:""; ?>" name="booking_id" />
                        <div class="col-md-12">
                          <label class="form-label" for="inputEmail4">Booking Type</label>
                          <input class="form-control" required id="inputEmail4" value="<?php echo isset($bookingInfo['event_type'])? $bookingInfo['event_type']:""; ?>"  required name="type" type="text" readonly placeholder="Enter Service Name">
                        </div>
                        <div class="col-md-12">
                          <label class="form-label" for="inputEmail4">Date </label>
                          <input class="form-control" required id="inputEmail4" value="<?php echo isset($bookingInfo['date_start'])? $bookingInfo['date_start']:""; ?>"  required name="start_date" type="text" readonly placeholder="Enter Service Name">
                        </div>



                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect7">Select Status</label>
                            <select class="form-control" id="exampleFormControlSelect7" required name="status">
                                <?php if(isset($bookingInfo['status'])){
                                    echo '
                                    <option value="'.$bookingInfo['status'].'" selected readonly>'.$bookingInfo['status'].'</option>';
                                }else{
                                    echo '
                                    <option selected readonly>Select Status</option>';
                                }
                                
                                ?>
                              <option value="approved">approve</option>
                              <option value="declined">decline</option>
                            </select>
                          </div>
                        </div>


                        <div class="col-12">
                          <button class="btn btn-primary" type="submit">Submit </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
                 
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 p-0 footer-copyright">
                <p class="mb-0">Copyright 2023 © Dunzo theme by pixelstrap.</p>
              </div>
              <div class="col-md-6 p-0">
                <p class="heart mb-0">Hand crafted &amp; made with
                  <svg class="footer-icon">
                    <use href="../assets/svg/icon-sprite.svg#heart"></use>
                  </svg>
                </p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    
    <?php include('../../includes/js.php'); ?>
    <script src="../../assets/js/header-slick.js"></script>
    <script src="../../assets/js/height-equal.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../../assets/js/script.js"></script>
    <script src="../../assets/js/theme-customizer/customizer.js"></script>
    
    
    <?php include('../../error_handler.php'); ?>
  </body>
</html> 