<?php
include 'db/config.php';
include 'db/conexion.php';
include 'global/carrito.php';
?>


<!-- \\\\\\\\\\\\\\\\\\\\\\\\\\ HEADER DE LA BUSQUEDA \\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

<?php
include 'frontend/pagina_head.php';
?>

<div class="container">
	<div class="row">
		<!-- <div class="col-12 col-md-6 col-lg-6">
			<div style="padding:12px 0;">
				<form role="search" method="POST" action="result.php" style="z-index: 9999; border-radius:20px;">
					<input style="border-radius: 60px;" type="text" class="uk-input search-data" placeholder="Search" name="search" id="search" required>
				</form>
			</div>
		</div> -->
		<div class="col-12 col-md-12 col-lg-12 text-left">
			<div style="margin: 25px 0;">
				<h4><a style="font-size: 20px;">Resultado de la búsqueda.</a></h4>
			</div>
		</div>
	</div>
</div>

<!-- \\\\\\\\\\\\\\\\\\\\\\\\\\ RESULTADO DE LA BUSQUEDA  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

<section>
	<div class="container">
		<div class="contenedor-3">

			<?php
			include('buscador/conn.php');
			$search = $_GET['search'];
			$query = mysqli_query($conn, "SELECT * FROM `best_mark_products` WHERE titulo LIKE '%$search%' OR precio LIKE '%$search%'");
			if (mysqli_num_rows($query) == 0) {
				echo '
					<div class="col-12 col-md-12 col-lg-12 text-left">
				 	    <div style="margin: 15px 0; background: white; margin:20px 0px; padding:15px; border-radius:12px;">
				    	<h5 style="text-align:left;"><span style="font-size: 16px;" href="result">  No se encontro el producto!</span></h5>
					  </div>
					</div>
					';
			} else {
				while ($row = mysqli_fetch_array($query)) {
			?>
					<div class="card">
						<div class="card-imagen-design" style="background:url('<?php echo $row["imagen"]; ?>'); background-position: center;background-size: contain; background-repeat: no-repeat;"></div>
						<div class="card-body">
							<span><a href="" style="font-size: 10px; color:#888;"> <?php echo $row["categoria"]; ?></a> </span>
							<a href="producto?id=<?php echo $row['titulo']; ?>">
								<h5><?php echo $row["titulo"]; ?></h5>
							</a>
							<div class="card-precio-design">
								<div class="card-precio-design"><span class="precio-actual-design"> $<?php echo $row["precio"]; ?> </span> <span class="precio-antes-design"> $0.00 </span> </div>
							</div>
						</div>
					</div>
			<?php
				}
			}
			?>
		</div>
	</div>
</section>

<?php
include 'frontend/pagina_footer.php';
?>