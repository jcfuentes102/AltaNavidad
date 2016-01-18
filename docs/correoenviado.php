<?php 
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$usuarios = $gestor->getList();
$op = Request::get("op");
$r = Request::get("r");
$u = Request::get("u");
    //var_dump($bd->getError());
    //echo $r = Request::get("r");
?>
<!doctype html>
<html lang="es">
<head>
    <title></title>
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
       echo "<h1 class='enlace'>Se ha enviado un correo de activación al email:   ".$u."</h1>";
        ?>
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