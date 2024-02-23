<?php

session_start();

require_once('../../config/config.php');
require_once('../../models/Database.php');

$dados = $_POST['dados'];

// Convertendo a string JSON de volta para uma lista/array
$lista = json_decode($dados);

// Transformando a lista/array em uma string
$stringDados = implode(', ', $lista);

print_r($stringDados);
// $dados = selectCliente($conn, $_SESSION['id_user'] );

$query = new Midspace\Database(MYSQL_CONFIG);


?>

