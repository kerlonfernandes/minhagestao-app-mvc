<?php
use Midspace\Database; 
require_once('../../config/config.php');
require_once('../../models/Database.php');


    if (isset($_POST['client_id'])) {
    $id = $_POST['client_id'];
   
    $database = new Database(MYSQL_CONFIG);

    $result1 = $database->execute_non_query('DELETE FROM agenda WHERE id_cliente = :id', [":id" => $id]);
    $result2 = $database->execute_non_query('DELETE FROM clientes WHERE id = :id', [":id" => $id]);

    if($result1->status && $result2->status == "success") {
        $errors["status"] = "success";
        $errors["msg"] = "Cliente de ID:<strong>$id</strong> foi Deletado com sucesso!";
    }
    else {
        $errors["status"] = "error";
        $errors["msg"] = "Ocorreu um erro ao deletar cliente :(";

    }

    echo json_encode($errors);
    }
    