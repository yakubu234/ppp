<?php include('../../includes/header.php');  ?>
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
                  <h3>Edit Profile</h3>
                </div>
                <div class="col-sm-6 pe-0">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="../../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active"> Edit Profile</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="edit-profile">
              <div class="row">
                <div class="col-xl-4">
                  <div class="card">
                    <div class="card-header pb-0">
                      <h3 style="float: left;" class="card-title mb-0">My Profile</h3>
                        <div class="card-options">
                        <form method="POST"action="../../handler/update.profile.php">
                    
                    <input type="hidden" value="profile_update" name="form_type" />
                    <input type="hidden" value="inactive" name="status" />
                    <input type="hidden" value="" name="fullname" />
                    <input type="hidden" value="" name="username" />
                    <input type="hidden" value="" name="email" />
                    <input type="hidden" value="" name="phone" />
                            <button style="float: right;" class="btn btn-square btn-danger" type="submit">
                             <i data-feather="trash-2"></i> Delete Account  </button></form>
                        </div>
                        <div style="clear: both;margin-bottom:20px;"></div> <!-- Clear floats -->
                    </div>
                    <div class="card-body">
                      <form method="POST" action="../../handler/update.profile.php">
                        <input type="hidden" value="password_update" name="form_type" />
                        <div class="row mb-2">
                          <div class="profile-title">
                            <div class="d-flex">                       
                             <img class="img-70 rounded-circle" alt="" src="../../assets/images/user/7.jpg">
                              <div class="flex-grow-1">
                                <h3 class="mb-1"><?php echo $currentUser['fullname'] ?></h3>
                                <p><?php echo $currentUser['type'] > 0 ? "Admin":"User"; ?></p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Update Password</label>
                          <hr/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Enter new Password</label>
                          <input class="form-control" type="password" name="password" placeholder="Enter new password">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Confirm New Password</label>
                          <input class="form-control" type="password" name="password_confirm" placeholder="Confrim new password">
                        </div>
                        <div class="form-footer">
                          <button class="btn btn-primary btn-block" type="submit" value="Update_password">Save</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-xl-8">
                  <form class="card" method="POST" action="../../handler/update.profile.php">
                    
                  <input type="hidden" value="profile_update" name="form_type" />
                    <div class="card-header pb-0">
                      <h3 class="card-title mb-0">Edit Profile</h3>
                      <div class="card-options"><a class="card-options-collapse" href="edit-profile.html#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="edit-profile.html#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">

                      <div class="row">
                        
                        <div class=" col-md-12">
                          <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input class="form-control" type="email"  name="email" value="<?php echo $currentUser['email'] ?>" placeholder="Email">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label">FUll name</label>
                            <input class="form-control" type="text" name="fullname" value="<?php echo $currentUser['fullname'] ?>" placeholder="fullname">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input class="form-control" type="text" name="username" value="<?php echo $currentUser['username'] ?>" placeholder="Username">
                          </div>
                        </div>
                        
                        <input type="hidden" value="" name="status" />  
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input class="form-control" type="text" name="phone" value="<?php echo $currentUser['phone'] ?>"  placeholder="Home Address">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-end">
                      <button class="btn btn-primary" type="submit">Update Profile</button>
                    </div>
                  </form>
                </div>


              </div>
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
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../../assets/js/script.js"></script>
    <script src="../../assets/js/theme-customizer/customizer.js"></script>
    <!-- Plugin used-->
    
    <?php include('../../error_handler.php'); ?>
  </body>
</html>