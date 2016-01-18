<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$usuario = new User();
$usuario->read();
$u = $usuario->getEmail();
$a = $usuario->getAlias();

//Subida de la imagen de perfil//
$MAX_SIZE = 100000000;
$tamano2 = $_FILES["archivo"]['size'];
$tipo2 = $_FILES["archivo"]['type'];
$archivo2 = $_FILES["archivo"]['name'];
if ($_FILES['archivo']['size'] <= $MAX_SIZE) {
    if ($_FILES['archivo']['name'] != NULL) {
        if ($_FILES['archivo']['type'] == "image/jpg"){
            $destino2 = "../images/profile/" . $a . ".jpg";
            move_uploaded_file($_FILES['archivo']['tmp_name'], $destino2);
            echo "<span><br>El archivo <b>" . $archivo2 . "</b> se ha subido correctamente</span> </br>";
        }elseif ($_FILES['archivo']['type'] == "image/png") {
            $destino2 = "../images/profile/" . $a . ".png";
            move_uploaded_file($_FILES['archivo']['tmp_name'], $destino2);
            echo "<span><br>El archivo <b>" . $archivo2 . "</b> se ha subido correctamente</span> </br>";
        }elseif ($_FILES['archivo']['type'] == "image/jpeg") {
            $destino2 = "../images/profile/" . $a . ".jpeg";
          move_uploaded_file($_FILES['archivo']['tmp_name'], $destino2);
            echo "<span><br>El archivo <b>" . $archivo2 . "</b> se ha subido correctamente</span> </br>";
        }
            
    }else{
            echo "Error al subir el archivo " . $archivo2 . "<br><b>" . " El archivo no es una imagen" . "</b>";
        }
}else {
    echo "Error al subir el archivo " . $archivo2 . "<br><b>" . " El archivo es demasiado pesado" . "</b>";
}
var_dump($usuario);
var_dump($u);
$usuario->setClave(sha1 ($usuario->getClave()));
$usuario->setImagen($destino2);
$r = $gestor->insert($usuario);
$bd->close();

//echo $r;
var_dump($bd->getError());
header("Location:../mailmio/enviar.php?op=insert&r=$r&u=$u");