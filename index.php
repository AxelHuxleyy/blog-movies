<?php 
	include 'conexion.php';
	$sql = $conexion->prepare('SELECT * FROM peliculas  LIMIT 4');
	$sql->execute();
	$resultado = $sql->fetchAll();
	
	
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
		<?php include ("menu.php")?>
	</header>
	<!-- Header section end -->


	<!-- Hero section -->
	<section class="hero-section overflow-hidden">
		<div class="hero-slider owl-carousel">
			<div class="hero-item set-bg d-flex align-items-center justify-content-center text-center" data-setbg="img/slider-bg-1.jpg">
				<div class="container">
					<h2>Peliculas</h2>
					<p>Tus peliculas favoritas</p>
					<a href="#" class="site-btn">Read More  <img src="img/icons/double-arrow.png" alt="#"/></a>
				</div>
			</div>
			<div class="hero-item set-bg d-flex align-items-center justify-content-center text-center" data-setbg="img/slider-bg-2.jpg">
				<div class="container">
					<h2>Edita</h2>
					<p>Agrega, elimina, crea<br>sit amet elementum lorem. Ut cursus tempor turpis.</p>
					<a href="#" class="site-btn">ver más  <img src="img/icons/double-arrow.png" alt="#"/></a>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end-->


	


	<!-- Blog section -->
	<section class="blog-section spad">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12">
					<div class="section-title text-white">
						<h2>Algunas peliculas</h2>
					</div>
					<?php foreach ($resultado as $row) {
					$id=$row["id"];
					$nombre=$row["nombre"];
					$categoria= $row['categoria'];
					$director= $row['director'];
					$productor =$row['productor'];
					$resumen= $row['resumen'];
					?>
					
					<!-- Blog item -->
					<div class="blog-item">
						<div class="blog-thumb">
							<img src="./img/peliculas/peli<?php echo utf8_encode($id)?>.jpg" alt="">
						</div>
						<div class="blog-text text-box text-white">
							<div class="top-meta"><?php echo utf8_encode($categoria)  ?>  /  <?php echo utf8_encode($productor)?></div>
							<h3><?php echo utf8_encode($nombre);?></h3>
							<p><?php  echo utf8_encode($resumen)?></p>
							<a href="pelicula.php?id=<?php echo utf8_encode($id)?>" class="read-more">Ver más  <img src="img/icons/double-arrow.png" alt="#"/></a>
						</div>
					</div>
					<?php
					 } ?>
					
					<!-- Blog item -->
					
				</div>
				
				
				
				
				
			</div>
		</div>
	</section>
	<!-- Blog section end -->


	<!-- Intro section -->
	<section class="intro-video-section set-bg d-flex align-items-end " data-setbg="./img/fondo-promo2.jpg">
		<a href="https://www.youtube.com/watch?v=oD1vbhicJUY" class="video-play-btn video-popup"><img src="img/icons/solid-right-arrow.png" alt="#"></a>
		<div class="container">
			<div class="video-text">
				<h2>Para amantes de peliculas</h2>
				<p>Habla de peliculas con amantes de peliculas</p>
			</div>
		</div>
	</section>
	<!-- Intro section end -->


	<!-- Featured section -->
	<!--<section class="featured-section">
		<div class="featured-bg set-bg" data-setbg="img/featured-bg.jpg"></div>
		<div class="featured-box">
			<div class="text-box">
				<div class="top-meta">11.11.18  /  in <a href="">Games</a></div>
				<h3>The game you’ve been waiting  for is out now</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquamet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vestibulum posuere porttitor justo id pellentesque. Proin id lacus feugiat, posuere erat sit amet, commodo ipsum. Donec pellentesque vestibulum metus...</p>
				<a href="#" class="read-more">Read More  <img src="img/icons/double-arrow.png" alt="#"/></a>
			</div>
		</div>
	</section>-->
	<!-- Featured section end-->



	<!-- Newsletter section -->
	


	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<div class="footer-left-pic">
				<img src="img/  footer-left-pic.png" alt="">
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
