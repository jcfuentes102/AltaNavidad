<?php
session_start(); 
require '../clases/AutoCarga.php';
?>
<!DOCTYPE html>
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
                <a href="#"><b class="selected">Profile</b></a>
                <a href="about.html">About Us</a>
                <a href="quentin.html">Quentin</a>
                <a href="david.html">David</a>
                <a href="../index.html">Home</a>
        </span>
        </div><?php echo "<div class='imgcontent imgcontentposicion' style='background-image:url(" .  $_SESSION["imagen_usuario"] .  ")'></div>";?>
<div id="wrapper">
      
       <h1 class="enlace"><?php echo $_SESSION["alias_usuario"];?></h1>
       <h5 class="enlace">User since: <?php echo $_SESSION["fechaalta_usuario"];?></h5><br><br>
        <form id="formedit" action="phpedit.php" method="POST" class="enlace">
            Email: <input  type="email" name="emailinput" class="input2 username" value="<?php echo $_SESSION["email_usuario"];?>" /><br /><br />
            Pass: <input  type="password" name="claveinput" class="input2 password" value="<?php echo $_SESSION["clave_usuario"];?>" /><br /><br />
            Nick: <input  type="text" name="aliasinput" class="input2 username" value="<?php echo $_SESSION["alias_usuario"];?>" /><br /><br />
            
            Active:
            <input  type="radio" name="activoinput" value="1" />Sí
            <input  type="radio" name="activoinput" value="0" />No ( Now = <?php echo $_SESSION["activo_usuario"];?> )<br /><br />
            
            
            <?php if($_SESSION["personal_usuario"]==1 or $_SESSION["administrador_usuario"]==1){
                           echo "Personal:";
                           echo "<input  type='radio' name='inputpersonal' value='1' />Sí";
                           echo "<input  type='radio' name='inputpersonal' value='0' />No ( Now =";  echo $_SESSION['personal_usuario']; echo ")<br /><br />";
            }?>

            
            <?php if($_SESSION["administrador_usuario"]==1){
                           echo "Administrador:";
                           echo "<input  type='radio' name='inputadministrador' value='1' />Sí";
                           echo "<input  type='radio' name='inputadministrador' value='0' />No ( Now =";  echo $_SESSION['administrador_usuario']; echo ")<br /><br />";
            }?>
            
            <span>(  1 = ACTIVE - 0 = DISABLE )</span><br><br><br>
            <input type="date" name="inputfechaalta" value="<?php echo $_SESSION["fechaalta_usuario"]; ?>" hidden/>
            <input type="text" name="inputimagen" value="<?php echo $_SESSION["imagen_usuario"]; ?>" hidden/>
</div>
<div id="enlacesedit">
            <div class="fileUpload btn btn-warning">
                <span>Change Image</span>
                <input name="archivo" type="file" placeholder="imagen" class="input username upload" value="" onfocus="this.value=''" />
            </div>
            <button type="submit" class="btn btn-success">Save Changes</button>
            <?php echo "<a class='enlace borrar' style='padding:10px;' href='phpdelete.php?email={$_SESSION['email_usuario']}'><button type='button' class='btn btn-danger'>Delete profile</button></a> ";?>
            <input type="text" hidden name="pkCode" value="<?php echo $_SESSION["email_usuario"];?>" />
        </form>
       <a href="../index.php"<button type="button" class="btn btn-primary">Cancel</button></a>
       <?php if($_SESSION["personal_usuario"]==1 or $_SESSION["administrador_usuario"]==1){
           echo "<a href='listausuario.php'<button type='button' class='btn btn-primary'>Admin user list</button></a>";
       }?>
</div>
    </div>
    </body>
</html>