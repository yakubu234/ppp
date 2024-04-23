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
                    <button style="float: right;" class="btn btn-square btn-success emailbox" type="button" data-bs-toggle="modal" data-bs-target="#compose_mail"> <i data-feather="edit"></i> New Message  </button></a>
                    <div style="clear: both;margin-bottom:20px;"></div> <!-- Clear floats -->
                </div>
                  <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                      <table class="display" id="basic-9" >
                      <thead>
                          <tr>
                            <th>name</th>
                            <th>recepitent </th>
                            <th>subject</th>
                            <th>time</th>
                            <th>status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            if(isset($messages) && !empty($messages)) {
                              foreach($messages as $message) {  
                                echo '
                                <tr>
                                  <td>'. $message['email'] .'</td>
                                  <td><span class="badge rounded-pill badge-light-info">'.$message['recepient'].'</span></td>
                                  <td> <span class="badge rounded-pill badge-primary"> '.$message['subject'].'</span></td>
                                  <td> <span class="badge rounded-pill badge-info">'.$message['created_at'].'</span></td>';
                                $messageStatus =' <span class="badge rounded-pill badge-success">New</span>'; 
                                  if($message['is_read']) $messageStatus =' <span class="badge rounded-pill badge-primary"> Read</span>'; 
                                 echo' <td>'.$messageStatus.'</td>
                                  <td> 
                                  <ul class="action">
                                      <li class="edit"><a href="message.view.data.php?id='.$message['id']."_".uniqid().'"><button class="btn btn-primary"><i class="icofont icofont-open-eye" style="color: white;"></i></button> </a></li> ';
                                      
                                      echo $currentUser['type'] > 0 ? '
                                      <li class="edit"><a title="Delete" href="message.view.data.php/'.$message['id'].'"><button class="btn btn-danger"><i class="icofont icofont-trash" style="color: white;"></i></button> </a></li>':"";
                                      
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
                          <th>name</th>
                            <th>email </th>
                            <th>subject</th>
                            <th>responder email</th>
                            <th>status</th>
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