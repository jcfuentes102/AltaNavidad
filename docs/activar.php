<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$usuario = new User();
$usuario->read();
$usuarios = $gestor->getList();

$op = Request::get("op");
$r = Request::get("r");
$rc = Request::get("rc");
$uc = Request::get("uc");
        foreach ($usuarios as $indice => $usuario) {
            if (sha1($usuario->getEmail().Constant::SEMILLA)==$uc){
                $activo = $usuario->setActivo("1");
                $r = $gestor->set($usuario, $activo);
                $a = $usuario->getAlias();
            }
            else{
                echo "los usuarios no ocinciden";
            }
        }
$bd->close();

//echo $r;
//var_dump($bd->getError());
header("Location:activado.php?op=insert&r=$r&a=$a");