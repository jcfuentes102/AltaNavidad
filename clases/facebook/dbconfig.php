<?php
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'jcfuentes102');    // DB username
define('DB_PASSWORD', '');    // DB password
define('DB_DATABASE', 'altanavidad');      // DB name
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
$database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");
?>