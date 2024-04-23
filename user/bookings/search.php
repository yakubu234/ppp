<?php include('../../includes/header.php'); ?>
    <link rel="stylesheet" type="text/css" href="../../assets/css/vendors/photoswipe.css">
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
                <div class="col-12 col-sm-6 p-0">
                  <h3>Search Bookings</h3>
                </div>
                <div class="col-12 col-sm-6 p-0">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="../../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Search Pages</li>
                    <li class="breadcrumb-item active">Search Bookings</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid search-page">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <form class="theme-form">
                      <div class="input-group m-0 flex-nowrap">
                        <input class="form-control-plaintext" type="search" placeholder="Enter Booking code, your email, or your phone .." id="search_field"><span class="btn btn-primary input-group-text" onclick="searchBookings()">Search</span>
                      </div>
                    </form>
                  </div>
                  <div class="card-body">


                    
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
                      <table class="table table-bordered" id="show_bookings" >
                        <thead>
                          <tr>
                            <th>booking id</th>
                            <th>event type</th>
                            <th>date</th>
                            <th>number of guest</th>
                            <th>status</th>
                            <th>total amount</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <tr><td colspan="7" class="text-center" id="no_records"><span class="text-center badge rounded-pill badge-danger" style="text-align:centre;">No Booking records for now</span></td></tr>
                         
                        </tbody>
                        <tfoot>
                          <tr>
                          <th>booking id</th>
                            <th>event type</th>
                            <th>date</th>
                            <th>number of guest</th>
                            <th>status</th>
                            <th>total amount</th>
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
    <script src="../../assets/js/photoswipe/photoswipe.min.js"></script>
    <script src="../../assets/js/photoswipe/photoswipe-ui-default.min.js"></script>
    <script src="../../assets/js/photoswipe/photoswipe.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../../assets/js/script.js"></script>
    <script src="../../assets/js/theme-customizer/customizer.js"></script>
    <script>
              function searchBookings(data) {
                let search_field = document.getElementById('search_field').value;
                let search_key = 'search_key';
                    let forPost = new FormData();
                    forPost.append(search_key, search_field);

                    fetch('../../handler/search.php', {
                    method: 'POST',
                    body: forPost
                    })
                    .then(response => {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error('Failed to submit form');
                    }
                    })
                    .then(data => {
                    if (data.success) {
                        // Handle successful response
                        loadHtmlTable(data.data)
                    } else {
                        // Handle error response
                        console.log('Error: ' + data.message);
                    }
                    })
                    .catch(error => {
                    // Handle network errors
                    alert(error);
                    });
                }

                function loadHtmlTable(data){
                    if(data.length < 1) {
                        alert('there is a problem')
                    }else{  
                        let services = data;
                    var tbody = document.querySelector("#show_bookings tbody");
                        services.forEach(function(service, index) {
                            let bookingCount =`<tr><td>#${service.bookign_id}</td>
                                  <td><span class="badge rounded-pill badge-light-info">${service.event_type} </span></td>
                                  <td> <span class="badge rounded-pill badge-primary">${service.date_start}   to  ${service.date_end} </span></td>
                                  <td> <span class="badge rounded-pill badge-info"> ${service.number_of_guest} </span></td>`;
                            
                                  var bookingStatus =' <span class="badge rounded-pill badge-danger">Under Review</span>'; 
                                  if(service.status == 'approved') bookingStatus =' <span class="badge rounded-pill badge-success">'+service.status+'</span>';
                                  
                                  tbody.innerHTML +=` ${bookingCount} <td>${bookingStatus}</td>
                                  <td>&#x20A6;${service.total_amount}</td>
                                  <td> 
                                  <ul class="action">
                                      <li class="edit"><a href="booking.single.data.php?id=${service.bookign_id}"><button class="btn btn-primary"><i class="icofont icofont-open-eye" style="color: white;"></i></button> </a></li> 
                                  </ul>
                                  </td>
                                </tr>`;
                        });

                        var noRecordsRow = document.getElementById('no_records');
                        if (noRecordsRow) {
                            noRecordsRow.remove();
                        }
                    }

                }
    </script>
    <?php include('../../error_handler.php'); ?>
    <!-- Plugin used-->
  </body>
</html>