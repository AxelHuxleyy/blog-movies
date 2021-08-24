<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recuperar contraseña</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    
    <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    
<div class="container-form">
        <div class="header">
            <div class="logo-title">
                <img src="image/logo_magtimus.png" alt="">
                <h2>Magtimus</h2>
            </div>
            <div class="menu">
                <a href="recuperarcontra.php"><li class="module-login active">Restablecer</li></a>
                
            </div>
        </div>
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
            <div class="welcome-form"><h1>Restablecer contraseña</h1></div>
            <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="Nombre Usuario" name="usuario">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Nueva Contraseña" name="nueva">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Repetir contraseña" name="nueva2">
            </div>
            <div class="key line-input">
                <label class="lnr lnr-enter-down"></label>
                <input type="password" placeholder="key" name="key">
            </div>
            
             <?php if(!empty($error)): ?>
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
            
            <button type="submit">Actualizar<label class="lnr lnr-chevron-right"></label></button>
        </form>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
</body>
</html>