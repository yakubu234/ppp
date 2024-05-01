<?php 
include('../../conn/auth_checker.php');
error_reporting(E_ALL);


$userId =$_SESSION['obbsuid'] ;
    // Fetch user data based on email
    $sql = "SELECT * FROM agreement";
    $query = $dbh->prepare($sql);
    $query->execute();

    $service = $query->fetch(PDO::FETCH_ASSOC);

    $agreementDescription = isset($service['description']) ? $service['description']: "Type here";
  

// Access the count using the key 'total_bookings
include('../../includes/header.php'); 

?>
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../../assets/css/color-1.css" media="screen">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/responsive.css">
  </head>
  <body> 
    <!-- loader starts-->
    
    <?php include('../../includes/nav.php'); ?>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6 ps-0">
                  <h3>Base Inputs</h3>
                </div>
                <div class="col-sm-6 pe-0">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Form Controls</li>
                    <li class="breadcrumb-item active">Base inputs</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header pb-0">
                    <h3>Basic form</h3>
                    <p class="f-m-light mt-1">
                       Agrrement details are below..</p>
                  </div>
                  <div class="card-body">
                    <div class="card-wrapper border rounded-3">
                      <form class="row g-3" method="POST" action="../../handler/agreement.php">
                        <input type="hidden" value="<?php echo isset($service['id'])? $service['id']:""; ?>" name="item_id" />
                        
                        <div class="col-md-12">
                          <label class="form-label" for="summernote_here">Enter Agreement Description</label>
                          <textarea class="form-control" row="10"  id="summernote_here" name="description" required placeholder="Enter Descriptionl"></textarea>
                        </div>
                        

                        <div class="col-12">
                          <button class="btn btn-primary" type="submit">Submit </button>
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
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 p-0 footer-copyright">
                <p class="mb-0">Copyright 2023 © Dunzo theme by pixelstrap.</p>
              </div>
              <div class="col-md-6 p-0">
                <p class="heart mb-0">Hand crafted &amp; made with
                  <svg class="footer-icon">
                    <use href="../assets/svg/icon-sprite.svg#heart"></use>
                  </svg>
                </p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    
    <?php include('../../includes/js.php'); ?>
    <script src="../../assets/js/header-slick.js"></script>
    <script src="../../assets/js/height-equal.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../../assets/js/script.js"></script>
    <script src="../../assets/js/theme-customizer/customizer.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    
    <script>
      // $(document).ready(function() {

        $(window).load(function(){
              // set content 
              <?php if(isset($agreementDescription)) { ?>
                var codeings = '<?php echo $agreementDescription;  ?>';
              $('#summernote_here').html(codeings);
              <?php } ?>

               $('#summernote_here').summernote({
                  height: 300
                });

          });

          // $('#summernote_here').summernote({
          //   height: 300
          // });
      // });

      // var encodedContent = "<?php //echo $agreementDescription; ?>";
      // var decodedContent = encodedContent;
      // Set the decoded HTML content to a div element
      // document.getElementById("summernote_here").innerHTML = decodedContent;
</script>
    
    <?php include('../../error_handler.php'); ?>
  </body>
</html> 