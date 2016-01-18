<?php 
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$usuarios = $gestor->getList();
$op = Request::get("op");
$r = Request::get("r");
$uc = Request::get("uc");

        foreach ($usuarios as $indice => $usuario) {
            if (sha1($usuario->getEmail().Constant::SEMILLA)==$uc){
                $a = $usuario->getAlias();
                $u = $usuario->getEmail();
        }
        }
?>
<!doctype html>
<html lang="es">
<head>
    <title>New Password</title>
    <meta charset="UTF-8">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="651943431283-tb9q600cd4v5b8dotsqkdv1gvcmnmab6.apps.googleusercontent.com">
    <link rel="stylesheet" type="text/css" href="../css/estilosAltaNavidad.css">
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
</head> 
<body>
    <div id="cont">
        <div id="header"><span class="title"><b>A</b>rt of <b>A</b>rchitecture</span><span class="enlaces"><a href="../index.php"><b class="selected">Register</b></a><a href="../docs/listausuario.php">About Us - lista usuarios -</a><a href="../../index.html">Home</a></span></div>

<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->
<br>
       <?php
       echo "<h1 class='enlace'>Nueva clave para el usuario:   ".$a."</h1>";
        ?>
        <form name="login-form" class="login-form" action="cambiarclave.php" method="POST">

	<!--HEADER-->
    <div class="header">
    <!--TITLE--><h1>New Password</h1><!--END TITLE-->
    <!--DESCRIPTION--><span>Contact with Carmelo to PASS.</span><!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
    <!--EMAIL OCULTO--><input hidden name="emailoculto" type="text" value="<?php echo $u; ?>" /><!--END EMAIL OCULTO-->
    <!--PASSWORD--><input name="ClaveNueva" placeholder="Password" type="password" class="input password" value="" onfocus="this.value=''" /><!--END PASSWORD-->
    <!--PASSWORD--><input name="ClaveNueva2" placeholder="Repeat password" type="password" class="input password" value="" onfocus="this.value=''" /><br><br><!--END PASSWORD-->
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer">
    <!--REGISTER BUTTON--><input type="submit" name="submit" class="button" value="Change password" /><!--END REGISTER BUTTON-->
    </div>
    <!--END FOOTER-->

</form>
        
        </div>

     <div id="footer">
          <a href="contact.html">Contact</a>
          <a href="about.html">About</a>
          <a href="#">Advertise</a>
          <a href="#">Guest Posting</a>
          <a href="#">License</a>
          <a href="#">Shop</a>
          <a href="#">Jobs</a>
          <a href="#">Subscribe</a>
        </div>

    </div>
</body>
</html>
<?php
$bd->close();