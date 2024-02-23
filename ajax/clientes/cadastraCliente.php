<?php
session_start();

use Midspace\Database;
use HelpersClass\SupAid;
 
require_once('../../config/config.php');
require_once('../../models/Database.php');
require_once('../../src/app/SupAid.php');

$helper = new SupAid();
$errors = array();


$current_date = $helper->getCurrentDate();
$current_time = $helper->getCurrentTime();

if(isset($_SESSION['id_user'])) {
    $id = $_SESSION['id_user'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cep = $_POST['cep'];
    $logadouro = $_POST['logadouro'];
    $bairro = $_POST['bairro'];
    $localidade = $_POST['localidade'];
    $uf = $_POST['uf'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    
    $database = new Database(MYSQL_CONFIG);
    $result = $database->execute_non_query("INSERT INTO `clientes`(`id_usuario`, `nome`, `cpf`, `endereco`, `email`, `telefone`, `cep`, `logadouro`, `bairro`, `localidade`, `uf`, `hora`, `data_cadastro`) VALUES (:id_usuario, :nome, :cpf, :endereco, :email, :telefone, :cep, :logadouro, :bairro, :localidade, :uf, :current_time, :current_date)", 
    [
        ":id_usuario" => $id,
        ":nome" => $nome,
        ":cpf" => $cpf,
        ":endereco" => $endereco,
        ":email" => $email,
        ":telefone" => $telefone,
        ":cep" => $cep,
        ":logadouro" => $logadouro,
        ":bairro" => $bairro,
        ":localidade" => $localidade,
        ":uf" => $uf,
        ":current_time" => $current_time,
        ":current_date" => $current_date
    ]);
    if($result->status == "success") {
        $errors["status"] = "success";
        $errors["msg"] = "<strong>$nome</strong> cadastrado com sucesso!";
    }
    else {
        $errors["status"] = "error";
        $errors["msg"] = "Ocorreu um erro ao cadastrar cliente :(";

    }

    echo json_encode($errors);
}


?>
