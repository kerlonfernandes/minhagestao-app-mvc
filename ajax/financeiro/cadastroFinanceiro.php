<?php
session_start();


use Midspace\Database; 

require_once('../../config/config.php');
require_once('../../models/Database.php');
require_once('../../src/app/SupAid.php');

if (isset($_SESSION['id_user'])) {
    $id = $_SESSION['id_user'];
}

$errors = array();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];
    $data = $_POST['dataReg'];


    $query = new Database(MYSQL_CONFIG);
    $result = $query->execute_non_query(
        "INSERT INTO gestao_financeira (id_usuario, tipo, valor, descricao, categoria, data_cadastro, hora_cadastro, data_registro, hora_registro) VALUES (:id_usuario, :tipo, :valor, :descricao, :categoria, :data_cad, CURTIME(), CURDATE(), CURTIME())",
        [
            ":id_usuario" => $id,
            ":tipo" => $tipo,
            ":valor" => $valor,
            ":descricao" => $descricao,
            ":categoria" => $categoria,
            "data_cad" => $data
        ]
    );

    if($result->status == "success") {
        $errors["status"] = "success";
        $errors["msg"] = "<strong>$tipo</strong> registrada com sucesso!";
    }
    else {
        $errors["status"] = "error";
        $errors["msg"] = "Ocorreu um erro ao registrar $tipo :(";

    }

    echo json_encode($errors);
}


?>
