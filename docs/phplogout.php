<?php
  session_start();
  echo "holi";
  var_dump($_SESSION);
    unset($_SESSION["email_usuario"]);
	unset($_SESSION["clave_usuario"]);
    unset($_SESSION["alias"]);
	unset($_SESSION["fechaalta_usuario"]);
	unset($_SESSION["activo"]);
	unset($_SESSION["personal_usuario"]);
	unset($_SESSION["administrador_usuario"]);
	unset($_SESSION["imagen_usuario"]);
	var_dump($_SESSION);
  session_destroy();
  echo "holi";
  header("Location:../index.php?m=100");
  exit;