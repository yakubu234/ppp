<?php include('../../includes/header.php'); ?>


<link rel="stylesheet" type="text/css" href="../../assets/css/vendors/flatpickr/flatpickr.min.css">
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
                <div class="col-sm-6 ps-0">
                  <h3>Form Wizard</h3>
                </div>
                <div class="col-sm-6 pe-0">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.data.php">                                       
                        <svg class="stroke-icon">
                          <use href="../../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Form Layout</li>
                    <li class="breadcrumb-item active"> Form Wizard</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-xl-12">
                <div class="card height-equal">
                  <div class="card-header pb-0">
                    <h3>Numbering wizard </h3>
                    <p class="f-m-light mt-1">
                       Fill up your details and proceed next steps.</p>
                  </div>
                  <div class="card-body basic-wizard important-validation">
                    <div class="stepper-horizontal" id="stepper1">
                      <div class="stepper-one stepper step editing active">
                        <div class="step-circle"><span>1</span></div>
                        <div class="step-title">Basic Info</div>
                        <div class="step-bar-left"></div>
                        <div class="step-bar-right"></div>
                      </div>
                      <div class="stepper-two step">
                        <div class="step-circle"><span>2</span></div>
                        <div class="step-title">Booking Info</div>
                        <div class="step-bar-left"></div>
                        <div class="step-bar-right"></div>
                      </div>
                      <div class="stepper-three step">
                        <div class="step-circle"><span>3</span></div>
                        <div class="step-title">Feedback</div>
                        <div class="step-bar-left"></div>
                        <div class="step-bar-right"></div>
                      </div>
                      <div class="stepper-four step">
                        <div class="step-circle"><span>4</span></div>
                        <div class="step-title">Finish</div>
                        <div class="step-bar-left"></div>
                        <div class="step-bar-right"></div>
                      </div>
                    </div>
                    <div id="msform">
                      
                      <form class="stepper-one row g-3 needs-validation custom-input" novalidate="">
                      <input type="hidden" value="<?php echo $currentUser['id']; ?>" name="user_id"  />
                      <input type="hidden" value="<?php echo $currentUser['phone']; ?>" name="user_phone"  />
                      <input class="form-control" id="email-basic-wizard" name="email" value="<?php echo $currentUser['email']; ?>" type="hidden" required="" placeholder="dunzo@gmail.com">
                       <input class="form-control" id="firstnamewizard" name="fullname" value="<?php echo $currentUser['fullname']?>" type="hidden" required="" placeholder="Enter your name">

                        <input type="hidden" value="new_booking" name="form_action"  />
                        <div class="col-sm-6">
                          <label class="form-label" for="email-basic-wizard">Customer Email<span class="txt-danger">*</span></label>
                          <input class="form-control" id="email-basic-wizard" name="customer_email"  type="email" required="" placeholder="customer email">
                        </div>
                        <div class="col-sm-6">
                          <label class="form-label" for="firstnamewizard">Customer Fullame<span class="txt-danger">*</span></label>
                          <input class="form-control" id="firstnamewizard" name="customer_fullname" type="text" required="" placeholder="Enter customer name">
                        </div>
                         <div class="col-sm-6">
                          <label class="form-label" for="firstnamewizard">Customer Phone<span class="txt-danger">*</span></label>
                          <input class="form-control" id="firstnamewizard" name="customer_phone"  type="text" required="" placeholder="Enter customer phone ">
                        </div>
                         <div class="col-sm-6">
                          <label class="form-label" for="firstnamewizard">Customer Address<span class="txt-danger">*</span></label>
                          <input class="form-control" id="firstnamewizard" name="customer_address"  type="text" required="" placeholder="Enter Customer Address ">
                        </div>
                        <div class="col-sm-6">
                          <label class="form-label" for="firstnamewizard">Customer Contact person Fullame<span class="txt-danger">*</span></label>
                          <input class="form-control" id="firstnamewizard" name="customer_contact_person_fullname" type="text" required="" placeholder="Enter customer name">
                        </div>
                         <div class="col-sm-6">
                          <label class="form-label" for="firstnamewizard">Customer Contact person Phone<span class="txt-danger">*</span></label>
                          <input class="form-control" id="firstnamewizard" name="customer_contact_person_phone"  type="text" required="" placeholder="Enter customer phone ">
                        </div>

                        <!-- un coppy from here -->


                        <div class="col-sm-6"> 
                        <label class="form-label" for="firstnamewizard">Select Type  of Event<span class="txt-danger">*</span></label>
                                  <select class="form-select" name="type_of_event" required="" aria-label="select example">
                                    <option value="">Select Type of Event </option>
                                    <?php
                                      if($eventTypes){
                                        foreach($eventTypes as $eventType){
                                          echo '<option value="'.$eventType['name'].'"> '.$eventType['name'].' </option>';
                                        }
                                      }
                                    ?>
                                  </select>
                                  <div class="invalid-feedback">Invalid select feedback</div>
                                </div>


                        <div class="col-sm-6">
                          <label class="form-label" for="firstnamewizard">Number of guests<span class="txt-danger">*</span></label>
                          <input class="form-control" id="firstnamewizard" name="number_of_guest" type="text" required="" placeholder="Enter number of guest">
                        </div>

                        <!-- from date -->
                        <div class="col-xl-6">
                          <div class="card">
                            <div class="card-header pb-0">
                            <label class="form-label" for="email-basic-wizard">From Date<span class="txt-danger">*</span></label>
                            </div>
                            <div class="card-body card-wrapper"> 
                              <div class="row g-3">
                                <div class="col-12">
                                  <div class="input-group ">
                                    <input class="form-control mb-2" required name="from" id="inline-calender" type="date">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- from date -->

                        <!-- from date -->
                        <div class="col-xl-6">
                          <div class="card">
                            <div class="card-header pb-0">
                            <label class="form-label" for="email-basic-wizard">To Date<span class="txt-danger">*</span></label>
                            </div>
                            <div class="card-body card-wrapper"> 
                              <div class="row g-3">
                                <div class="col-12">
                                  <div class="input-group ">
                                    <input class="form-control mb-2"  name="to" required id="inline-calender" type="date">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- to date -->
                        
                        <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" id="inputcheckwizard" type="hidden" value="value" required="">
                            <!-- <label class="form-check-label mb-0" for="inputcheckwizard">Agree to terms and conditions</label> -->
                          </div>
                        </div>
                      </form>

                      <!-- step2 -->
                      <form class="stepper-two row g-3 needs-validation custom-input" novalidate="">

                               
                        <p>&nbsp;</p>
                        
                        <!-- select 2 started -->
                        <div class="col-md-12">
                          <h3>Select a service</h3>
                          <div class="mb-3">
                            <label class="form-label text-success" for="exampleFormControlSelect17">Choose Services from the list below </label>
                            <select class="form-select input-air-primary digits" required  id="exampleFormControlSelect17"  onchange="addToCart()">
                              <option selected disabled>Select services here</option>
                              <?php
                                if($services){
                                  foreach($services as $service){
                                    echo '<option value="'.$service['id'].'"> '.$service['name'].' </option>';
                                  }
                                }
                              ?>
                            </select>
                            <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" id="hiddend_select" type="hidden" value="" required="">
                            <!-- <label class="form-check-label mb-0" for="inputcheckwizard">Agree to terms and conditions</label> -->
                          </div>
                        </div>
                          </div>
                        </div>

                        <!-- select 2 ended -->
                        <!-- the table begins -->
                        <div class="col-md-12"> 
                        <table class="table table-bordered" id="cart">
                          <thead>
                            <tr>
                              <th>S/N</th>
                              <th>Name</th>
                              <th>Unit Price</th>
                              <th>Quantity</th>
                              <th>Total Price</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody></tbody>
                        </table>
                        <p>&nbsp;</p>
                        <div class="row">
                          <div class="col-sm-5">
                            <label class="form-label" for="discount_field">Discount (if any)<span class="txt-danger">*</span></label>
                            <input class="form-control" id="discount_field" min="0"  name="discount" type="number"  placeholder="Enter Discount (if any) " oninput="calculateTotal()">
                          </div>
                          <div class="col-sm-3"></div>
                          
                        <div class="cart-totals col-sm-4">
                          <p>Subtotal: &#x20A6;<span id="subTotal">0.00</span></p>
                          <p>Tax (0%): &#x20A6;<span id="tax">0.00</span></p>
                          <p>Discount: &#x20A6;<span id="discount">0.00</span> (Optional)</p>
                          <p><strong>Total: &#x20A6;<span id="final_total">0.00</span></strong></p>
                        </div>
                        </div>
                        </div>

                        


                        <div class="col-sm-12">
                          <label class="form-label" for="firstnamewizard">Leave a message(optional)<span class="txt-danger"></span></label>
                          <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" id="invalidCheck-a" type="hidden" value="value" required="">
                            <!-- <label class="form-check-label" for="invalidCheck-a">All the above information is correct</label> -->
                          </div>
                        </div>
                      </form>
                      <!--  -->
                      <form class="stepper-three row g-3 needs-validation custom-input" novalidate="">
                        
                       <!-- the table begins -->
                       <div class="col-md-12"> 
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

                        <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" id="invalidCheck469" type="checkbox" name="consent_check[]" required="required">
                            <label class="form-check-label mb-0" for="invalidCheck469">I Agree to terms and conditions, and that the above is correct.</label>
                            <div class="invalid-feedback">You must agree before submitting.</div>
                          </div>
                        </div>
                      </form>
                      <form class="stepper-four row g-3 needs-validation" novalidate="">
                        <div class="col-12 m-0">
                          <div class="successful-form"><img class="img-fluid" src="../../assets/images/gif/dashboard-8/successful.gif" alt="successful">
                            <h3>Congratulations </h3>
                            <p>Well done! You have successfully completed. </p>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="wizard-footer d-flex gap-2 justify-content-end">
                      <button class="btn alert-light-primary" id="backbtn" onclick="backStep()"> Back</button>
                      <button class="btn btn-primary" id="nextbtn" onclick="nextStep()">Next</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- the below is just there to solve the error,it has been set to hidden already -->
              <div class="col-xl-12" style="display: none;">
                <div class="card height-equal">
                  <div class="card-header pb-0">
                    <h3>Student validation form</h3>
                    <p class="f-m-light mt-1">
                        Please make sure fill all the filed before click on next button.</p>
                  </div>
                  <div class="card-body custom-input">
                    <form class="form-wizard" id="regForm" action="form-wizard.html#" method="POST">
                      <div class="tab">
                        <div class="row g-3">
                          <div class="col-sm-6">
                            <label for="name">Name</label>
                            <input class="form-control" id="name" type="text" placeholder="Enter your name" required="required">
                          </div>
                          <div class="col-sm-6">
                            <label class="form-label" for="student-email-wizard">Email<span class="txt-danger">*</span></label>
                            <input class="form-control" id="student-email-wizard" type="email" required="" placeholder="dunzo@gmail.com">
                          </div>
                          <div class="col-12">
                            <label class="col-sm-12 form-label" for="password-wizard">Password<span class="txt-danger">*</span></label>
                            <input class="form-control" id="password-wizard" type="password" placeholder="Enter password" required="">
                          </div>
                          <div class="col-12">
                            <label class="col-sm-12 form-label" for="confirmpassowrd">Confirm Password<span class="txt-danger">*</span></label>
                            <input class="form-control" id="confirmpassowrd" type="password" placeholder="Enter confirm password" required="">
                          </div>
                        </div>
                      </div>
                      <div class="tab">
                        <div class="row g-3 avatar-upload">
                          <div class="col-12">
                            <div>
                              <div class="avatar-edit">
                                <input id="imageUpload" type="file" accept=".png, .jpg, .jpeg">
                                <label for="imageUpload"></label>
                              </div>
                              <div class="avatar-preview">
                                <div id="image"></div>
                              </div>
                            </div>
                            <h3>Add Profile</h3>
                          </div>
                          <div class="col-12">
                            <label class="form-label" for="exampleFormControlInput1">Portfolio URL</label>
                            <input class="form-control" id="exampleFormControlInput1" type="url" placeholder="https://dunzo">
                          </div>
                          <div class="col-12"> 
                            <label class="form-label" for="projectDescription">Project Description</label>
                            <textarea class="form-control" id="projectDescription" rows="2"></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="tab">
                        <h5 class="mb-2">Social Links </h5>
                        <div class="row g-3">
                          <div class="col-sm-6">
                            <label class="form-label" for="twitterControlInput">Twitter</label>
                            <input class="form-control" id="twitterControlInput" type="url" placeholder="https://twitter.com">
                          </div>
                          <div class="col-sm-6">
                            <label class="form-label" for="githubControlInput">Github</label>
                            <input class="form-control" id="githubControlInput" type="url" placeholder="https:/github.com">
                          </div>
                          <div class="col-12"> 
                            <div class="input-group">
                              <input class="form-control" id="inputGroupFile04" type="file" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                              <button class="btn btn-outline-secondary" id="inputGroupFileAddon04" type="button">Submit</button>
                            </div>
                          </div>
                          <div class="col-12">
                            <select class="form-select" aria-label="Default select example">
                              <option selected="">Positions</option>
                              <option value="1">Web Designer</option>
                              <option value="2">Software Engineer</option>
                              <option value="3">UI/UX Designer </option>
                              <option value="3">Web Developer</option>
                            </select>
                          </div>
                          <div class="col-12"> 
                            <label class="form-label" for="quationsTextarea">Why do you want to take this position?</label>
                            <textarea class="form-control" id="quationsTextarea" rows="2"></textarea>
                          </div>
                        </div>
                      </div>
                      <div>
                        <div class="text-end pt-3">
                          <button class="btn btn-secondary" id="prevBtn" type="button" onclick="nextPrev(-1)">Previous</button>
                          <button class="btn btn-primary" id="nextBtn" type="button" onclick="nextPrev(1)">Next</button>
                        </div>
                      </div>
                      <!-- Circles which indicates the steps of the form:-->
                      <div class="text-center"><span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span></div>
                    </form>
                  </div>
                </div>
              </div>



            </div>
          </div>
        </div>
        <!-- footer start-->
        <?php  include('../../includes/footer.php'); ?>
      </div>
    </div>
    
    <!-- latest jquery -->
    
    <?php include('../../includes/js.php'); ?>
    
    <script src="../../assets/js/form-wizard/form-wizard.js"></script>
    <script src="../../assets/js/form-wizard/image-upload.js"></script>
    <script src="../../assets/js/height-equal.js"></script>
    <script src="../../assets/js/flat-pickr/flatpickr.js"></script>
    <script src="../../assets/js/flat-pickr/custom-flatpickr.js"></script>
    
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../../assets/js/script.js"></script>
    <script src="../../assets/js/theme-customizer/customizer.js"></script>
    <!-- Plugin used-->
    <script>
      var all_services = <?php echo json_encode($services); ?>;
      
      // all_services = JSON.parse(fullServices);
      function addToCart() {
        var select = document.getElementById("exampleFormControlSelect17");
        var selected_id = select.options[select.selectedIndex].value;

         // Check if a row already exists for the selected item
        if (document.querySelector(`#cart tbody tr[data-id="${selected_id}"]`)) {
            alert("This item is already in the cart.");
            return;
        }
        
        let selectedItem;
        //loop throught to get the information 
        for (const item of all_services) {
          if (item.id == selected_id) {
            selectedItem = item;
            break; // Exit the loop once a match is found (optional)
          }
        }

        document.getElementById('hiddend_select').value = "enabled";

        var tbody = document.querySelector("#cart tbody");
        var newRow = tbody.insertRow(); 
        // Set the data-id attribute to the selected item ID for the row
        newRow.setAttribute("data-id", selected_id);

        // by default quantity is 1 and price will be used to calculate 
        let totalPrice = parseFloat(1 * selectedItem.price).toFixed(2);
        newRow.innerHTML = `
          <td></td>  
          <td>${selectedItem.name}</td>
          <td><input type="hidden" id="item_price_`+selectedItem.id+`"  value="`+selectedItem.price+`" name="price[]" />
          &#x20A6;${selectedItem.price}</td>
          <td>
            <input type="hidden" name="item_id[]" value="`+selectedItem.id+`" />
            <input type="hidden" value="1" id="quantity_original_`+selectedItem.id+`" name="quantity[]" />
            <input type="number" min="1" value="1" id="quantity_calc_`+selectedItem.id+`"  oninput="handleQuantityChange(this.id, this.value)" />
          </td>
          <td> &#x20A6;<span id="span_`+selectedItem.id+`">${totalPrice}</span></td>
          <td><button class="btn btn-square btn-danger" onclick="removeRow(this)" title="delete" type="button"><i class="fa fa-trash-o"></i></button> </td>
        `; 
        updateSerialNumbers();
      }

      function removeRow(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
        updateSerialNumbers();
      }

      function updateSerialNumbers() {
        var rows = document.querySelectorAll("#cart tbody tr");
        rows.forEach(function(row, index) {
            row.cells[0].textContent = index + 1; // Update serial number
        });
        if(rows.length === 0 ){
          document.getElementById('hiddend_select').value = "";
        }
        calculateTotal();
      }

      function handleQuantityChange(id, value) {
        var itemId = id.split("_")[2];
        let unit_price = document.getElementById("item_price_"+itemId).value;
        let total_price = document.getElementById("span_"+itemId);
        let original_qty_field = document.getElementById("quantity_original_"+itemId).value = value;
        let new_price = parseFloat(value * unit_price).toFixed(2);
        total_price.textContent =new_price;

        calculateTotal();
      }

      function calculateTotal() {
        var subTotal = 0.0;        
        var spans = document.querySelectorAll('[id^="span_"]');
        // Loop through each span
        spans.forEach(function(span) {
            // Get the text content of the span and convert it to a number
            var value = parseFloat(span.textContent);
            // Add the value to the total
            subTotal += value;
        });

        // var tax = parseFloat(document.getElementById("tax").value);
        var tax = 0;
        let discount_field = document.getElementById("discount_field").value;
        var discount = (discount_field === null || discount_field === "") ? 0.0:parseFloat(discount_field) ;

        var total = tax > 0 ? ((subTotal * (tax / 100)) - discount): (subTotal  - discount);
        console.log(total)

        document.getElementById("subTotal").textContent = subTotal.toFixed(2);
        document.getElementById("discount").textContent = discount.toFixed(2);
        document.getElementById("final_total").textContent = total.toFixed(2);
      }

      // grabs all the form datas inside the nexted tabs
      function collectFormData() {
        var formData = new FormData();
        var forms = document.querySelectorAll("#msform form");
        forms.forEach(function(form) {
          var inputs = form.querySelectorAll("input, select, textarea");
          inputs.forEach(function(input) {
            var name = input.getAttribute("name");
            var value = input.value.trim();
            if (name && value !== "") {
              formData.append(name, value);
            }
          });
        });
        return formData;
      }

      function displayConsent() {
        var formData = collectFormData();

        fetch('../../handler/new.booking.preformat.php', {
          method: 'POST',
          body: formData
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
            formatConsentToDisply(data.data)
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

      // submit the selected data
      function submitFormData() {
        var formData = collectFormData();

        fetch('../../handler/new.booking.php', {
          method: 'POST',
          body: formData
        })
        .then(response => {
          if (response.ok) {
            window.location = "" //redirect to the page.
            return response.json();
          } else {
            throw new Error('Failed to submit form');
          }
        })
        .then(data => {
          if (data.success) {
            // Handle successful response
            alert(data.message);
            window.location = "booking.single.data.php?id="+ data.id
          } else {
            // Handle error response
            alert('Error: ' + data.message);
          }
        })
        .catch(error => {
          // Handle network errors
          alert(error);
        });
      }

      function formatConsentToDisply(data)
      {
        var tbody = document.querySelector("#consent_show_summary tbody");
        // var newRow = tbody.insertRow();
        let messgae = (data.message == "" ||  data.message == false) ? 'N/A':data.message ;
           let new_table = '<tr><th>Client Name:</th> <td colspan="3"> '+data.customer_fullname+'</td> <th>Client Number</th>  <td colspan="2"> '+data.customer_phone+'</td> </tr><tr><th>Client Email:</th> <td colspan="3">  '+data.customer_email+'</td><th>Customer  Address</th> <td colspan="2"> '+data.customer_address+'</td> </tr><tr><th>Contact person  Name:</th> <td colspan="3">  '+data.customer_contact_person_fullname+'</td><th>Contact Person Phone </th> <td colspan="2"> '+data.customer_contact_person_phone+'</td> </tr><tr><th>Booking Stauts:</th> <td colspan="3">  pending</td><th>Event Type</th> <td colspan="2"> '+data.type_of_event+'</td> </tr> <tr><th>Booking From:</th> <td colspan="3"> '+data.from+'</td> <th>Booking To</th>  <td colspan="2"> '+data.to+'</td></tr><tr><th >Number of Guest:</th><td colspan="3"> '+data.number_of_guest+'</td> <th>Apply Date</th>  <td colspan="2">'+data.apply_date+'</td></tr><tr><th >Message (if any)?</th><td colspan="6"> '+messgae+'</td> </tr> <tr><th colspan="7"></th> </tr>';

        var services = data.services;
        var sub_total;let pre_total = 0.0;
        services.forEach(function(service, index) {
          sub_total = parseFloat(service.quantity * service.price).toFixed(2);
            pre_total = (parseFloat(pre_total)+parseFloat(sub_total)); 
            new_table += '<th colspan="2">Service Name: <b><i>'+service.service_name+'</i></b></th><th> Desc</th><td>'+service.service_description+'</td><th> Price : &#x20A6; '+service.price+'</th><th>Qty:  '+service.quantity+'</th><th>Sub Total: &#x20A6; '+sub_total+'</th> </tr>';
          });

          let discount =  (data.discount == null || data.discount == "" ||  data.discount == false)? 0.0:parseFloat(data.discount) ;
          let tax =  (data.tax == null || data.tax == "" ||  data.tax == false)? 0.0:parseFloat(data.tax) ;
          pre_total = parseFloat(pre_total).toFixed(2);

          var final_total = tax > 0 ? (pre_total - tax ) - discount : (pre_total - discount);
          final_total = parseFloat(final_total).toFixed(2);

          
        new_table +=`<tr> <th colspan="7"></th></tr> <tr> <th colspan="4"></th> <th> Sub Total</th> <td colspan="2"> &#x20A6;${pre_total}</td> </tr> <tr><th colspan="4"></th> <th> Tax</th><td colspan="2">&#x20A6;${tax}</td> </tr><tr><th colspan="4"></th> <th> Discount</th><td colspan="2">&#x20A6;${discount}</td></tr> <tr><th colspan="4"></th> <th> Total</th> <td colspan="2">&#x20A6;${final_total}</td> </tr>`;
        tbody.innerHTML = new_table;
      }

    </script>
    <?php include('../../error_handler.php'); ?>
  </body>
</html>