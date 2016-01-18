<?php
session_start();
require '../clases/Request.php';
require '../clases/Constant.php';
$op = Request::get("op");
$r = Request::get("r");
$u = Request::get("u");
$enlacecompleto = "https://altanavidad-jcfuentes102.c9users.io/docs/activar.php?op=insert&r=$r&u=$u";
$uc=sha1($u.Constant::SEMILLA);
$rc=sha1($r.Constant::SEMILLA);
$enlacecifrado = "https://altanavidad-jcfuentes102.c9users.io/docs/activar.php?op=insert&rc=$rc&uc=$uc&r=$r";

$origen="da15.fuentescarretero@gmail.com";
$alias="Equipo Art of Architecture";
//$destino="iffritfc92@gmail.com";
$destino=$u;

$asunto="Activación cuenta";
$mensajegenerico= "Para activar su cuenta pinche en el siguiente enlace:";

$mensaje= "Para activar su cuenta pinche en el siguiente enlace:  " . $enlacecifrado;

require_once '../clases/Google/autoload.php';
require_once '../clases/class.phpmailer.php';  //las últimas versiones también vienen con autoload
$cliente = new Google_Client();

$cliente->setApplicationName('ProyectoEnviarCorreoDesdeGmail');
$cliente->setClientId('651943431283-lc34dc9olo5omqi3iahge0nragdsashh.apps.googleusercontent.com');
$cliente->setClientSecret('_5IGFSne6TYKlDbKyXyoNhio');
$cliente->setRedirectUri('https://ide.c9.io/jcfuentes102/altanavidad/oauth/guardar.php');
$cliente->setScopes('https://www.googleapis.com/auth/gmail.compose');

$cliente->setAccessToken(file_get_contents('token.conf'));

if ($cliente->getAccessToken()) {
    $service = new Google_Service_Gmail($cliente);
    try {
        $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
        $mail->From = $origen;
        $mail->FromName = $alias;
        $mail->AddAddress($destino);
        $mail->AddReplyTo($origen, $alias);
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;
        $mail->preSend();
        $mime = $mail->getSentMIMEMessage();
        $mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');
        $mensaje = new Google_Service_Gmail_Message();
        $mensaje->setRaw($mime);
        $service->users_messages->send('me', $mensaje);
        echo ("Todo correcto");
    } catch (Exception $e) {
        echo("Fallo correo:" . $e->getMessage());
    }
} else {
    echo ("Fallo google");
}
    header("Location:../docs/correoenviado.php?op=insert&r=$r&u=$u");
?>