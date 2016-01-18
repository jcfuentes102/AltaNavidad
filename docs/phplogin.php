<?php
session_start(); 
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$usuarios = $gestor->getList();
 
$user = Request::post("iemail");
$password = Request::post("ipassword");

foreach ($usuarios as $indice => $usuario) {
 if($usuario->getEmail()===$user && $usuario->getClave()===sha1($password)){
     $control = "bien";
     $alias = $usuario->getAlias();
     $fechaalta = $usuario->getFechaalta();
     $activo = $usuario->getActivo();
     $personal = $usuario->getPersonal();
     $administrador = $usuario->getAdministrador();
     $imagen = $usuario->getImagen();
     
     $_SESSION["email_usuario"] = $user;
	    $_SESSION["clave_usuario"] = sha1($password);
	    $_SESSION["alias_usuario"] = $alias;
	    $_SESSION["fechaalta_usuario"] = $fechaalta;
	    $_SESSION["activo_usuario"] = $activo;
	    $_SESSION["personal_usuario"] = $personal;
	    $_SESSION["administrador_usuario"] = $administrador;
	    $_SESSION["imagen_usuario"] = $imagen;
	    header("Location: user.php");

 }else{
     header("Location:../index.php?m=300");
 }
}

// if($control="bien"){
//      $_SESSION["email_usuario"] = $user;
// 	    $_SESSION["clave_usuario"] = sha1($password);
// 	    $_SESSION["alias"] = $alias;
// 	    $_SESSION["fechaalta_usuario"] = $fechaalta;
// 	    $_SESSION["activo"] = $activo;
// 	    $_SESSION["personal_usuario"] = $personal;
// 	    $_SESSION["administrador_usuario"] = $administrador;
// 	    $_SESSION["imagen_usuario"] = $imagen;
// 	    header("Location: activado.php");
//    }else{
//      echo "mal";
//      header("Location: error.php?m=300");
//  }
 
     echo $_SESSION["email_usuario"];
   $bd->close();
 
