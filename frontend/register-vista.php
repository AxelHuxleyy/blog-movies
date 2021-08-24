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
	<?php include ("menu.php")?>

	</header>
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg/4.jpg">
		<div class="page-info">
			<h2>Register</h2>
			<div class="site-breadcrumb">
				<a href="">Home</a>  /
				<span>Register</span>
			</div>
		</div>
	</section>
	<!-- Page top end-->


	<!-- Contact page -->
	<section class="contact-page">
		<div class="container">
			
			<div class="row">
				<div class="col-lg-7 order-2 order-lg-1">
					<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="contact-form">
					
					<input type="email" placeholder="Correo electronico" required name="correo">
					    <input type="password" placeholder="contraseña" required name="clave">
					    <input type="password" placeholder="Repite contraseña" required name="clave2">
						<input type="text" placeholder="Nombre" required name="nombre">
						<input type="text" placeholder="Apellidos" required name="apellido">
						<h4 style="color: white;">Genero:</h4><select name="genero" class="mb-2">
							<option value="hombre">hombre</option>
							<option value="mujer">mujer</option>
							
						</select>
						<input type="date" placeholder="Fecha de nacimiento" required name="nacimiento">
						<input type="text" placeholder="Direccion" required name="direccion">
						<input type="tel" placeholder="telefono" required name="telefono">
						<?php if(!empty($error)): ?>
						<div class="mensaje">
							<?php echo $error; ?>
						</div>
						<?php endif; ?>
						<button type="submit" class="site-btn">Registrarme<img src="img/icons/double-arrow.png" /></button>
					</form>
				</div>
				<div class="col-lg-5 order-1 order-lg-2 contact-text text-white">
					<h3>Forma parte de nuestra increible comunidad</h3>
					<p>Si formas parte de nuestra comunidad podras editar, comentar, agregar, eliminar el contenido que tu queiras no esperes mas y unete a endgame</p>
					
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

<h4>Deja tu comentario</h4>
				 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
						
					<button type="submit" class="btn-primary">Comentar</button>

				 </form>