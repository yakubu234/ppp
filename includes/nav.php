    <!-- loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader">    
        <div class="loader-p"></div>
      </div>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      
      <!-- Page Header Start-->
      <?php include('../../includes/topbar.php'); ?>
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper" data-layout="fill-svg">
          <div>
            <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="../../assets/images/logo/logo.png" alt="" width="60"></a>
              <div class="toggle-sidebar">
                <svg class="sidebar-toggle"> 
                  <use href="../../assets/svg/icon-sprite.svg#toggle-icon"></use>
                </svg>
              </div>
            </div>
            <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="../../assets/images/logo/logo-icon.png" alt="" width="45"></a></div>
            <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                  <li class="back-btn"><a href="index.html"><img class="img-fluid" src="../../assets/images/logo/logo-icon.png" alt=""></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  <li class="pin-title sidebar-main-title">
                    <div> 
                      <h6>Pinned</h6>
                    </div>
                  </li>
                  <!-- dasboard -->
                  <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="../dashboard/dashboard.data.php">
                      <svg class="stroke-icon">
                        <use href="../../assets/svg/icon-sprite.svg#stroke-home"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="../../assets/svg/icon-sprite.svg#fill-home"></use>
                      </svg><span class="lan-3">Dashboard </span></a>
                    </a>
                  </li>


                  <!-- profile -->
                  <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" >
                      <svg class="stroke-icon">
                        <use href="../../assets/svg/icon-sprite.svg#stroke-user"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="../../assets/svg/icon-sprite.svg#fill-user"></use>
                      </svg><span>Profile</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="../profile/profile.data.php">Users Profile</a></li>
                    </ul>
                  </li>

                  <!-- messages -->
                  <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title">
                      <svg class="stroke-icon">
                        <use href="../../assets/svg/icon-sprite.svg#stroke-ui-kits"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="../../assets/svg/icon-sprite.svg#fill-ui-kits"></use>
                      </svg><span>Messages</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="../message/message.data.php">View All</a></li>
                      <!-- <li><a href="avatars.html">Compose New</a></li> -->
                    </ul>
                  </li>
                  
                  <!-- bookings -->
                  <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title">
                      <svg class="stroke-icon">
                        <use href="../../assets/svg/icon-sprite.svg#stroke-calendar"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="../../assets/svg/icon-sprite.svg#fill-calender"></use>
                      </svg><span>Bookings</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="../bookings/booking_history.data.php"> Booking History</a></li>
                      <li><a href="../bookings/new_booking.data.php">Book Now</a></li>
                    </ul>
                  </li>

                  <!-- services -->
                  <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title">
                      <svg class="stroke-icon">
                        <use href="../../assets/svg/icon-sprite.svg#stroke-animation"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="../../assets/svg/icon-sprite.svg#fill-animation"></use>
                      </svg><span>Services</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="../services/services.data.php">List All</a></li>
                      <!-- admin only -->
                      <?php if($currentUser['type'] > 0){
                    ?>
                    
                    <li><a href="../services/services.edit.php">Add New </a></li>
                    <?php
                  } ?>
                    </ul>
                  </li>


                  <!-- settings --><!-- admin only -->
                  <?php if($currentUser['type'] > 0){
                    ?>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title">
                      <svg class="stroke-icon">
                        <use href="../../assets/svg/icon-sprite.svg#stroke-knowledgebase"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="../../assets/svg/icon-sprite.svg#fill-knowledgebase"></use>
                      </svg><span>App Settings</span></a>
                    <ul class="sidebar-submenu">

                      <li><a href="../agreement/agrrement.list.php">Agreement</a></li>
                      <li><a href="../events/event.type.list.php">Type of Events</a></li>
                      <li><a href="../dashboard/view.users.data.php">View Users</a></li>
                    </ul>
                  </li>
                    <?php
                  } ?>
                  

                  <!-- website page --><!-- admin only -->
                  <?php if($currentUser['type'] > 0){
                    ?>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title">
                      <svg class="stroke-icon">
                        <use href="../../assets/svg/icon-sprite.svg#stroke-ecommerce"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="../../assets/svg/icon-sprite.svg#fill-ecommerce"></use>
                      </svg><span>Website Page</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="../contact/contact.us.php">Contact us</a></li>
                      <li><a href="../gallery/gallery.data.php">Gallery</a></li>
                    </ul>
                  </li>
                    <?php
                  } ?>
                  

                  <!-- bookign search --><!-- admin only -->
                  <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="../bookings/search.data.php">
                      <svg class="stroke-icon">
                        <use href="../../assets/svg/icon-sprite.svg#stroke-search"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="../../assets/svg/icon-sprite.svg#fill-search"> </use>
                      </svg><span>Booking Search </span></a>
                    </a>
                  </li>

                  <!-- reports --><!-- admin only -->
                  <?php if($currentUser['type'] > 0){
                    ?>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="../reports/search.data.php">
                      <svg class="stroke-icon">
                        <use href="../../assets/svg/icon-sprite.svg#stroke-job-search"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="../../assets/svg/icon-sprite.svg#fill-job-search"></use>
                      </svg><span >Report </span></a>
                    </a>
                  </li>  
                    <?php
                  } ?>
                   
                  
                  <!-- logout -->
                  
                  <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="../../logout.php">
                      <svg class="stroke-icon">
                        <use href="../../assets/svg/icon-sprite.svg#stroke-others"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="../../assets/svg/icon-sprite.svg#fill-others"></use>
                      </svg><span>Logout </span></a>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
          </div>
        </div>

        <div class="modal fade" id="compose_mail" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            
                          <form method="POST" action="../../handler/new.message.php">
                            <div class="modal-header">
                              <input type="hidden" name="form_type" value="message_save" />
                              <input type="hidden" name="user_id" value="<?php echo  $currentUser['id'] ?>" />
                              <h3 class="modal-title fs-5">Compose Message</h3>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body compose-modal">
                                <div class="row mb-3">
                                  <label class="col-sm-2 col-form-label" for="composeFrom">From :</label>
                                  <div class="col-sm-10">
                                    <input class="form-control" readonly name="email" value="<?php echo $currentUser['email']; ?>" id="composeFrom" type="email">
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <label class="col-sm-2 col-form-label" for="composeTo">To :</label>
                                  <div class="col-10"> 
                                  <select class="form-select" name="recepient" required="" aria-label="select example">
                                    <option value="">Select Your recepient</option>
                                    <option value="admin">Admin</option>
                                    <?php
                                      if($currentUser['type'] > 0){
                                        foreach($userList as $user){
                                          echo '<option value="'.$user['id'].'"> '.$user['username'].' </option>';
                                        }
                                      }
                                    ?>
                                  </select>
                                  <div class="invalid-feedback">Invalid select feedback</div>
                                </div>
                                </div>
                                <div class="row mb-3">
                                  <label class="col-sm-2 col-form-label" for="composeSubject">Subject :</label>
                                  <div class="col-sm-10">
                                    <input class="form-control" id="composeSubject" name="subject" required type="text">
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  
                                  <label class="col-sm-2 form-label" for="exampleFormControlTextarea1">Description</label>
                                  <div class="col-10"> 
                                    <textarea class="form-control" name="message" required id="exampleFormControlTextarea1" rows="3"></textarea>
                                  </div>
                                </div>
                              
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-primary" type="submit" data-bs-dismiss="modal">Send</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <!-- upload one -->
                      <div class="modal fade" id="upload_single_image" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                          <div class="modal-content">
                            
                          <form method="POST" action="../../handler/file.upload.php" enctype="multipart/form-data">
                            <div class="modal-header">
                              <input type="hidden" name="form_type" value="file" />
                              <input type="hidden" name="user_id" value="<?php echo  $currentUser['id'] ?>" />
                              <h3 class="modal-title fs-5">Upload single image with description</h3>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body compose-modal">
                              <div class="row" >
                                <div class="col-sm-1" ></div>
                                
                              <div class="col-sm-10">
                                          
                                          <div class=" row mb-3">
                                            <label class="form-label" for="formFile">Choose A file</label>
                                            <input class="form-control" required id="formFile" name="file" type="file">
                                          </div>
                                          <div class="row mb-3 ">
                                            <label class="form-label" for="inputEmail4">Description</label>
                                            <input class="form-control" id="inputEmail4" type="text" name="description" placeholder="Enter Your Email">
                                          </div>
                                        </div>
                              </div>
                              
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-primary" type="submit" data-bs-dismiss="modal">Upload</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <!-- uploadmultiple -->
                      <div class="modal fade" id="upload_multiple_image" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                          <div class="modal-content">
                            
                          <form method="POST" action="../../handler/file.upload.php" enctype="multipart/form-data">
                            <div class="modal-header">
                              <input type="hidden" name="form_type" value="files" />
                              <input type="hidden" name="user_id" value="<?php echo  $currentUser['id'] ?>" />
                              <h3 class="modal-title fs-5">Upload Multiple images for gallery</h3>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body compose-modal">
                            <div class="mb-3">
                              <label class="form-label" for="formFileMultiple">Choose Multiple files</label>
                              <input class="form-control" id="formFileMultiple" name="files" type="file" multiple="multiple">
                            </div>
                              
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-primary" type="submit" data-bs-dismiss="modal">Upload</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>