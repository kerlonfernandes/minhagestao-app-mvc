<?php
session_start();

use Midspace\Database; 
require_once('../../config/config.php');
require_once('../../models/Database.php');
require_once('../../src/app/SupAid.php');
$errors = array();

$id = $_POST['valId'];
$tipo = $_POST['tipo']; 

$query = new Database(MYSQL_CONFIG);

$result = $query->execute_non_query("DELETE FROM gestao_financeira WHERE id = :id", ['id' => $id]);

if($result->status == "success") {
    $errors["status"] = "success";
    $errors["msg"] = $tipo == "Saída" ? "<strong style='color:green;'>Saída</strong> foi Deletado com sucesso!" : "<strong style='color:red;'>Entrada</strong> foi Deletado com sucesso!"; 
}
else {
    $errors["status"] = "error";
    $errors["msg"] = "Ocorreu um erro ao deletar registro :(";

}

echo json_encode($errors);

