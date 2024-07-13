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
                  <h3>Edit Email Password</h3>
                </div>
                <div class="col-sm-6 pe-0">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="../../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active"> Edit Email Password</li>
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
                      <h3 style="float: left;" class="card-title mb-0">Add New Password here</h3>
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
                        <input type="hidden" value="update_email" name="form_type" />
                        
                        <div class="mb-3">
                          <label class="form-label">Update Email Password</label>
                          <hr/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Enter new Password</label>
                          <input class="form-control" type="text" name="password" placeholder="Enter new password">
                        </div>
                        <div class="form-footer">
                          <button class="btn btn-primary btn-block" type="submit" value="email_update">Save</button>
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