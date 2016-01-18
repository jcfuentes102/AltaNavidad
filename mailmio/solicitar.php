<?php
session_start();
require_once '../clases/Google/autoload.php';
$cliente = new Google_Client();

$cliente->setApplicationName('ProyectoEnviarCorreoDesdeGmail');
$cliente->setClientId('651943431283-lc34dc9olo5omqi3iahge0nragdsashh.apps.googleusercontent.com');
$cliente->setClientSecret('_5IGFSne6TYKlDbKyXyoNhio');
$cliente->setRedirectUri('https://pruebacorreo-jcfuentes102.c9users.io/introbd/mailmio/guardar.php');
$cliente->setScopes('https://www.googleapis.com/auth/gmail.compose');

$cliente->setAccessType('offline');
if (!$cliente->getAccessToken()) {

   $auth = $cliente->createAuthUrl(); //solicitud

   header("Location: $auth");

}