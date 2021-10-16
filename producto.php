<!-- <meta http-equiv="refresh" content="10"> -->

<?php
include 'db/config.php';
include 'db/conexion.php';
include 'global/carrito.php';
include 'frontend/pagina_head.php';
?>

<body>

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


    <?php
    $producto = $_GET['id'];
    $sentencia = $pdo->prepare("SELECT * FROM best_mark_products WHERE  titulo LIKE '%$producto%' = 1");
    $sentencia->execute();
    $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    // print_r($listaProductos);
    ?>
    <?php foreach ($listaProductos as $row) { ?>
        <div class="container">
            <div class="row">
                <!-- <div style="background: white; padding:15px; border-radius:12px;" class="enlaces-directos">
                    <ul class="uk-breadcrumb ">
                        <li><a href="/">Regresar</a></li>
                        <li><a href="carrito.php">Producto</a></li>
                        <li><a href="producto-review.php?id=<?php echo $row['titulo']; ?>"> <?php echo $row["titulo"]; ?> </a></li>
                    </ul>
                </div> -->
                <div style="background: white; padding:15px; border-radius:12px;" class="ui large breadcrumb">
                    <a class="section">Inicio</a>
                    <i class="icon-chevron-right"></i>
                    <div class="section"><?php echo $row["marca"]; ?></div>
                    <i class="icon-chevron-right"></i>
                    <div class="active section"><?php echo $row["titulo"]; ?></div>
                </div>
            </div>
        </div>


        <main>
            <div class="container">

                <div class="details-products-design">
                    <div class="details-imagen">
                        <img class="ui large image" src="<?php echo $row['imagen']; ?>" alt=" Producto ">
                    </div>

                    <div class="details-info">
                        <div class="details-titulo">
                            <h2> <?php echo $row['titulo']; ?></h2>
                        </div>

                        <div class="details-categoria">
                            <span class="sku"> SKU: <?php echo $row['codigo']; ?> </span>
                            <span class="categoria"> Categoria: <a href="#"><?php echo $row['categoria']; ?></a> </span>
                        </div>

                        <div class="details-precio">
                            <h2>$58.89</h2>
                        </div>

                        <div class="details-valoracion">
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                Placeat odio quo reprehenderit rem assumenda ipsa reiciendis vitae voluptas nesciunt quos.</p>
                        </div>
                       
                        <div class="card-botones-design">
                            <form class="form-submit" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?action=add&id=<?php echo $row["titulo"]; ?>" method="POST">
                                <button type="submit" style="width:100%; border:none; padding:20px;" name="btnAccion" value="agregar" class="boton-view id">Agregar al carrito</buttom>
                                    <input type="hidden" name="imagen" id="imagen" value="<?php echo openssl_encrypt($row["imagen"], COD, KEY); ?>">
                                    <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt($row["cantidad"], COD, KEY); ?>">
                                    <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($row["precio"], COD, KEY); ?>">
                                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($row["id"], COD, KEY); ?>">
                                    <input type="hidden" name="titulo" id="titulo" value="<?php echo openssl_encrypt($row["titulo"], COD, KEY); ?>">
                            </form>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </main>
    <?php
    }
    ?>

    <?php
    include 'frontend/pagina_footer.php';
    ?>
</body>