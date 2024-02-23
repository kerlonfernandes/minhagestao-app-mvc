<?php 


session_start();

use Midspace\Database; 
require_once('../../config/config.php');
require_once('../../models/Database.php');



if(isset($_SESSION['id_user'])) {

    $id = $_SESSION['id_user'];

}


$query = new Database(MYSQL_CONFIG);
$result = $query->execute_query("SELECT
SUM(CASE WHEN tipo = 'Entrada' THEN valor ELSE 0 END) AS soma_entradas,
SUM(CASE WHEN tipo = 'Saída' THEN valor ELSE 0 END) AS soma_saidas
FROM
gestao_financeira
WHERE
id_usuario = :id;
", ['id' => $id]);

$resultado = $result->results;

// Calcula o total subtraindo o valor das saídas do valor das entradas
$total = $resultado[0]->soma_entradas - $resultado[0]->soma_saidas;

// Criar um array associativo para retornar os resultados em formato JSON
$response = array(
    "soma_entradas" => $resultado[0]->soma_entradas,
    "soma_saidas" => $resultado[0]->soma_saidas,
    "total" => $total  // Adiciona o valor calculado como "Total"
);

// Definir o cabeçalho como JSON
header('Content-Type: application/json');

// Retornar os resultados como JSON
echo json_encode($response);
 
?>


