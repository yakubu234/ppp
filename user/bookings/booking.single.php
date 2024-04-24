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
                <a href="new_booking.data.php" >
                    <button style="float: right;" class="btn btn-square btn-success emailbox" type="button" > <i data-feather="edit"></i> Make Booking  </button></a>
                    <div style="clear: both;margin-bottom:20px;"></div> <!-- Clear floats -->
                </div>
                  <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                    <table class="table table-bordered" id="consent_show_summary">
                          <thead>
                            <tr>
                              <th colspan="7" class="text-center"> Preview of your booking infomation.</th>
                            </tr>
                            <tr>
                              <td colspan="7" class="text-center"> <span class="text-danger" >Please </span> read the information below carefully to confirm they are correct, please tick the <span class="text-danger"> I agree</span> box to proceed or go to previous to edit your bookings.</td>
                            </tr>
                            <tr>
                              <th colspan="7"></th>
                            </tr>
                          </thead>
                         
                          <tbody>
                            
                          </tbody>
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
    <script src="../../assets/js/height-equal.js"></script>
    <script src="../../assets/js/flat-pickr/flatpickr.js"></script>
    <script src="../../assets/js/flat-pickr/custom-flatpickr.js"></script>
    
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../../assets/js/script.js"></script>
    <script src="../../assets/js/theme-customizer/customizer.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../../assets/js/script.js"></script>
    <script src="../../assets/js/theme-customizer/customizer.js"></script>
    <!-- Plugin used-->
    <script>
        
        
        var booking_details = <?php echo json_encode($data); ?>;
        let currentuser = <?php echo $currentUser['type']; ?>;
        formatConsentToDisply(booking_details, currentuser)
       
      function removeCommas(formattedAmount) {
        // """
        // Removes commas from a formatted naira string.

        // Args:
        //     formattedAmount: The formatted naira string with commas.

        // Returns:
        //     The original number without commas as a float.
        // """

        // Replace commas with an empty string using regular expression
        const amountWithoutCommas = formattedAmount.replace(/,/g, "");

        // Convert the string to a float for calculations
        return parseFloat(amountWithoutCommas);
      }

      function formatMoney(amount) {
          // Check if amount is less than 4 digits, no need for formatting
          // if (absoluteAmount.toString().length < 4) {
          //   return sign + "₦"+ absoluteAmount+".00";
          // }
          const sign = amount < 0 ? "-" : "";
          const absoluteAmount = Math.abs(amount);
        
          // Convert to string to handle large numbers more reliably
          const amountString = absoluteAmount.toString();
        
          // Separate millions (if any)
          const millionsPart = amountString.slice(0, -6); // Extract up to 6 digits from the left (millions)
          const remainingPart = amountString.slice(-6); // Extract the last 6 digits (remaining)
        
          // Format remaining amount with commas (manual formatting)
          const formattedRemaining = remainingPart.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        
          // Combine millions and remaining parts
          const formattedAmount = sign + (millionsPart ? millionsPart + ',' : '') + formattedRemaining + ".00";
        
          return "₦" + formattedAmount;

      }

      function formatConsentToDisply(data, currentuser)
      {
        const urlParams = new URLSearchParams(window.location.search);
    var bookingId = urlParams.get('id');
        console.log(data)
        var tbody = document.querySelector("#consent_show_summary tbody");
        // var newRow = tbody.insertRow();
        let messgae = (data.message == "" ||  data.message == false || data.message == null) ? 'N/A':data.message ;
           let new_table = '<tr><th>Client Name:</th> <td colspan="3"> '+data.customer_fullname+'</td> <th>Client Number</th>  <td colspan="2"> '+data.customer_phone+'</td> </tr><tr><th>Client Email:</th> <td colspan="3">  '+data.customer_email+'</td><th>Customer  Address</th> <td colspan="2"> '+data.customer_address+'</td> </tr><tr><th>Contact person  Name:</th> <td colspan="3">  '+data.customer_contact_person_fullname+'</td><th>Contact Person Phone </th> <td colspan="2"> '+data.customer_contact_person_phone+'</td> </tr><tr><th>Booking Stauts:</th> <td colspan="3"> '+data.status+'</td><th>Event Type</th> <td colspan="2"> '+data.type_of_event+'</td> </tr> <tr><th>Booking Date:</th> <td colspan="3"> '+data.from+'</td> <th>Time</th>  <td colspan="2"> '+data.time_start+' to '+data.time_end+'</td></tr><tr><th >Number of Guest:</th><td colspan="3"> '+data.number_of_guest+'</td> <th>Apply Date</th>  <td colspan="2">'+data.apply_date+'</td></tr><tr><th >Message (if any)?</th><td colspan="6"> '+messgae+'</td> </tr> <tr><th colspan="7"></th> </tr>';
        
            var services = data.services;
            var sub_total;let pre_total = 0.0;
            services.forEach(function(service, index) {

        let selectedPrice = formatMoney(removeCommas(service.price));
              sub_total = parseFloat(service.quantity * removeCommas(service.price)).toFixed(2);
                pre_total = (parseFloat(pre_total)+parseFloat(sub_total)); 
                let formatedSubTotal = formatMoney(sub_total)
                new_table += '<th colspan="2">Service Name: <b><i>'+service.service_name+'</i></b></th><th> Desc</th><td>'+service.service_description+'</td><th> Price : '+selectedPrice+'</th><th>Qty:  '+service.quantity+'</th><th>Sub Total: '+formatedSubTotal+'</th> </tr>';
              });

              let discount =  (data.discount == null || data.discount == "" ||  data.discount == false)? 0.0:parseFloat(removeCommas(data.discount)) ;
              let tax =  (data.tax == null || data.tax == "" ||  data.tax == false)? 0.0:parseFloat(removeCommas(data.tax));
              pre_total = parseFloat(pre_total).toFixed(2);

              var final_total = tax > 0 ? (pre_total - tax ) - discount : (pre_total - discount);
              final_total = parseFloat(final_total).toFixed(2);

              let new_final_tax = formatMoney(tax);
              let new_final_pretotal = formatMoney(pre_total);
              let new_final_discount = formatMoney(discount);
              let new_final_total = formatMoney(final_total);

          

        new_table +=`<tr> <th colspan="7"></th></tr> <tr> <th colspan="4"></th> <th> Sub Total</th> <td colspan="2"> ${new_final_pretotal}</td> </tr> <tr><th colspan="4"></th> <th> Tax</th><td colspan="2">${new_final_tax}</td> </tr><tr><th colspan="4"></th> <th> Discount</th><td colspan="2">${new_final_discount}</td></tr> <tr><th colspan="4">`;
        if(data.status === 'approved'){
          new_table +=`<a href="../../print/index.php?id=${bookingId}" target="_blank"><button class="btn btn-danger" type="button">Generate Invoice</button></a>`;
        }else if(data.status === 'active' && currentuser > 0){

          new_table +=`<a href="approve.data.php?id=${bookingId}" target="_blank"><button class="btn btn-danger" type="button">Approve Booking</button></a>`;
        }

       new_table +=`</th> <th> Total</th> <td colspan="2">${new_final_total}</td> </tr>`;
        tbody.innerHTML = new_table;
      }


    </script>
    <?php include('../../error_handler.php'); ?>
  </body>
</html>