<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestorFB = new ManageUserFB($bd);
$uid = Request::get("UID");
if($f===null){
    $r = $gestorFB->delete($uid);
    echo "bien";
}else{
    echo "mal";
    $r = $gestorFB->forzarDelete($uid);
}

$bd->close();
header("Location:listausuario.php?op=delete&r=$r");