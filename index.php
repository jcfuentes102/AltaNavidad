<?php 
session_start(); 
require 'clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$m = Request::get("m");
?>
<!doctype html>
<html lang="es" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <title>Register Form</title>
    <meta charset="UTF-8">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="651943431283-tb9q600cd4v5b8dotsqkdv1gvcmnmab6.apps.googleusercontent.com">
    <link rel="stylesheet" type="text/css" href="css/estilosAltaNavidad.css">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});
</script>
</head> 
<body>
    <div id="cont">
        <div id="header"><span class="title"><b>A</b>rt of <b>A</b>rchitecture</span>
            <span class="enlaces">
                <a href="#"><b class="selected">Login</b></a>
                <a href="docs/about.html">About Us</a>
                <a href="docs/quentin.html">Quentin</a>
                <a href="docs/david.html">David</a>
                <a href="index.html">Home</a>
            </span>
        </div><div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->

<form name="login-form" class="login-form" action="docs/phpaltausuario.php" method="POST" enctype="multipart/form-data">

	<!--HEADER-->
    <div class="header">
    <!--TITLE--><h1>Login Form</h1><!--END TITLE-->
    <!--DESCRIPTION--><span>Contact with Carmelo to PASS.</span><!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
    <!--NAME--><input required name="email" type="email" placeholder="Email" class="input username" value="" onfocus="this.value=''" /><!--END NAME-->
    <!--PASSWORD--><input required name="clave" placeholder="Password" type="password" class="input password" value="" onfocus="this.value=''" /><!--END PASSWORD-->
    <!--PASSWORD--><input required name="password2" placeholder="Repeat password" type="password" class="input password" value="" onfocus="this.value=''" /><br><br><!--END PASSWORD-->
    <!--ALIAS--><input required name="alias" type="text" placeholder="Nick" class="input username" value="" onfocus="this.value=''" /><br><br><!--END Alias-->
    <!--FECHAALTA--><input name="fechaalta" id="fechainput" type="date" onfocus="this.value=''" value="" hidden /><!--END FECHAALTA-->
    <!--ACTIVO--><input name="activo" hidden type="text" class="input username" value="0" onfocus="this.value=''" /><!--END ACTIVO-->
    <!--ADMINISTRADOR--><input name="administrador" type="text" hidden class="input username" value="0" onfocus="this.value=''" /><!--END ADMINISTRADOR-->
    <!--PERSONAL--><input name="personal" hidden type="text" class="input username" value="0" onfocus="this.value=''" /><!--END PERSONAL-->
    <!--IMAGEN-->
                    <div class="fileUpload btn btn-warning">
                      <span>Profile Image</span>
                      <input required name="archivo" type="file" placeholder="imagen" class="input username upload" value="" onfocus="this.value=''" />
                    </div>
    <!--END IMAGEN-->
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer">
    <!--REGISTER BUTTON--><input type="submit" name="submit" class="button" value="Register" /><!--END REGISTER BUTTON-->
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->
<!-- botton google+ estilo1    <div class="g-signin2" data-onsuccess="onSignIn"></div> -->

<div id="my-signin2" style="position:relative; top:20px;"></div>
  <script>
    function onSuccess(googleUser) {
      console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
    }
    function onFailure(error) {
      console.log(error);
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'https://www.googleapis.com/auth/plus.login',
        'width': 200,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
  </script>
  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
  <!--<a href="#" class="enlace" onclick="signOut();" style="position:relative; top:20px;">Cerrar Sesión</a>-->
  <a href="clases/facebook/fbconfig.php"><img src="images/facebook.png" class="fbimagen"></a></div>
</div>
<!--END WRAPPER-->
<!--Star SIGIN GOOGLE+-->
        <script type="text/javascript">
            function onSignIn(googleUser) {
              var profile = googleUser.getBasicProfile();
              console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
              console.log('Name: ' + profile.getName());
              console.log('Image URL: ' + profile.getImageUrl());
              console.log('Email: ' + profile.getEmail());
              // The ID token you need to pass to your backend:
                 var id_token = googleUser.getAuthResponse().id_token;
                 console.log("ID Token: " + id_token);
                 var xhr = new XMLHttpRequest();
                 xhr.open('POST', 'https://altanavidad-jcfuentes102.c9users.io/altanavidad/mailmio/gettoken.php');
                 xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                 xhr.onload = function(){
                     console.log(xhr.responseText);
                 };
                 xhr.send('id_token=' + id_token);
            }
        </script>
        
        <script>
          function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
              console.log('User signed out.');
            });
          }
        </script>
        
<!--END SIGIN GOOGLE+-->

<!--START SIGIN FACEBOOK-->
<?php if ($_SESSION['FBID']): ?>      
<!--  Desoués de loguearte  -->
<div class="container" style="position:relative; bottom:790px;">
	<img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture" style="position:relative; top:15px; left:15px;">
    <span class="enlace" style="position:relative; bottom:10px; left:25px; font-size:2em;"><?php echo $_SESSION['FULLNAME']; ?> </span><br>
    <a href="clases/facebook/logout.php" class="enlace" style="position:relative; bottom:15px; left:85px;">Cerrar sesion</a>
</div>

<!-- Antes Del login Facebook --> 
<?php else: ?>     <!-- Before login -->
<div class="container">
           <!--Not Connected (mensaje informativo de que no estas logueado aun)-->
<div>
      <a href="clases/facebook/fbconfig.php"></a>
</div>       
<?php 
      //var_dump($_SESSION);
      if ( empty($_SESSION["email_usuario"])){
  ?>
      <form id="isesion" method="POST" action="docs/phplogin.php">
          <input type="email" name="iemail" id="iemail" class="input2" placeholder="Email">
          <input type="password" name="ipassword" id="ipassword" class="input2" placeholder="Password">
          <div class="fileUpload btn btn-warning" style="bottom:5px;">
            <span>Log In</span>
            <input name="isubmit" type="submit" class="input2 upload" value="" onfocus="this.value=''" />
          </div><br>
          <a id="forget" class="enlace" href="#">Have you forget yor password? Click here!</a><br>
                <?php if ($m==300){
        echo "<span style='color:brown;'>*The user does not exist or the password does not match</span>";
      }elseif($m==100){
        echo "<span style='color:brown;'>*The session have been closed</span>";
      }
      ?>
      </form>

      <form id="forgetform" style="visibility:hidden;" method="GET" action="docs/recordarclave.php">
            <input type="email" placeholder="Write your email" class="input2" name="email2">
            <div class="fileUpload btn btn-warning" style="bottom:5px;">
              <span>Rescue Account</span>
              <input name="isubmit2" type="submit" class="input2 upload" onfocus="this.value=''" />
            </div>
      </form>
      
        <?php 
            } else{
        ?> 
            <div class="container" style="position:relative; bottom:790px;">
            	<a href="docs/user.php"><?php echo "<div class='imgcontent' style='width:75px; height:75px; position:relative; top:15px; left:15px; background-image:url(" .  $_SESSION["imagen_usuario"] .  ")'></div>";?></a>
                <br><br><span class="enlace" style="position:relative; bottom:90px; left:125px; font-size:2em;"><?php echo $_SESSION["alias_usuario"];?> </span><br>
                <a href="docs/phplogout.php" style="position:relative; bottom:90px; left:125px;" class="enlace">LOGOUT</a>
            </div>
                
                <?php 
                    }
                ?>
	  </div>
      </div>
    <?php endif ?>
    
<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->
            
        </div>
     <div id="footer">
          <a href="#">Contact</a>
          <a href="#">About</a>
          <a href="#">Advertise</a>
          <a href="#">Guest Posting</a>
          <a href="#">License</a>
          <a href="#">Shop</a>
          <a href="#">Jobs</a>
          <a href="#">Subscribe</a>
    </div>
        <div id="map"></div>
    </div>
</body>
</html>
<?php
$bd->close();