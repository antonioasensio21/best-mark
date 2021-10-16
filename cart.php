<?php
include 'db/config.php';
include 'db/conexion.php';
include 'global/carrito.php';
?>


<?php
include 'frontend/pagina_head.php';
?>

<style>
    /* body {
        font-family: 'Roboto', sans-serif;
    } */
</style>

<div class="container">
    <div class="flex-contenido">
        <div style="background: white; padding:15px; border-radius:12px;" class="ui large breadcrumb">
            <a href="/" class="section">Inicio</a>
            <i class="icon-chevron-right"></i>
            <div class="active section"> Carrito </div>
        </div>
    </div>
</div>


<main>
    <div class="container">
        
        <div class="contenedor-cart">
            <!-- productos -->
            <div class="carrito-productos">
                <?php if (!empty($_SESSION['CARRITO'])) { ?>
                    <table style="margin-top: 0; margin-bottom:0;" class="uk-table uk-table-hover responsive uk-table-small uk-table-middle">
                        <thead>
                            <tr>
                                <th class="uk-table-shrink text-center">#</th>
                                <th class="uk-table-shrink text-center">Imagen</th>
                                <th class="uk-table-shrink text-left">Producto</th>
                                <th class="uk-table-shrink text-center">Precio</th>
                                <th class="uk-table-shrink text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            $descuento = 0;
                            $envio = 10;
                            $impuesto = 0;
                            ?>
                            <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
                                <tr>
                                    <td class="text-center"> <?php echo $producto['cantidad'] ?> </td>
                                    <td class="text-center"> <img class="uk-preserve-width uk-border-circle" src="<?php echo $producto['imagen'] ?>" style="width: 50px;" alt=""> </td>
                                    <td class="text-left uk-text-truncate" style="font-size: 14px;"> <?php echo $producto['titulo'] ?> </td>
                                    <td class="text-center" style="font-size: 14px;">$ <?php echo $producto['precio'] ?></td>
                                    <td class="text-center">
                                        <form action="" method="POST">
                                            <input type="hidden" class="id" name="id" id="id" value="<?php echo openssl_encrypt($producto["id"], COD, KEY); ?>">

                                            <button style="border: none; border-radius:22px;" class="ui red circular label" type="submit" name="btnAccion" value="eliminar">
                                                <span style="font-size: 12px;" class="icon-x"></span>
                                            </button>

                                        </form>
                                    </td>

                                </tr>
                                <?php $total = $total + ($producto['precio'] * $producto['cantidad']); ?>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="text-center" style="padding: 50px;" width="100%"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 280.028 280.028" width="280.028" height="80.028">
                                    <path class="c-01" d="M35.004 0h210.02v78.758H35.004V0z" fill="#d07c40"></path>
                                    <path class="c-02" d="M262.527 61.256v201.27c0 9.626-7.876 17.502-17.502 17.502H35.004c-9.626 0-17.502-7.876-17.502-17.502V61.256h245.025z" fill="#f4b459"></path>
                                    <path class="c-03" d="M35.004 70.007h26.253V26.253L35.004 0v70.007zm183.767-43.754v43.754h26.253V0l-26.253 26.253z" fill="#f4b459"></path>
                                    <path class="c-04" d="M61.257 61.256V26.253L17.503 61.256h43.754zm157.514-35.003v35.003h43.754l-43.754-35.003z" fill="#e3911c"></path>
                                    <path class="c-05" d="M65.632 105.01c-5.251 0-8.751 3.5-8.751 8.751s3.5 8.751 8.751 8.751 8.751-3.5 8.751-8.751c0-5.25-3.5-8.751-8.751-8.751zm148.764 0c-5.251 0-8.751 3.5-8.751 8.751s3.5 8.751 8.751 8.751 8.751-3.5 8.751-8.751c.001-5.25-3.501-8.751-8.751-8.751z" fill="#cf984a"></path>
                                    <path class="c-06" d="M65.632 121.637c5.251 0 6.126 6.126 6.126 6.126 0 39.379 29.753 70.882 68.257 70.882s68.257-31.503 68.257-70.882c0 0 .875-6.126 6.126-6.126s6.126 6.126 6.126 6.126c0 46.38-35.003 83.133-80.508 83.133s-80.508-37.629-80.508-83.133c-.001-.001.874-6.126 6.124-6.126z" fill="#cf984a"></path>
                                    <path class="c-07" d="M65.632 112.886c5.251 0 6.126 6.126 6.126 6.126 0 39.379 29.753 70.882 68.257 70.882s68.257-31.503 68.257-70.882c0 0 .875-6.126 6.126-6.126s6.126 6.126 6.126 6.126c0 46.38-35.003 83.133-80.508 83.133s-80.508-37.629-80.508-83.133c-.001 0 .874-6.126 6.124-6.126z" fill="#fdfbf7"></path>
                                </svg>
                                <br>
                                <p style="font-weight: 400; font-size:18px; margin-top:20px; text-align:center;"> No hay productos en el carrito </p>
                            </div>
                            <?php
                            $total = 0;
                            $descuento = 0;
                            $envio = 0;
                            $impuesto = 0;
                            ?>
                        <?php } ?>
                        </tbody>
                    </table>
            </div>
            <!-- payment -->
            <div class="carrito-payment">
                <div class="right">
                    <ul>
                        <li class="paiment-cart">Subtotal<span>$ <?php echo number_format($total, 2) ?> </span></li>
                        <li class="paiment-cart">Descuento<span>$ <?php echo number_format($descuento, 2); ?></span></li>
                        <li class="paiment-cart">Impuestos<span>$ <?php echo number_format($impuesto, 2); ?></span></li>
                        <li class="paiment-cart">Envio<span>$ <?php echo number_format($envio, 2); ?></span></li>
                        <div class="ui horizontal divider"> Checkout </div>
                        <li style="font-weight: 700;" class="paiment-cart">Total a Pagar <span>USD $ <?php echo number_format($total + $envio - $descuento, 2); ?></span></li>
                    </ul>
                </div>
                <div class="carrito-payment-botones">
                    <a href="#" class="btn btn-dark">  Seguir comprando</a>
                    <a class="btn btn-dark <?= ($total > 0) ? '' : 'disabled'; ?>"> Proceder a pagar </a>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="modal-header" style="padding:0px; padding-left: 0px;">
            <a href="/" type="button" class="btn btn-success">Seguir comprando</a>
            <a href="#" type="button" class="btn btn-dark <?= ($total > 0) ? '' : 'disabled'; ?>"> Proceder a pagar</a>
        </div> -->
    <style>
        @media screen and (max-width:500px) {
            table {
                font-size: 14px;
            }

            table .ss {
                font-size: 12px;
            }
        }
    </style>

</main>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

<script type="text/javascript">
    $(document).ready(function() {

        // Change the item quantity
        $(".id").on('change', function() {
            location.reload(true);
            $.ajax({
                url: 'cart.php',
                method: 'post',
                cache: false,
                success: function(response) {
                    console.log(response);
                }
            });
        });
    });
</script>
<?php
include 'frontend/pagina_footer.php';
?>

<script>
    const menuBtn = document.querySelector(".menu-icon span");
    const searchBtn = document.querySelector(".search-icon");
    const cancelBtn = document.querySelector(".cancel-icon");
    const items = document.querySelector(".nav-items");
    const form = document.querySelector("form");
    menuBtn.onclick = () => {
        items.classList.add("active");
        menuBtn.classList.add("hide");
        searchBtn.classList.add("hide");
        cancelBtn.classList.add("show");
    }
    cancelBtn.onclick = () => {
        items.classList.remove("active");
        menuBtn.classList.remove("hide");
        searchBtn.classList.remove("hide");
        cancelBtn.classList.remove("show");
        form.classList.remove("active");
        cancelBtn.style.color = "#ff3d00";
    }
    searchBtn.onclick = () => {
        form.classList.add("active");
        searchBtn.classList.add("hide");
        cancelBtn.classList.add("show");
    }
</script>
</body>

</html>