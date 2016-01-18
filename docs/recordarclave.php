<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$usuario = new User();
$usuario->read();
$usuarios = $gestor->getList();
$email = $_GET['email2'];

        foreach ($usuarios as $indice => $usuario) {
            if ($usuario->getEmail()===$email){
                echo "usuario encontrado";
                $activo = $usuario->setActivo("0");
                $r = $gestor->set($usuario, $activo);
                $u = $usuario->getEmail();
            }else{
                echo "los usuarios no ocinciden";
            }
        }
$bd->close();

//echo $r;
//var_dump($bd->getError());
header("Location:../mailmio/enviar2.php?op=insert&r=$r&u=$u");