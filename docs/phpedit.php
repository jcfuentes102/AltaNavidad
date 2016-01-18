<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$usuario = new User();
$usuario->read();
$emailoculto = Request::post("emailoculto");
$email = Request::post("emailinput");
$clave = Request::post("claveinput");
$alias = Request::post("aliasinput");
$fechaalta = Request::post("inputfechaalta");
$activo = Request::post("activoinput");
$personal = Request::post("inputpersonal");
$administrador = Request::post("inputadministrador");
$imagen = Request::post("inputimagen");

$usuario2 = new User($email, $clave, $alias, $fechaalta, $activo, $administrador, $personal, $imagen);
$r = $gestor->set($usuario2);
$bd->close();

header("Location:listausuario.php?op=edit&r=$r");