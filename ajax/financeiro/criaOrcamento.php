<?php
session_start();

use Midspace\Database; 
require_once('../../_app/config.php');
require_once('../../model/Database.php');



if (isset($_SESSION['id_user'])) {
    $id = $_SESSION['id_user'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo_orcamento = $_POST['titulo_orcamento'];
    $descricao = $_POST['descricao'];
    $valor_orcamento = $_POST['valor_orcamento'];


    $query = new Database(MYSQL_CONFIG);
    $result = $query->execute_non_query(
        "INSERT INTO orcamentos (id_usuario, titulo_orcamento, descricao, valor_orcamento, orcamento_code, data_registro, hora_registro) VALUES (:id_usuario, :titulo_orcamento, :descricao, :valor_orcamento, :orcamento_code, CURDATE(), CURTIME())",
        [
            ":id_usuario" => $id,
            ":titulo_orcamento" => $titulo_orcamento,
            ":descricao" => $descricao,
            ":valor_orcamento" => $valor_orcamento,
            ":orcamento_code" => $_POST['codigo_orcamento']
        ]
    );

    if ($result->status === 'success') {
        $_SESSION['msg_success'] = true; // Inserção bem-sucedida
    } else {
        $_SESSION['msg_success'] = false; // Inserção falhou
    }
}
?>
