<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$email = Request::get("email");
$f = Request::get("f");
if($f===null){
    $r = $gestor->delete($email); 
}else{
    $r = $gestor->forzarDelete($email);
}

$bd->close();
header("Location:listausuario.php?op=delete&r=$r");