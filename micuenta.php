<?php 
	session_start();
	include 'conexion.php';
	$id_usuario= $_SESSION['usuario'];
	$sql = $conexion->prepare('SELECT * FROM usuario WHERE  id = :usuario LIMIT 1');
	$sql->execute(array(':usuario' => $id_usuario));
	$resultado = $sql->fetchAll();
	foreach ($resultado as $row) {
		$nombre=$row["nombre"];
		$apellido= $row['apellido'];
		$genero= $row['genero'];
		$nacimiento =$row['nacimiento'];
		$direccion= $row['direccion'];
		$telefono= $row['telefono'];
		$correo= $row['correo'];
		}
	
?>


<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>EndGam - Gaming Magazine Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="EndGam Gaming Magazine Template">
	<meta name="keywords" content="endGam,gGaming, magazine, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/animate.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<?php include('menu.php')?>
	</header>
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg/4.jpg">
		<div class="page-info">
			<h2><?php echo utf8_encode($id_usuario);?></h2>
			<div class="site-breadcrumb">
				<a href="index.php">Home</a>  /
				<span>mi cuenta</span>
			</div>
		</div>
	</section>
	<!-- Page top end-->


	<!-- Contact page -->
	<section class="contact-page">
		<div class="container">
			<div class="row">
				
				<div class="col-12 contact-text text-white">
					<h3>Hola usuario</h3>
					<p>En esta seccion podras realizar modificaciones a tu cuenta</p>
					<div class="cont-info">
						<div class="ci-icon"><a href="update.php?accion=nombre"><img src="img/editar.png"></a> </div>
						<div class="ci-text">Nombre: <?php echo utf8_encode($nombre)?> </div>
					</div>
					<div class="cont-info">
						<div class="ci-icon"><a href="update.php?accion=apellido"><img src="img/editar.png"></a> </div>
						<div class="ci-text">Apellido:<?php echo utf8_encode($apellido)?></div>
					</div>
					<div class="cont-info">
						<div class="ci-icon"><a href="update.php?accion=genero"><img src="img/editar.png"></a> </div>
						<div class="ci-text">Genero: <?php echo utf8_encode($genero)?></div>
					</div>
					<div class="cont-info">
							<div class="ci-icon"><a href="update.php?accion=nacimiento"><img src="img/editar.png"></a> </div>
							<div class="ci-text">nacimiento: <?php echo utf8_encode($nacimiento)?> </div>
					</div>
					<div class="cont-info">
							<div class="ci-icon"><a href="update.php?accion=direccion"><img src="img/editar.png"></a> </div>
							<div class="ci-text">Direccion: <?php echo utf8_encode($direccion)?></div>
					</div>
					<div class="cont-info">
							<div class="ci-icon"><a href="update.php?accion=telefono"><img src="img/editar.png"></a> </div>
							<div class="ci-text">Telefono:<?php echo utf8_encode($telefono)?></div>
					</div>
					<div class="cont-info">
							<div class="ci-icon"><a href="update.php?accion=correo"><img src="img/editar.png"></a> </div>
							<div class="ci-text">Correo: <?php echo utf8_encode($correo)?></div>
					</div>
					<div class="cont-info">
							<div class="ci-icon"><a href="update.php?accion=password"><img src="img/editar.png"></a> </div>
							<div class="ci-text">Password: *******</div>
					</div>
				</div>
				
				<div class="col-12">
						<a href="cerrar.php"><button class="site-btn">Cerrar sesion <img src="img/icons/double-arrow.png" alt="#"/></button></a>
					</div>

			</div>
		</div>
	</section>
	<!-- Contact page end-->


	<!-- Newsletter section -->
	<section class="newsletter-section">
		<div class="container">
			<h2>Subscribe to our newsletter</h2>
			<form class="newsletter-form">
				<input type="text" placeholder="ENTER YOUR E-MAIL">
				<button class="site-btn">subscribe <img src="img/icons/double-arrow.png" alt="#"/></button>
			</form>
		</div>
	</section>
	<!-- Newsletter section end -->


	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<div class="footer-left-pic">
				<img src="img/footer-left-pic.png" alt="">
			</div>
			<div class="footer-right-pic">
				<img src="img/footer-right-pic.png" alt="">
			</div>
			<a href="#" class="footer-logo">
				<img src="./img/logo.png" alt="">
			</a>
			<ul class="main-menu footer-menu">
				<li><a href="">Home</a></li>
				<li><a href="">Games</a></li>
				<li><a href="">Reviews</a></li>
				<li><a href="">News</a></li>
				<li><a href="">Contact</a></li>
			</ul>
			<div class="footer-social d-flex justify-content-center">
				<a href="#"><i class="fa fa-pinterest"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-dribbble"></i></a>
				<a href="#"><i class="fa fa-behance"></i></a>
			</div>
			<div class="copyright"><a href="">Colorlib</a> 2018 @ All rights reserved</div>
		</div>
	</footer>
	<!-- Footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.sticky-sidebar.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
