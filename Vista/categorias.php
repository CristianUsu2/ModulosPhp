<?php  require '../Validaciones/seguridad.php'; ?>


<?php require 'Usuario/cabeza.php';?>
<?php require '../Modelo/productos.php'?>

<div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="../Vista/Usuario/assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <?php require 'Usuario/menu.php';?>

    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="../Vista/Usuario/assets/img/banner_img.png">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Categorias</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="category-area section-padding30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center mb-85">
                            <h2>Nuestras Categorias</h2>
                        </div>
                </div>
            
                <div class="row">
                    <div class="col-xl-4 col-lg-6">
                        <div class="single-category mb-30">
                            <div class="category-img">
                                <img src="../Vista/Usuario/assets/img/categori/cat1.jpg" alt="">
                                <div class="category-caption">
                                    <h2>Mujer</h2>
                                    <span class="best"><a href="#">Ropa mujer</a></span>
                                    <span class="collection">Nuevos productos</span>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-xl-4 col-lg-6">
                        <div class="single-category mb-30">
                            <div class="category-img text-center">
                                <img src="../Vista/Usuario/assets/img/categori/cat2.jpg" alt="">
                                <div class="category-caption">
                                    <span class="collection">Descuentos!</span>
                                    <h2>Rebajas</h2>
                                   <p>Nuevos productos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div class="single-category mb-30">
                            <div class="category-img">
                                <img src="../Vista/Usuario/assets/img/categori/cat3.jpg" alt="">
                                <div class="category-caption">
                                    <h2>Hombre</h2>
                                    <span class="best"><a href="#">Ropa masculina</a></span>
                                    <span class="collection">Nueva coleccion</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center mb-85">
                            <h2>Nuestros productos</h2>
                        </div>
                    </div>
        </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                             <?php 
                                $productos=productos::ListarProducto();
                                  foreach($productos as $pro){
                               ?>
                            <div class="col-xl-4 col-lg-4 col-md-5 ">
                                <div class="single-product mb-60">
                                <form id="productos">
                                  <input id="idProducto" type="hidden" value="<?php echo $pro["id_producto"]; ?>"/>
                                  <input id="fotoP" type="hidden" value="<?php echo $pro["foto"]; ?>"/>
                                  <input id="nombreP" type="hidden" value="<?php echo $pro["nombre"]; ?>"/>
                                  <input id="precioP" type="hidden" value="<?php echo $pro["precio"]; ?>"/>
                                </form>
                                    <div class="product-img">
                                        <img src="<?php echo $pro["foto"]; ?>" class="mt-4 ml-4 mr-2" style="width:400px; height:400px; object-fit:cover;">
                                        
                                    </div>
                                    <div class="product-caption">
                                        <div class="product-ratting mb-2">
                                            
                                        </div>
                                         <h4><?php echo $pro["nombre"];?></h4>
                                        <div class="price">
                                            <ul>
                                                <li><?php echo "$".$pro["precio"];?></li>
                                                <li>
                                            
                                                 <button type="button" onclick="agregarC()" class="btn btn-success mt-10" id="comprar">Añadir al carrito</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                       </div>
                    </div>
      
                </div>    
                  
    <?php require 'Usuario/pie.php';?>
    