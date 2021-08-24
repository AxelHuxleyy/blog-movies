<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Renovacion</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    
    
    
    <!-- aqui es lo del menu-->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Signika:400,600'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

    <link rel="stylesheet" href="css/style.css">
    
    
    
    <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="css/style3.css">
    
    
</head>
<body >
   
   
   <header>
  <span class="menu"><i class="material-icons">menu</i></span>
    </header>
<section class="main">
   <?php include "menu.php"; ?>
  <article>
   
   
    <div class="container-form">
        <div class="header">
            <div class="logo-title">
                <img src="image/logo.png" alt="">
                <h2>Animals</h2>
            </div>
            <div class="menu">
                <a href="rennovacion.php"><li class="module-login active">Favoritas</li></a>
            </div>
        </div>
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form" autocomplete="off">
            <div class="welcome-form"><h1>Agrega tus peliculas favoritas</h1>
                
        </div>
            
            
            <div class="password line-input">
                <label class="lnr lnr-calendar-ful"></label>
                <select name="pelicula" required>
                <?php 
                    foreach($resultado as $row)
                    {
                        $nombre = $row['nombre'];?>
                        <option value="<?php echo utf8_encode($nombre); ?>"><?php echo utf8_encode($nombre); ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
             <?php if(!empty($error)): ?>
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
            
            <button type="submit">Agregar<label class="lnr lnr-chevron-right"></label></button>
        </form>
    </div>
    </article>
</section>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>
    <script src="js/fecha.js"></script>
    <script src="js/script.js"></script>
    

    
</body>
</html>