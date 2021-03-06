
<!doctype html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>eCommerce HTML-5 Template </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

  <!-- CSS here -->
      <link rel="stylesheet" href="../Vista/Usuario/assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="../Vista/Usuario/assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="../Vista/Usuario/assets/css/flaticon.css">
      <link rel="stylesheet" href="../Vista/Usuario/assets/css/slicknav.css">
      <link rel="stylesheet" href="../Vista/Usuario/assets/css/animate.min.css">
      <link rel="stylesheet" href="../Vista/Usuario/assets/css/magnific-popup.css">
      <link rel="stylesheet" href="../Vista/Usuario/assets/css/fontawesome-all.min.css">
      <link rel="stylesheet" href="../Vista/Usuario/assets/css/themify-icons.css">
      <link rel="stylesheet" href="../Vista/Usuario/assets/css/slick.css">
      <link rel="stylesheet" href="../Vista/Usuario/assets/css/nice-select.css">
      <link rel="stylesheet" href="../Vista/Usuario/assets/css/style.css">
</head>

<body>

<?php require '../Validaciones/seguridad.php';?>
     
<?php require 'Usuario/menu.php';?> 
                         
  <div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="../Vista/Usuario/assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Carrito de Compras</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

<section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>  
              </tr>
            </thead>
            <tbody id="secP">
              
              <tr id="productos">
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src="../Vista/Usuario/assets/img/arrivel/arrivel_1.png" alt="" />
                    </div>
                    <div class="media-body">
                      <p>Minimalistic shop for multipurpose use</p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5>$360.00</h5>
                </td>
                <td>
                  <div class="product_count">       
                  
                    <input class="input-number" type="text" value="1" min="0" max="10">
                   
                  </div>
                </td>
                <td>
                  
                </td>
              </tr>
            
              <tr class="bottom_button">
                <td>
                  <a class="btn_1" href="#">Actualizar Carrito</a>
                </td>
                <td></td>
                <td></td>
                
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Total</h5>
                </td>
                <td>
                  <h5>$2160.00</h5>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="#">Continuar Comprando</a>
            <a class="btn_1 checkout_btn_1" href="#">Finalizar Compra</a>
          </div>
        </div>
      </div>
  </section>

  <footer>
    <!-- Footer Start-->
    <div class="footer-area footer-padding2">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                   <div class="single-footer-caption mb-50">
                     <div class="single-footer-caption mb-30">
                          <!-- logo -->
                         <div class="footer-logo">
                             <a href="index.html"><img src="../Vista/Usuario/assets/img/logo/logo2_footer.png" alt=""></a>
                         </div>
                         <div class="footer-tittle">
                             <div class="footer-pera">
                                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore.</p>
                            </div>
                         </div>
                     </div>
                   </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Quick Links</h4>
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#"> Offers & Discounts</a></li>
                                <li><a href="#"> Get Coupon</a></li>
                                <li><a href="#">  Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>New Products</h4>
                            <ul>
                                <li><a href="#">Woman Cloth</a></li>
                                <li><a href="#">Fashion Accessories</a></li>
                                <li><a href="#"> Man Accessories</a></li>
                                <li><a href="#"> Rubber made Toys</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Support</h4>
                            <ul>
                             <li><a href="#">Frequently Asked Questions</a></li>
                             <li><a href="#">Terms & Conditions</a></li>
                             <li><a href="#">Privacy Policy</a></li>
                             <li><a href="#">Privacy Policy</a></li>
                             <li><a href="#">Report a Payment Issue</a></li>
                         </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer bottom -->
            <div class="row">
             <div class="col-xl-7 col-lg-7 col-md-7">
                 <div class="footer-copy-right">
                     <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>                   </div>
             </div>
              <div class="col-xl-5 col-lg-5 col-md-5">
                 <div class="footer-copy-right f-right">
                     <!-- social -->
                     <div class="footer-social">
                         <a href="#"><i class="fab fa-twitter"></i></a>
                         <a href="#"><i class="fab fa-facebook-f"></i></a>
                         <a href="#"><i class="fab fa-behance"></i></a>
                         <a href="#"><i class="fas fa-globe"></i></a>
                     </div>
                 </div>
             </div>
         </div>
        </div>
    </div>

    <!-- Footer End-->
</footer>
<script src="../Vista/Usuario/assets/js/CompraU.js"></script>
<!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="../Vista/Usuario/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    
    <!-- Jquery, Popper, Bootstrap -->
    <script src="../Vista/Usuario/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../Vista/Usuario/assets/js/popper.min.js"></script>
    <script src="../Vista/Usuario/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="../Vista/Usuario/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="../Vista/Usuario/assets/js/owl.carousel.min.js"></script>
    <script src="../Vista/Usuario/assets/js/slick.min.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="../Vista/Usuario/assets/js/wow.min.js"></script>
    <script src="../Vista/Usuario/assets/js/animated.headline.js"></script>
    
    <!-- Scrollup, nice-select, sticky -->
    <script src="../Vista/Usuario/assets/js/jquery.scrollUp.min.js"></script>
    <script src="../Vista/Usuario/assets/js/jquery.nice-select.min.js"></script>
    <script src="../Vista/Usuario/assets/js/jquery.sticky.js"></script>
    <script src="../Vista/Usuario/assets/js/jquery.magnific-popup.js"></script>

    <!-- contact js -->
    <script src="../Vista/Usuario/assets/js/contact.js"></script>
    <script src="../Vista/Usuario/assets/js/jquery.form.js"></script>
    <script src="../Vista/Usuario/assets/js/jquery.validate.min.js"></script>
    <script src="../Vista/Usuario/assets/js/mail-script.js"></script>
    <script src="../Vista/Usuario/assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="../Vista/Usuario/assets/js/plugins.js"></script>
    <script src="../Vista/Usuario/assets/js/main.js"></script>
</body>

</html>