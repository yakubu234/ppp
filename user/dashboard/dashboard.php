<?php include('../../includes/header.php');  ?>

    <link rel="stylesheet" type="text/css" href="../../assets/css/vendors/calendar.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/vendors/datatables.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/vendors/owlcarousel.css">
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
        <div class="page-body">
          <div class="container-fluid">        
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6 p-0">
                  <h3>Default Dashboard </h3>
                </div>
                <div class="col-sm-6 p-0">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.data.php">
                        <svg class="stroke-icon">
                          <use href="../../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Default      </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid default-dashboard">
            <div class="row">
             
              <div class="col-xl-8 col-xl-100 box-col-12">
                <div class="row"> 

                  <div class="col-xxl-3 col-xl-33 col-sm-4 proorder-xl-2">
                    <a href="../bookings/booking_history.data.php" style="text-decoration: none;" >
                    <div class="card since">
                      <div class="card-body">
                        <div class="customer-card d-flex b-l-primary border-2">
                          <div class="ms-3">
                            <h3 class="mt-1">Booking Hitstory</h3>
                            <h5 class="mt-1"><?php echo $totalBookings; ?></h5>
                          </div>
                          <div class="dashboard-user bg-light-primary"><span></span>
                          <i class="fa fa-calendar-o" style="font-size: 2.2em;" ></i>
                           
                          </div>
                        </div>
                        <div class="customer mt-2"><span class="me-1">
                            <svg>
                              <use href="../../assets/svg/icon-sprite.svg#arrow-up"></use>
                            </svg></span><span class="font-success me-2">+ 4.6%</span><span>Since last Week</span></div>
                      </div>
                    </div>
                    </a>
                  </div>
                  <div class="col-xxl-3 col-xl-33 col-sm-4 proorder-xl-3">
                    
                  <a href="../message/message.data.php" style="text-decoration: none;" >
                    <div class="card since">
                      <div class="card-body money">
                        <div class="customer-card d-flex b-l-secondary border-2">
                          <div class="ms-3">
                            <h3 class="mt-1">In mails</h3>
                            <h5 class="mt-1"><?php echo $totalMessages; ?></h5>
                          </div>
                          <div class="dashboard-user bg-light-secondary"><span></span>
                          <i class="fa fa-envelope-o" style="font-size: 2.2em;" ></i>
                          </div>
                        </div>
                        <div class="customer mt-2"><span class="me-1">
                            <svg>
                              <use href="../../assets/svg/icon-sprite.svg#arrow-up"></use>
                            </svg></span><span class="font-success me-2">+ 3.10%</span><span>Since last Week</span></div>
                      </div>
                    </div>
                    </a>
                  </div>
                  <div class="col-xxl-3 col-xl-33 col-sm-4 proorder-xl-4">
                  <a href="../services/services.data.php" style="text-decoration: none;" >
                    <div class="card since"> 
                      <div class="card-body profit">
                        <div class="customer-card d-flex b-l-danger border-2">
                          <div class="ms-3">
                            <h3 class="mt-1">Available Services</h3>
                            <h5 class="mt-1"><?php  echo $totalServices; ?> </h5>
                          </div>
                          <div class="dashboard-user bg-light-danger"><span></span>
                          <i class="fa fa-envelope-o" style="font-size: 2.2em;" ></i>
                          </div>
                        </div>
                        <div class="customer mt-2"><span class="me-1">
                            <svg>
                              <use href="../../assets/svg/icon-sprite.svg#arrow-down"></use>
                            </svg></span><span class="font-danger me-2">+ 2.3%</span><span>Since last Week</span></div>
                      </div>
                    </div>
                    </a>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->

          <!-- Container-fluid starts calendar-->
          <div class="container-fluid calendar-basic">
            <div class="card">
              
              <div class="card-body">
                <div class="row" id="wrap">
                  <div class="col-xxl-3 box-col-4e">
                    <div class="md-sidebar mb-3"><a class="btn btn-primary md-sidebar-toggle" href="javascript:void(0)">calendar filter</a>
                      <div class="md-sidebar-aside job-left-aside custom-scrollbar">
                        <div id="external-events">
                          <h4>Available Bookings Calendar</h4>
                          <p class="text-success"> You can check the below calendar to view available bookings</p>
                          <div id="external-events-list">
                            <!-- <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event">
                              <div class="fc-event-main"> <i class="fa fa-birthday-cake me-2"></i>Birthday Party</div>
                            </div>
                            <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event">
                              <div class="fc-event-main"> <i class="fa fa-user me-2"></i>Meeting With Team.</div>
                            </div>
                            <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event">
                              <div class="fc-event-main"> <i class="fa fa-plane me-2"></i>Tour & Picnic</div>
                            </div>
                            <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event">
                              <div class="fc-event-main"> <i class="fa fa-file-text me-2"></i>Reporting Schedule</div>
                            </div>
                            <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event">
                              <div class="fc-event-main"> <i class="fa fa-briefcase me-2"></i>Lunch & Break</div>
                            </div> -->
                          </div>
                          <!-- <p>
                            <input class="checkbox_animated" id="drop-remove" type="checkbox">
                            <label for="drop-remove">remove after drop</label>
                          </p> -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xxl-9 box-col-8">
                    <div class="calendar-default" id="calendar-container">
                      <div id="calendar"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends calendar-->
        </div>
        <!-- footer start-->
        <?php  include('../../includes/footer.php'); ?>
      </div>
    </div>
    
    <!-- latest jquery -->
    <?php include('../../includes/js.php'); ?>
    
    <script src="../../assets/js/calendar/fullcalendar.min.js"></script>
    <script src="../../assets/js/calendar/fullcalendar-custom.js"></script>
    <script src="../../assets/js/chart/morris-chart/raphael.js"></script>
    <script src="../../assets/js/chart/morris-chart/morris.js"> </script>
    <script src="../../assets/js/chart/morris-chart/prettify.min.js"></script>
    <script src="../../assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="../../assets/js/dashboard/default.js"></script>
    <script src="../../assets/js/notify/index.js"></script>
    <script src="../../assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="../../assets/js/datatable/datatables/datatable.custom.js"></script>
    <script src="../../assets/js/datatable/datatables/datatable.custom1.js"></script>
    <script src="../../assets/js/owlcarousel/owl.carousel.js"></script>
    <script src="../../assets/js/owlcarousel/owl-custom.js"></script>
    <script src="../../assets/js/typeahead/handlebars.js"></script>
    <script src="../../assets/js/typeahead/typeahead.bundle.js"></script>
    <script src="../../assets/js/typeahead/typeahead.custom.js"></script>
    <script src="../../assets/js/typeahead-search/handlebars.js"></script>
    <script src="../../assets/js/typeahead-search/typeahead-custom.js"></script>
    <script src="../../assets/js/height-equal.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../../assets/js/script.js"></script>
    <script src="../../assets/js/theme-customizer/customizer.js"></script>
    <!-- Plugin used-->
    
    <?php include('../../error_handler.php'); ?>
  </body>
</html>