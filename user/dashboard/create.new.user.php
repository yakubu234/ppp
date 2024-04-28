<?php 
include('../../conn/auth_checker.php');
error_reporting(E_ALL);


$userId =$_SESSION['obbsuid'] ;
$status = "enabled";
if(isset($_GET['id'])){
    $parts = explode('_', $_GET['id']); // Split the string at the underscore
    $id = $parts[0];
    // Fetch user data based on email
    $sql = "SELECT * FROM users WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();

    $selectedUser = $query->fetch(PDO::FETCH_ASSOC);
}
// Access the count using the key 'total_bookings
include('../../includes/header.php'); 

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
                  <h3>Create/Update user</h3>
                </div>
                <div class="col-sm-6 pe-0">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="../../assets/svg/icon-sprite.svg#stroke-home"></use>
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
                    <h3>Basic form</h3>
                    <p class="f-m-light mt-1">
                       Update or create records below..</p>
                       <p class="f-m-light mt-1 text-danger">
                       if you are creating a new user, its password is <b>password</b>..</p>
                  </div>
                  <div class="card-body">
                    <div class="card-wrapper border rounded-3">
                      <form class="row g-3" method="POST" action="../../handler/user.add.edit.php">
                        <input type="hidden" value="<?php echo isset($selectedUser['id'])? $selectedUser['id']:""; ?>" name="item_id" />
                        <div class="col-md-12">
                          <label class="form-label" for="inputEmail4">Fullname</label>
                          <input class="form-control" required id="inputEmail4" value="<?php echo isset($selectedUser['fullname'])? $selectedUser['fullname']:""; ?>"  required name="fullname" type="text" placeholder="Enter Fullname">
                        </div>
                        <div class="col-md-12">
                          <label class="form-label" for="inputEmail4">Username</label>
                          <input class="form-control" required id="inputEmail4" value="<?php echo isset($selectedUser['username'])? $selectedUser['username']:""; ?>"  required name="username" type="text" placeholder="Enter Username">
                        </div>

                        <div class="col-md-12">
                          <label class="form-label" for="inputEmail4">Email</label>
                          <input class="form-control" required id="inputEmail4" value="<?php echo isset($selectedUser['email'])? $selectedUser['email']:""; ?>" required name="email" type="text" placeholder="Enter email">
                        </div>

                        <div class="col-md-12">
                          <label class="form-label" for="inputEmail4">Phone</label>
                          <input class="form-control" required id="inputEmail4" value="<?php echo isset($selectedUser['phone'])? $selectedUser['phone']:""; ?>" required name="phone" type="text" placeholder="Enter Phone">
                        </div>
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect7">Select User Type</label>
                            <select class="form-control" id="exampleFormControlSelect7" required name="type">
                                <?php if(isset($selectedUser['type'])){
                                    $dd = $selectedUser['type'] == 0 ? 'User':(($selectedUser['type'] == 5)?"Super Admin":"Admin");
                                    echo '
                                    <option selected value="'.$selectedUser['type'].'">'. $dd.'</option>';
                                }else{
                                    echo '
                                    <option selected readonly>Select User Type</option>';
                                }
                                
                                ?>
                              <option value="2">Admin</option>
                              <option value="0">User</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect7">Select Status</label>
                            <select class="form-control" id="exampleFormControlSelect7" required name="status">
                                <?php if(isset($selectedUser['status'])){
                                    echo '
                                    <option value="'.$selectedUser['status'].'" selected readonly>'.$selectedUser['status'].'</option>';
                                }else{
                                    echo '
                                    <option selected readonly>Select Status</option>';
                                }
                                
                                ?>
                              <option value="active">Active</option>
                              <option value="inactive">Inactive</option>
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