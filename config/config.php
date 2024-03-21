<?php

define("CONFIGURATION_DIRECTORY", __DIR__);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$hostname = "localhost";
$username_database = "root";
$password = '';
$database = 'mg_db';

//MYSQL configurations 
define('MYSQL_CONFIG', [
    'host' => 'localhost',
    'database' => 'mg_db',
    'username' => 'root',
    'password' => '',
]);

// EMAIL config
define('MAILUSER', 'batatrap@gmail.com');
define('MAILPASS', '');
define('MAILPORT', '465');
define('MAILHOST', 'mail..esp.br');
define('FROM_NAME', ''); // Quem envia 
define('FROM_EMAIL', '@..br');

function printData($data, $die = true) {

    echo "<pre>";
    if(is_object($data) || is_array($data)) {
        print_r($data);
    }
    else {
        die(PHP_EOL . "END" . PHP_EOL);
    }

} 

$BASE_URL = "https://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . "?") . "/";




define("SITE", "https://" . $_SERVER['SERVER_NAME'] . "/minhagestao");
