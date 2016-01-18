<?php 
session_start();  
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$usuarios = $gestor->getList();
$gestorFB = new ManageUserFB($bd);
$usuariosFB = $gestorFB->getList();
$op = Request::get("op");
$r = Request::get("r");
?>
<!doctype html>
<html lang="es">
<head>
    <title>Lista de Usuarios</title>
    <meta charset="UTF-8">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="651943431283-tb9q600cd4v5b8dotsqkdv1gvcmnmab6.apps.googleusercontent.com">
    <link rel="stylesheet" type="text/css" href="../css/estilosAltaNavidad.css">
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../js/scripts.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
</head> 
<body>
    <div id="cont">
        <div id="header"><span class="title"><b>A</b>rt of <b>A</b>rchitecture</span>
            <span class="enlaces">
                <a href="user.php"><b class="selected">Profile</b></a>
                <a href="about.html">About Us</a>
                <a href="quentin.html">Quentin</a>
                <a href="david.html">David</a>
                <a href="../index.html">Home</a>
            </span>
        </div>
<!--END WRAPPER-->
<?php if (empty($_SESSION["email_usuario"])){?>
        echo "Hellouuu";
<?php }else{ ?>
            <div class="container" style="position:relative; bottom:790px;">
            	<a href="docs/user.php"><?php echo "<div class='imgcontent' style='width:75px; height:75px; position:relative; top:15px; left:15px; background-image:url(" .  $_SESSION["imagen_usuario"] .  ")'></div>";?></a>
                <br><br><span class="enlace" style="position:relative; bottom:90px; left:125px; font-size:2em;"><?php echo $_SESSION["alias_usuario"];?> </span><br>
                <a href="docs/phplogout.php" style="position:relative; bottom:90px; left:125px;" class="enlace">LOGOUT</a>
            </div>
            <?php } ?>
<!--GRADIENT--><div class="gradient2"><!--END GRADIENT-->
<br><h1 class='enlace'>Lista de usuarios</h1><br>
       <?php
    //           if($op!=null){
    //         echo "<h1>La operación $op ha dado como resultado $r</h1>";
    //     }
        foreach ($usuarios as $indice => $usuario) {
            if ($usuario->getActivo()==='1'){
                echo "<img class='profileimg' src='"; echo $usuario->getImagen(); echo "'>"; echo "&nbsp; &nbsp; &nbsp; &nbsp;";
                echo "<span style='color:green;'>"; echo $usuario->getAlias(); echo "</span>";
                //echo "<a class='enlace' style='padding:10px;' href='phpdelete.php?email={$usuario->getEmail()}'>borrar</a> ";
                echo "<a class='enlace' href='viewedit.php?email={$usuario->getEmail()}'> Edit</a>";
                echo "<br><br>";
            }
            else{
                echo "<img class='profileimg' src='"; echo $usuario->getImagen(); echo "'>"; echo "&nbsp; &nbsp; &nbsp; &nbsp;";
                echo "<span style='color:brown;'>"; echo $usuario->getAlias(); echo "</span>";
                //echo "<a class='enlace borrar' style='padding:10px;' href='phpdelete.php?email={$usuario->getEmail()}'>borrar</a> ";
                echo "<a class='enlace' href='viewedit.php?email={$usuario->getEmail()}'> Edit </a>";
                echo "<br><br>";
            }
        }?>
        <h1 class="enlace">Usuarios Facebook</h1>
        <?php
            foreach ($usuariosFB as $indice => $usuarioFB) {
                echo "<span style='color:blue;'>"; echo $usuarioFB->getFfname(); echo "</span>";
                //echo "<span style='color:blue;'>"; echo $usuarioFB->getFuid(); echo "</span>";
                echo "<a class='enlace borrar' style='padding:10px;' href='phpdeleteFB.php?UID={$usuarioFB->getUID()}'> Delete </a>";
                echo "<br><br>";
            }?>
        </div>
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