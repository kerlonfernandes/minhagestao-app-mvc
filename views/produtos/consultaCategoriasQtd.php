<?php
session_start();
use Midspace\Database;
$user_id = $_SESSION['id_user'];


require_once('../../config/config.php');
require_once('../../models/Database.php');

$query = new Database(MYSQL_CONFIG);

$res = $query->execute_query("SELECT * FROM categorias WHERE id_usuario = :id_user", ["id_user" => $user_id]);


echo $res->affected_rows;

?>
