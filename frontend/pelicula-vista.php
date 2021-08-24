




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
	<?php
	
		foreach ($resu as $row) {
			$promedio=$row["promedio"];
			
			}
	
			?>
	
	

	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg/1.jpg">
		<div class="page-info">
			<h2>Pelicula <?php  echo utf8_encode($nombre); ?></h2>
			<div class="site-breadcrumb">
				<a href="">Home</a>  /
				<span>Pelicula <?php  echo utf8_encode($nombre); ?></span>
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
				<img src="img/peliculas/peli<?php echo utf8_encode($id);?>.jpg" alt="">
			</div>
					<div class="gs-meta"><?php  echo utf8_encode($categora); ?> /  <?php   echo utf8_encode($productor); ?> / <?php  echo utf8_encode($director); ?></div>
					<h2 class="gs-title"><?php  echo utf8_encode($nombre); ?></h2>
					<h4>Sinopsis</h4>
					<p><?php  echo utf8_encode($resumen);?></p>
					
					<div class="geme-social-share pt-5 d-flex">
						<p>Share:</p>
						<a href="#"><i class="fa fa-pinterest"></i></a>
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-dribbble"></i></a>
						<a href="#"><i class="fa fa-behance"></i></a>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-md-5 sidebar game-page-sideber">
					<div id="stickySidebar">
						<div class="widget-item">
							<div class="rating-widget">
								
								<div class="rating">
									<h5><i>Rating</i><span><?php echo round($promedio, 2); ?></span> / 5</h5>
								</div>
							</div>
						</div>
						<div class="widget-item">
							<div class="rating-widget">
								<h4 class="widget-title">Actores</h4>
								<ul>
								<?php 
									
									foreach ($res as $row) {
										$id=$row["id"];
										$nombre=$row["nombreactor"];?>
										<li><a href="game-single.php?id=<?php echo utf8_encode($id);?>"><?php echo utf8_encode($nombre);?></a></li>
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
<?php 
	if($resul !== false)
	{
		foreach($resul as $row)
		{
			$coment=$row['comentario'];
			$nombreuse=$row['username'];
		
		?>

		<section class="game-author-section border border-dark ">
			<div class="container">
				<div class="game-author-info">
					<h4>Escrito por: <?php  echo utf8_encode($nombreuse); ?></h4>
					<p> <?php  echo utf8_encode($coment); ?></p>
				</div>
			</div>
		</section>
		<?php
		}
	}
	?>

	


	<section class="game-author-section">
		<div class="container">
			<div class="game-author-info">
				<h4>Deja tu comentario</h4>
				 
					<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
					<textarea class="form-control" placeholer="Message" name="comentario">
						</textarea>
						<?php if(!empty($error)): ?>
						<div class="mensaje">
							<?php echo $error; ?>
						</div>
						<?php endif; ?>
						<button type="submit" class="site-btn">Comentar<img src="img/icons/double-arrow.png" /></button>
					</form>
			</div>
		</div>
	</section>

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
