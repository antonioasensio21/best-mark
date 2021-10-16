<?php
include 'db/config.php';
include 'db/conexion.php';
include 'global/carrito.php';
include 'frontend/pagina_head.php';
?>

<!-- --------- " Alerta del carrito " --------- -->

<?php if (!empty($_SESSION['CARRITO'])) { ?>
    <?php if ($mensaje != "") { ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div style="margin: 0;" id="alert-uikit" class="uk-alert-success" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <p style="text-align: center;"> <a href="cart.php" class="uk-label uk-label-success"> </a> <?php echo $mensaje; ?> </p>
                    </div>
                </div>
            </div>
        </div>
        <script>
            setTimeout(function() {
                UIkit.alert('#alert-uikit').close();
            }, 6000, true);
        </script>
<?php }
} ?>


<!-- --------------- " Header - Slider " --------------- -->

<div class="contenedor">

    <div style="padding:0 8px; border-radius:12px;" id="demo" class="carousel slide" data-ride="carousel">
        <ul style="bottom: 15px;" class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div style="border-radius: 12px;" class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://sneakernews.com/wp-content/uploads/2020/02/nike-air-force-1-CW7584-100-5.jpg?w=1140" alt="" class="width-carusel">
            </div>
            <div class="carousel-item">
                <img src="https://hipertextual.com/wp-content/uploads/2021/04/apple_iphone-12-spring21_purple_04202021.jpg" class="width-carusel">

            </div>
            <div class="carousel-item">
                <img src="https://images.samsung.com/latin/smartphones/galaxy-s21-ultra-5g/images/galaxy-s21-ultra-5g-share-image.jpg" class="width-carusel">
            </div>
        </div>
    </div>

    <div class="contenedor-2">
        <div class="background-grid" style="background: url('https://assets.adidas.com/images/w_600,f_auto,q_auto/2250e2a120e94caf8885abc10158d7cf_9366/Camiseta_Textured_Logo_Gris_GD5935.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center;">
            <h2>Camisetas Adidas</h2>
        </div>
        <div class="background-grid" style="background: url('https://i.pinimg.com/originals/5c/a9/2c/5ca92c22cf3c072ef17e31061acc0b94.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center;"></div>
        <div class="background-grid" style="background: url('https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80'); background-size: cover; background-repeat: no-repeat; background-position: center;"></div>
        <div class="background-grid" style="background: url('https://images.unsplash.com/photo-1549298916-b41d501d3772?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=812&q=80'); background-size: cover; background-repeat: no-repeat; background-position: center;"></div>

    </div>

</div>

<!-- --------------- " Cuerpo de la pagina " --------------- -->

<main style="padding-top: 12px;">

    <!-- --------------- 1. Descripcion --------------- -->

    <!-- <div class="container">
        <div class="row  scroll-text">
            <div class="col-12">
                <div class="container text-center" style="margin: 10px 0px 0px;">
                    <div class="text-design">
                        <h2>Descubre lo que quieres comprar hoy</h2>
                        <p class="text-center"> Una cantidad infinita de opciones de todo lo que siempre quisiste. Cada una de nuestras selecciones en tecnología, mascotas y tendencias te espera. </p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    </div>

    <!-- --------------- 1. Seccion de productos [ Best Sellers ] --------------- -->

    <section class="sections">
        <div class="container">
            <div class="contenedor-header-title-design">
                <div class="header-title-design"> Más vendido </div>
                <a href="#">
                    <div class="header-enlace-design"> <span class="title-enlace-design"> Explorar los productos </span>
                        <ion-icon style="font-size: 22px;" name="arrow-forward-outline"></ion-icon>
                    </div>
                </a>
            </div>
            <div class="contenedor-3">
                <?php
                $sentencia = $pdo->prepare("SELECT * FROM best_mark_products where id BETWEEN 1 AND 4 ORDER BY id");
                $sentencia->execute();
                $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                // print_r($listaProductos);
                ?>
                <?php foreach ($listaProductos as $producto) { ?>
                    <div class="card">
                        <div class="card-imagen-design" style="background:url('<?php echo $producto["imagen"]; ?>'); background-position: center;background-size: contain; background-repeat: no-repeat;"></div>
                        <div class="card-body">
                            <span><a href="" style="font-size: 10px; color:#888;"> <?php echo $producto["categoria"]; ?></a> </span>
                            <a href="producto?id=<?php echo $producto['titulo']; ?>">
                                <h5><?php echo $producto["titulo"]; ?></h5>
                            </a>
                            <div class="card-precio-design">
                                <div class="card-precio-design"><span class="precio-actual-design"> $<?php echo $producto["precio"]; ?> </span> <span class="precio-antes-design"> $0.00 </span> </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>


    <!-- --------- " Banner de productos " --------- -->
    <section>
        <div class="container">
            <div class="row">
                <style>
                    .espacio-banner {
                        padding: 12px;
                    }
                </style>


                <div class="col-lg-6 col-md-6 col-12 espacio-banner">
                    <div class="banner">
                        <div class="banner-body">
                            <div class="banner-content">
                                <h4>The milk products</h4>
                                <h6>best mark shopping</h6>
                                <a href="">
                                    <div class="btn btn-dark"> Shop now </div>
                                </a>
                            </div>
                            <div class="banner-imagen">
                                <img src="//mageblueskytech.com/dukamarket/media/revslider/slide-home1.png" alt="banner">
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 col-md-6 col-12 espacio-banner">
                    <div class="banner">
                        <div class="banner-body">
                            <div class="banner-content">
                                <h4>The milk products</h4>
                                <h6>best mark shopping</h6>
                                <a href="">
                                    <div class="btn btn-dark"> Shop now </div>
                                </a>
                            </div>
                            <div class="banner-imagen">
                                <img src="//mageblueskytech.com/dukamarket/media/revslider/slide-home2.png" alt="banner">
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- --------------- 2. Carusel de productos [ Categorias ] --------------- -->

    <!-- <section style="margin-bottom: 0px; padding: 30px 0px 30px; margin-top: 30px; background: #f4f9ff;"> -->
    <section class="sections">
        <div class="container">
            <div class="row">
                <!-- <div class="contenedor-header-title-design">
                    <div class="header-title-design">Electronics </div>
                    <a href="#">
                        <div class="header-enlace-design"> <span class="title-enlace-design"> Explorar los productos </span>
                            <ion-icon style="font-size: 22px;" name="arrow-forward-outline"></ion-icon>
                        </div>
                    </a>
                </div><br><br><br> -->
                <div class="col-12">
                    <div class="owl-carousel owl-theme">
                        <?php
                        $sentencia = $pdo->prepare("SELECT * FROM carousel");
                        $sentencia->execute();
                        $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                        // print_r($listaProductos);
                        ?>
                        <?php foreach ($listaProductos as $producto) { ?>
                            <div class="item">
                                <div class="img-slider" style="background-image: url(<?php echo $producto["imagen"]; ?>);" alt=""></div>
                                <a href="#">
                                    <h5 class="titulo-slider"><?php echo $producto["titulo"]; ?></h5>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- --------------- 3. Seccion de productos [ Best Picks ] --------------- -->

    <section class="sections">
        <div class="container">
            <div class="contenedor-header-title-design">
                <div class="header-title-design"> Lo mas destacado </div>
                <a href="#">
                    <div class="header-enlace-design"> <span class="title-enlace-design"> Explorar los productos </span>
                        <ion-icon style="font-size: 22px;" name="arrow-forward-outline"></ion-icon>
                    </div>
                </a>
            </div>
            <div class="contenedor-3">
                <?php
                $sentencia = $pdo->prepare("SELECT * FROM best_mark_products where id BETWEEN 5 AND 8 ORDER BY id");
                $sentencia->execute();
                $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                // print_r($listaProductos);
                ?>
                <?php foreach ($listaProductos as $producto) { ?>
                    <div class="card">
                        <div class="card-imagen-design" style="background:url('<?php echo $producto["imagen"]; ?>'); background-position: center;background-size: contain; background-repeat: no-repeat;"></div>
                        <div class="card-body">
                            <a href="producto?id=<?php echo $producto['titulo']; ?>">
                                <h5><?php echo $producto["titulo"]; ?></h5>
                            </a>
                            <div class="card-precio-design">
                                <div class="card-precio-design"><span class="precio-actual-design"> $<?php echo $producto["precio"]; ?> </span> <span class="precio-antes-design"> $0.00 </span> </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

    <!-- --------------- 4. Seccion de producto [ Slider ] --------------- -->

    <section style="margin-bottom: 0px; padding: 30px 0px 30px; margin-top: 30px; background: #f4f9ff;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="conteiner-text-title">
                        <h2 class="title-dividers" style="text-align: left; font-size: 20px; text-transform: none; margin-bottom: 4px; font-weight: 700; font-family: 'Inter';"> Best Products</h2>
                    </div>
                </div>
                <div class="col-12">

                </div>
            </div>
        </div>
    </section>

</main>



<?php
include 'frontend/pagina_footer.php';
?>


</body>

</html>