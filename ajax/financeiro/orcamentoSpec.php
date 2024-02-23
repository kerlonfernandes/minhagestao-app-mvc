<?php

session_start();

use Midspace\Database;

require_once('../../_app/config.php');
require_once('../../model/Database.php');

if (isset($_SESSION['id_user'])) {
    $id = $_SESSION['id_user'];
}

$orcamento_spec = "";

if (isset($_GET['orcamento_spec'])) {
    $orcamento_spec = $_GET['orcamento_spec'];
}

$query = new Database(MYSQL_CONFIG);
$result = $query->execute_query(
    "SELECT * FROM orcamentos WHERE id_usuario = :id AND orcamento_code = :orcamento_code",
    [':id' => $id, ":orcamento_code" => $orcamento_spec]
);

if ($result->status === 'error') {
    echo "Erro na consulta SQL: " . $result->error_message;
} else {
    if (!empty($result->results)) {
        $orcamento = $result->results[0];
    } else {
        echo "Nenhum resultado encontrado.";
    }
}
echo $orcamento->valor_orcamento;
?>
