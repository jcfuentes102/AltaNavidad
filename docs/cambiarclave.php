<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$usuario = new User();
$usuario->read();
$usuarios = $gestor->getList();
$email = $_POST['emailoculto'];
$clave1 = $_POST['ClaveNueva'];
$clave2 = $_POST['ClaveNueva2'];

        foreach ($usuarios as $indice => $usuario) {
            if ($usuario->getEmail()===$email){
                if ($clave1===$clave2){
                    $activo = $usuario->setActivo("1");
                    $clave = $usuario->setClave(sha1($clave1));
                    $r = $gestor->set($usuario, $activo);
                    $r2 = $gestor->set($usuario, $clave);
                    $u = $usuario->getEmail();
                    $a = $usuario->getAlias();
                    $bd->close();
                    header("Location:activado.php?op=insert&r=$r&r2=$r2&a=$a");
            }else{
                $bd->close();
                header("Location:error.php?m=100");
            }
        }
        }
//echo $r;
//var_dump($bd->getError());
