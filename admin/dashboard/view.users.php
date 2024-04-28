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
                  <h3>Your Message history</h3>
                </div>
                <div class="col-sm-6 pe-0">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.data.php">                                       
                        <svg class="stroke-icon">
                          <use href="../../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">History</li>
                    <li class="breadcrumb-item active">Message history</li>
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
                    <a href="create.new.user.php" style="text-decoration: none;"><button style="float: right;" class="btn btn-square btn-success emailbox" type="button"> <i data-feather="edit"></i> Create User  </button></a>
                    <div style="clear: both;margin-bottom:20px;"></div> <!-- Clear floats -->
                </div>
                  <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                      <table class="display" id="basic-9" >
                      <thead>
                          <tr>
                            <th>fullname</th>
                            <th>username </th>
                            <th>email</th>
                            <th>phone</th>
                            <th>status</th>
                            <th>type</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            if(isset($registeredUsers) && !empty($registeredUsers)) {
                              foreach($registeredUsers as $registeredUser) {  
                                echo '
                                <tr>
                                  <td>'. $registeredUser['fullname'] .'</td>
                                  <td><span><i>'.$registeredUser['username'].'</i></span></td>
                                  <td> <span> '.$registeredUser['email'].'</span></td>
                                  <td> <span >'.$registeredUser['phone'].'</span></td>';
                                    $userStatus =  '<span class="badge rounded-pill badge-danger">Disabled</span>';
                                  if( $registeredUser['status'] == 'active' ){$userStatus = '<span class="badge rounded-pill badge-success">Enabled</span>'; }
                                  echo'<td>'.$userStatus .'</td>';
                                $messageStatus =' <span class="badge rounded-pill badge-info">Admin</span>'; 
                                if($registeredUser['type'] < 1 ){
                                    $messageStatus =' <span class="badge rounded-pill badge-primary"> User</span>'; 
                                }elseif($registeredUser['type'] == 5){ $messageStatus =' <span class="badge rounded-pill badge-success"> Super Admin</span>';}
                                 echo' <td>'.$messageStatus.'</td>
                                  <td> 
                                  <ul class="action">
                                      <li class="edit"><a href="create.new.user.php?id='.$registeredUser['id']."_".uniqid().'"><button class="btn btn-primary"><i class="icofont  icofont-edit" style="color: white;"></i></button> </a></li>

                                      <li class="edit"><a href="create.new.user.php?id='.$registeredUser['id']."_".uniqid().'"><button class="btn btn-danger"><i class="icofont icofont-trash" style="color: white;"></i></button> </a></li>';
                                      
                                      echo' 
                                  </ul>
                                  </td>
                                </tr>
                                ';
                              }
                            }else{
                              echo '<tr><td colspan="7" class="text-center"><span class="text-center badge rounded-pill badge-danger" style="text-align:centre;">No Messages for now</span></td></tr>';
                            }
                          ?>
                         
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>fullname</th>
                            <th>username </th>
                            <th>email</th>
                            <th>phone</th>
                            <th>status</th>
                            <th>type</th>
                            <th>Action</th>
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