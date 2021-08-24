
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include("head.php");?>

        <meta charset="utf-8">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Signika:400,600'>
        <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">

        <link rel="stylesheet" href="css/style.css">
        
  </head>
  
  <style>
      
      h4{
          font-family: 'Merriweather', serif;
          font-size: 23px;
          color: white;
      }
    
      body{
          background: url(image/calis2.jpg);
          background-position: center;
          background-attachment: fixed;
          background-size: cover;
      }
      .whitediv{
          background: white;
      }
      
    </style>
  <body>
     <header>
  <span class="menu"><i class="material-icons">menu</i></span>
    </header>
<section class="main">
   <?php include "menu.php"; ?>
   
  <article>
    
    <div id="movedor">
        <div>
      <center><h4>Tabla de usuarios</h4></center>
		</div>
			<div class="panel-body cold-md-12 col-lg-10 col-xs-12 col-sm-12 col-lg-offset-1">
				<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label"></label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Nombre o No. de usuario" onkeyup='load(1);' autocomplete="off">
							</div>
							
							
							
							<div class="col-md-3">
								<button type="button" class="btn btn-default" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Buscar</button>
								<span id="loader"></span>
							</div>
							
						</div>
				
				
				
			    </form>
			<div class="whitediv">
			    
				<div class='outer_div'></div><!-- Carga los datos ajax -->
			    
			</div>
				
			</div>
		</div>	
		
		<?php include("footer.php"); ?>


	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/buscar_users.js"></script>
        
        
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    
      
      
      
      
      
    
  </article>
</section>
 
 

  

    <script  src="js/index.js"></script>
    
    
			
  </body>
</html>



