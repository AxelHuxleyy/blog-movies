<!DOCTYPE html>
<html lang="en">
    
   
<head>
    <title>Register</title>
     
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    
   
    
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Signika:400,600'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

      <link rel="stylesheet" href="css/style.css">
    
     <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="css/style4.css">
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
    <script src="js/mensajes.js"></script>   
    
</head>
    <body style="overflow-y:hidden">
<body>
   
   <header>
  <span class="menu"><i class="material-icons">menu</i></span>
    </header>
<section class="main">
   <?php include "menu.php"; ?>
      
   
  <article>
      
      
      <div class="container-form">
        <div class="header " style="background: #081624;">
            <div class="logo-title">
                <img src="image/logo.png" alt="">
            </div>
            <div class="menu">
                <a href="register.php"><li class="module-register active">agregar actor</li></a>
            </div>
        </div>
    <div class="scrolling">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form" enctype="multipart/form-data"autocomplete="off">

            
           
            
            <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <input type="text" id="nombre" placeholder="Nombre del actor" name="nombre" required>
            </div>
            
            <div class="mail line-input">
                <label class="lnr lnr-calendar-full"></label>
                <input type="date" id="nacimiento" placeholder="fecha de nacimiento" name="nacimiento" min="1950-01-01" max="2019-01-01" required>
            </div>

            <div class="password line-input">
                <label class="lnr lnr-text-align-left"></label>
                <textarea name="biografia" id="biografia" placeholder="Biografia"  required></textarea>
            </div>

            <div class="user line-input">
                <label class="lnr lnr-enter-down"></label>
                <input type="file" id="usuario" placeholder="archivo" id="imagen" name="imagen"  required>
            </div>
          
            <?php if(!empty($error)): ?>
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
            
            <button type="submit">Agregar actor<label class="lnr lnr-chevron-right"></label></button>
               
    </form>
        
        </div>
    </div>
      
      
  </article>
    </section>
   
   
     <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>
     
    
    
    <!--<script src="js/comprueba.js"></script>-->
    <script src="js/fecha.js"></script>       
    <script src="js/script.js"></script>
</body>
</html>