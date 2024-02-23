<?php
session_start();
use Midspace\Database;
$user_id = $_SESSION['id_user'];



require_once('../../config/config.php');
require_once('../../models/Database.php');

$query = new Database(MYSQL_CONFIG);

$res = $query->execute_query("SELECT COUNT(*) as quantidade_produtos FROM produtos WHERE id_usuario = :id_user", ["id_user" => $user_id]);

echo $res->results[0]->quantidade_produtos; // Corrigido para "quantidade_produtos"
?>
