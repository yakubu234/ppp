
<!-- Page Header Start-->
<div class="page-header">
        <div class="header-wrapper row m-0">
          <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="../../assets/images/logo/logo-1.png" alt=""><img class="img-fluid for-dark" src="../../assets/images/logo/logo.png" alt=""></a></div>
            <div class="toggle-sidebar">
              <svg class="sidebar-toggle"> 
                <use href="../../assets/svg/icon-sprite.svg#stroke-animation"></use>
              </svg>
            </div>
          </div>
          <div class="left-header col-xxl-5 col-xl-6 col-auto box-col-6 horizontal-wrapper p-0">
            <div class="left-menu-header">
              <ul class="app-list">
                <li class="onhover-dropdown">
                  <div class="app-menu"> <i data-feather="folder-plus"></i></div>
                  <ul class="onhover-show-div left-dropdown">
                    <li> <a href="message.data.php">Messages</a></li>
                    <li> <a href="booking_history.data.php"> Booking History</a></li>
                    <li> <a href="profile.data.php"> Profile </a></li>
                    <li> <a href="services.data.php"> Services</a></li>
                  </ul>
                </li>
              </ul>
              
            </div>
          </div>
          <div class="nav-right col-xxl-7 col-xl-6 col-auto box-col-6 pull-right right-header p-0 ms-auto">
            <ul class="nav-menus">
              <li class="serchinput" style="display:none;">
                <div class="serchbox" style="display: none;">
                  <svg>
                    <use href="../../assets/svg/icon-sprite.svg#fill-search"></use>
                  </svg>
                </div>
                <div class="form-group search-form" style="display: none;">
                  <input type="text" placeholder="Search here...">
                </div>
              </li>
              <li >
                <div class="form-group w-100" style="display: none;">
                  <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative d-flex">
                      <svg class="search-bg svg-color me-2">
                        <use href="../../assets/svg/icon-sprite.svg#fill-search"></use>
                      </svg>
                      <input class="demo-input py-0 Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Dunzo .." name="q" title="">
                    </div>
                  </div>
                </div>
              </li>
              


              <li>
                <div class="mode">
                  <svg>
                    <use href="../../assets/svg/icon-sprite.svg#fill-dark"></use>
                  </svg>
                </div>
              </li>
              <li class="profile-nav onhover-dropdown p-0">
                <div class="d-flex align-items-center profile-media"><img class="b-r-10 img-40" src="../../assets/images/logo/logo.png" alt="">
                  <div class="flex-grow-1"><span><?php echo $currentUser['fullname'] ?></span>
                    <p class="mb-0"><?php echo $currentUser['type'] > 0 ? "Admin":"User"; ?> <i class="middle fa fa-angle-down"></i></p>
                  </div>
                </div>
                <ul class="profile-dropdown onhover-show-div">
                  <li><a href="../profile/profile.data.php"><i data-feather="user"></i><span>Account </span></a></li>
                  <li><a href="../dashboard/dashboard.data.php"><i data-feather="file-text"></i><span>Daskboard</span></a></li>
                  <li><a href="../../logout.php"><i data-feather="log-in"> </i><span>Log out</span></a></li>
                </ul>
              </li>
            </ul>
          </div>
          <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">{{name}}</div>
            </div>
            </div>
          </script>
          <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
        </div>
      </div>
      <!-- Page Header Ends-->
      