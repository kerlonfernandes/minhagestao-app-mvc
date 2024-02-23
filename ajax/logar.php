<?php
session_start();

use Midspace\Database;
use HelpersClass\SupAid;

require_once('../config/config.php');
require_once('../models/Database.php');
require_once("../src/app/SupAid.php");

$user = new SupAid();

if (isset($_POST['login']) && isset($_POST['senha'])) {
    $email = $_POST['login'];
    $senha = $_POST['senha'];

    $query = new Database(MYSQL_CONFIG);

    $result = $query->execute_query(
        "SELECT usuarios.*, admin.is_admin
        -- pagamento_status.status_pagamento 
        FROM usuarios 
        LEFT JOIN admin ON usuarios.id = admin.id_usuario 
        -- LEFT JOIN pagamento_status ON usuarios.id = pagamento_status.id_usuario 
        WHERE usuarios.email = :email",
        ["email" => $email]
    );

    if (!empty($result->results) && password_verify($senha, $result->results[0]->senha)) {
        $response = $result->results[0]; 
        $_SESSION['user'] = $response->nome;
        $_SESSION['id_user'] = $response->id;
        $_SESSION['key_user'] = $response->key_user;
        $_SESSION['status'] = $response->status;
        // $_SESSION['status_pagamento'] = $response->status_pagamento;
        if($response->is_admin == 1) {
            $_SESSION['is_admin'] = true;
        }
        else {
            $_SESSION['is_admin'] = false;
        }
            $dados = array(
            "id" => $response->id,
            "nome" => $response->nome,
            "key_user" => $response->key_user
        );

        header('Location: ./');

        echo json_encode($dados);
    } else {
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(["error" => "Erro ao fazer login"]);
    }
} else {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(["error" => "Login e senha devem ser fornecidos"]);
}
