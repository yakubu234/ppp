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
                  <h3>Letter Box</h3>
                </div>
                <div class="col-sm-6 ps-0">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="../../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Email</li>
                    <li class="breadcrumb-item active"> Letter Box</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="email-wrap email-main-wrapper">
              <div class="row">
                <!-- start -->
                <div class="col-xxl-12 col-xl-12 box-col-12">
                  <div class="email-right-aside">
                    <div class="card email-body email-read " style="display: inline-block;">
                      <div class="mail-header-wrapper header-wrapper1">
                        <div class="mail-header1">
                          <a href="message.data.php" style="text-decoration:none;" ><div class="light-square"> 
                            <svg class="btn-email">
                              <use href="../../assets/svg/icon-sprite.svg#back-arrow"></use>
                            </svg>
                          </div></a><span><?php echo $message['subject'] ?></span>
                        </div>
                        <div class="mail-body1"> 
                            
                       <button class="btn btn-primary emailbox" type="button" data-bs-toggle="modal" data-bs-target="#compose_mail"><i class="fa fa-plus"></i> Compose Email</button>
                          
                        </div>
                      </div>
                      <div class="mail-body-wrapper"> 
                        <div class="user-mail-wrapper">
                          <div class="user-title">
                            <div> 
                              <div class="rounded-border"> <img class="img-fluid" src="../../assets/images/user/12.png" alt="user"></div>
                              <div class="dropdown-subtitle">
                                <p><?php echo $message['name'] ?></p>
                                <div class="onhover-dropdown">
                                  <button class="btn p-0 dropdown-button">To me <i data-feather="chevron-down"> </i></button>
                                  <!-- <div class="inbox-security onhover-show-div">
                                    <p>From: <span>jones &lt;jacobjones3@gmail.com&gt;</span></p>
                                    <p>to: <span>donut.horry@gmail.com</span></p>
                                    <p>reply-to:<span>&lt;jacobjones3@gmail.com&gt;</span></p>
                                    <p>date: <span>Jul 13, 2023, 7:10 AM</span></p>
                                    <p>subject: <span>Important Account Security Update</span></p>
                                    <p>security: <span>standard encryption (TLS)</span></p>
                                  </div> -->
                                </div>
                              </div>
                            </div>
                            <div class="inbox-options"> <span><?php echo $formatted_time; ?></span>
                              <div class="light-square"> 
                                <svg class="important-mail">
                                  <use href="../../assets/svg/icon-sprite.svg#mail-star"></use>
                                </svg>
                              </div>
                              <div class="light-square" onclick="myFunction()">
                                <svg> 
                                  <use href="../../assets/svg/icon-sprite.svg#print"></use>
                                </svg>
                              </div>
                            </div>
                          </div>
                          <div class="user-body">
                            Recepient: <?php echo $message['recepient'] ?>
                            <p><?php echo $message['message'] ?></p>
                          </div>

                          <?php
                            if( $currentUser['type'] > 0){
                            
                              ?>
                                 <!-- reply box -->
                            <form method="POST" action="">
                          <div class="user-footer"> 
                            <h3>Reply below</h3>
                            <div class="toolbar-box">
                              <div id="toolbar">
                                <button class="ql-bold">Bold </button>
                                <button class="ql-italic">Italic </button>
                                <button class="ql-underline">underline</button>
                                <button class="ql-strike">Strike </button>
                                <button class="ql-list" value="ordered">List </button>
                                <button class="ql-list" value="bullet"> </button>
                                <button class="ql-indent" value="-1"> </button>
                                <button class="ql-indent" value="+1"></button>
                                <button class="ql-link"></button>
                                <button class="ql-image"></button>
                              </div>
                              <div id="editor"> </div>
                            </div>
                          </div>
                          <div class="send-btn"> 
                            <button class="btn btn-primary">Reply<i class="fa fa-paper-plane"> </i></button>
                          </div>
                          
                          </form>
                              <?php
                            } 
                          ?>
                           
                        </div>
                      </div>
                    </div>



                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Container-fluid Ends-->
        <!-- footer start-->
        <?php  include('../../includes/footer.php'); ?>
      </div>
    </div>
    
    <!-- latest jquery -->
    <?php include('../../includes/js.php'); ?>
    <script src="../../assets/js/letter-box/custom-mail-pagination.js"></script>
    <script src="../../assets/js/letter-box/custom-usermail.js"></script>
    <script src="../../assets/js/editors/quill.js"></script>
    <script src="../../assets/js/editors/custom-quill.js"></script>
    <script src="../../assets/js/print.js"></script>
    <script src="../../assets/js/tooltip-init.js"></script>
    <!-- Plugins JS Ends-->

    <!-- Theme js-->
    <script src="../../assets/js/script.js"></script>
    <script src="../../assets/js/theme-customizer/customizer.js"></script>
    <!-- Plugin used-->
    
    <?php include('../../error_handler.php'); ?>
  </body>
</html>