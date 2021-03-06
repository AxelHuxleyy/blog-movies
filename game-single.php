<?php 

	$id= $_GET['id'];
	include 'conexion.php';

	$sql = $conexion->prepare('SELECT * FROM actores WHERE  id = :id LIMIT 1');
    $sql->execute(array(':id' => $id));
	$resultado = $sql->fetchAll();

	foreach ($resultado as $row) {
		$id=$row["id"];
		$nombre=$row["nombre"];
		$biografia= $row['biografia'];
		$nacimiento= $row['nacimiento'];
	}
	
	$sql = $conexion->prepare('SELECT peliculas.id, peliculas.nombre AS nombrepelicula, actores.nombre AS nombreactor FROM peliculas INNER JOIN participa ON 
	peliculas.id = participa.id_pelicula INNER JOIN actores ON participa.id_actor = actores.id WHERE actores.id = :id_actor');
    $sql->execute(array(':id_actor' => $id));
	$res = $sql->fetchAll();

	
	
	

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

	

	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg/1.jpg">
		<div class="page-info">
			<h2>Games</h2>
			<div class="site-breadcrumb">
				<a href="index.php">Home</a>  /
				<a href="games.php">Actores</a> / <span><?php echo utf8_encode($nombre);?></span>
			</div>
		</div>
	</section>
	<!-- Page top end-->


	<!-- Games section -->
	<section class="games-single-page">
		<div class="container">
			
			<div class="row">
				<div class="col-xl-9 col-lg-8 col-md-7 game-single-content">
					<div class="game-single-preview">
						<img src="img/posters/posert<?php echo utf8_encode($id);?>.jpg" alt="<?php echo utf8_encode($nombre); ?>">
					</div>
					<div class="gs-meta"><?php echo utf8_encode($nacimiento); ?>  /  in <a href="">Games</a></div>
					<h2 class="gs-title"><?php echo utf8_encode($nombre);?></h2>
					
					<h4>Biografia</h4>
					<p><?php echo utf8_encode($biografia);?></p>
					
				</div>
				<div class="col-xl-3 col-lg-4 col-md-5 sidebar game-page-sideber">
					<div id="stickySidebar">
						<div class="widget-item">
							<div class="rating-widget">
								<h4 class="widget-title">Peliculas protagonizadas</h4>
								<ul>
									<?php 
									
									foreach ($res as $row) {
										$id=$row["id"];
										$nombre=$row["nombrepelicula"];?>
										<li><a href="pelicula.php?id=<?php echo utf8_encode($id);?>"><?php echo utf8_encode($nombre);?></a></li>
										<?php
										
									}
									
									?>
									
									
								</ul>
								
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Games end-->
		
	


	<!-- Newsletter section -->
	<section class="newsletter-section">
		<div class="container">
			<h2>Subscribe to our newsletter</h2>
			<form class="newsletter-form">
				<input type="text" placeholder="ENTER YOUR E-MAIL">
				<button class="site-btn">subscribe  <img src="img/icons/double-arrow.png" alt="#"/></button>
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
