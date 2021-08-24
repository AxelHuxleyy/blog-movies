<?php 
if(!isset($_SESSION['usuario']))
{
	
}

session_start(); ?>


<div class="header-warp">
			<div class="header-bar-warp d-flex pt-0">
				<!-- site logo -->
				<a href="index.php" class="site-logo py-2" >
					<img src="./img/logo2.png"  alt="">
				</a>
				<nav class="top-nav-area w-100 pt-5 ">
                    <?php if(isset($_SESSION['usuario']))
                    {
                        ?>
					<div class="user-panel">
                        <a href="micuenta.php">Mi cuenta</a>
						
                    </div>
                    <?php 
                    }
                    else
                    {
                    ?>
                    <div class="user-panel">
                        <a href="login.php">Login</a> / <a href="register.php">Register</a>
                    </div>
                    <?php
                    }
                     ?>
					<!-- Menu -->
					<ul class="main-menu primary-menu">
						<li><a href="index.php">Home</a></li>
						<li><a href="games.php">Actores</a>
						</li>
						<li><a href="review.php">Peliculas</a></li>
						<li><a href="./panel/peliculas.php">Panel</a></li>
						<li><a href="listas.php">Listas de favoritos</a></li>
					</ul>
				</nav>
			</div>
		</div>