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

    <style>
      .my-gallery figure {
          position: relative;
      }

      .delete-icon {
          position: absolute;
          top: 5px;
          left: 10px;
          background: rgba(255, 255, 255, 0.7);
          padding: 5px;
          border-radius: 50%;
          cursor: pointer;
          font-size: 16px;
          color: red;
          z-index: 10;
      }

      .delete-icon:hover {
          background: rgba(255, 255, 255, 1);
      }
    </style>
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
                  <h3>Gallery Grid With Description</h3>
                </div>
                <div class="col-sm-6 pe-0">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="../../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Gallery</li>
                    <li class="breadcrumb-item active"> Gallery Grid With Description</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0">
                    <h4 style="float: left;">Image Gallery With Description</h4>
                    <button style="float: right;" class="btn btn-square btn-primary emailbox mr-3" type="button" data-bs-toggle="modal" data-bs-target="#upload_single_image"> </i> Upload Single  </button>&nbsp;
                    <button style="float: right;" class="btn btn-square btn-success emailbox" type="button" data-bs-toggle="modal" data-bs-target="#upload_multiple_image"></i> Upload Multiple  </button>
                    <div style="clear: both;margin-bottom:20px;"></div> <!-- Clear floats -->
                  </div>
                  <div class="my-gallery card-body gallery-with-description" itemscope="">
                    <div class="row">
                        <?php foreach($galleries as $key => $value){?>

                            <figure class="col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                        <a href="../../uploads/<?php echo $value['img']; ?>" itemprop="contentUrl" data-size="1600x950">
                            <img src="../../uploads/<?php echo $value['img']; ?>" itemprop="thumbnail" alt="Image description">
                          <div class="caption">
                            <h4><?php echo $value['heading']; ?></h4>
                            <p></p>
                          </div></a>
                        <figcaption itemprop="caption description">
                          <h4>Portfolio Title</h4>
                          <p></p>
                        </figcaption>
                        <!-- Delete icon overlay -->
                        <div class="delete-icon" onclick="deleteImage('<?php echo $value['id']; ?>')">
                            <i class="fa fa-trash" ></i> <!-- Unicode character for a cross mark -->
                        </div>
                      </figure>
                        <?php } ?>
                      

                    </div>
                    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                      <!--
                      Background of PhotoSwipe.
                      It's a separate element, as animating opacity is faster than rgba().
                      -->
                      <div class="pswp__bg"></div>
                      <!-- Slides wrapper with overflow:hidden.-->
                      <div class="pswp__scroll-wrap">
                        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory.-->
                        <!-- don't modify these 3 pswp__item elements, data is added later on.-->
                        <div class="pswp__container">
                          <div class="pswp__item"></div>
                          <div class="pswp__item"></div>
                          <div class="pswp__item"></div>
                        </div>
                        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed.-->
                        <div class="pswp__ui pswp__ui--hidden">
                          <div class="pswp__top-bar">
                            <!-- Controls are self-explanatory. Order can be changed.-->
                            <div class="pswp__counter"></div>
                            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                            <button class="pswp__button pswp__button--share" title="Share"></button>
                            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                            <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR-->
                            <!-- element will get class pswp__preloader--active when preloader is running-->
                            <div class="pswp__preloader">
                              <div class="pswp__preloader__icn">
                                <div class="pswp__preloader__cut">
                                  <div class="pswp__preloader__donut"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                            <div class="pswp__share-tooltip"></div>
                          </div>
                          <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                          <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                          <div class="pswp__caption">
                            <div class="pswp__caption__center"></div>
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
    <script src="../../assets/js/photoswipe/photoswipe.min.js"></script>
    <script src="../../assets/js/photoswipe/photoswipe-ui-default.min.js"></script>
    <script src="../../assets/js/photoswipe/photoswipe.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../../assets/js/script.js"></script>
    <script src="../../assets/js/theme-customizer/customizer.js"></script>

    <script>
    function deleteImage(imageId) {
        // Add your delete logic here
        // For example, you can make an AJAX call to delete the image
        if(confirm('Are you sure you want to delete this image?')) {
            // AJAX request to delete the image
            // You can use fetch, XMLHttpRequest or jQuery AJAX
            fetch('delete_image.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id: imageId }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Reload the page or remove the image from the DOM
                    location.reload();
                } else {
                    alert('Failed to delete the image.');
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
    }
    </script>
    <?php include('../../error_handler.php'); ?>
    <!-- Plugin used-->
  </body>
</html>