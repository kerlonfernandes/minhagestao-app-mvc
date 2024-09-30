<?php 
session_start();

use Midspace\Database; 

require_once('../../config/config.php');
require_once('../../models/Database.php');
require_once('../../src/app/SupAid.php');

if(isset($_SESSION['id_user'])) {

    $id = $_SESSION['id_user'];

}


$query = new Database(MYSQL_CONFIG);
$result = $query->execute_query("SELECT
id_usuario,
SUM(CASE WHEN tipo = 'Entrada' AND MONTH(data_cadastro) = 1 THEN valor ELSE 0 END) AS Jan_Entrada,
SUM(CASE WHEN tipo = 'Entrada' AND MONTH(data_cadastro) = 2 THEN valor ELSE 0 END) AS Fev_Entrada,
SUM(CASE WHEN tipo = 'Entrada' AND MONTH(data_cadastro) = 3 THEN valor ELSE 0 END) AS Mar_Entrada,
SUM(CASE WHEN tipo = 'Entrada' AND MONTH(data_cadastro) = 4 THEN valor ELSE 0 END) AS Abr_Entrada,
SUM(CASE WHEN tipo = 'Entrada' AND MONTH(data_cadastro) = 5 THEN valor ELSE 0 END) AS Mai_Entrada,
SUM(CASE WHEN tipo = 'Entrada' AND MONTH(data_cadastro) = 6 THEN valor ELSE 0 END) AS Jun_Entrada,
SUM(CASE WHEN tipo = 'Entrada' AND MONTH(data_cadastro) = 7 THEN valor ELSE 0 END) AS Jul_Entrada,
SUM(CASE WHEN tipo = 'Entrada' AND MONTH(data_cadastro) = 8 THEN valor ELSE 0 END) AS Ago_Entrada,
SUM(CASE WHEN tipo = 'Entrada' AND MONTH(data_cadastro) = 9 THEN valor ELSE 0 END) AS Set_Entrada,
SUM(CASE WHEN tipo = 'Entrada' AND MONTH(data_cadastro) = 10 THEN valor ELSE 0 END) AS Out_Entrada,
SUM(CASE WHEN tipo = 'Entrada' AND MONTH(data_cadastro) = 11 THEN valor ELSE 0 END) AS Nov_Entrada,
SUM(CASE WHEN tipo = 'Entrada' AND MONTH(data_cadastro) = 12 THEN valor ELSE 0 END) AS Dez_Entrada,
SUM(CASE WHEN tipo = 'Saída' AND MONTH(data_cadastro) = 1 THEN valor ELSE 0 END) AS Jan_Saida,
SUM(CASE WHEN tipo = 'Saída' AND MONTH(data_cadastro) = 2 THEN valor ELSE 0 END) AS Fev_Saida,
SUM(CASE WHEN tipo = 'Saída' AND MONTH(data_cadastro) = 3 THEN valor ELSE 0 END) AS Mar_Saida,
SUM(CASE WHEN tipo = 'Saída' AND MONTH(data_cadastro) = 4 THEN valor ELSE 0 END) AS Abr_Saida,
SUM(CASE WHEN tipo = 'Saída' AND MONTH(data_cadastro) = 5 THEN valor ELSE 0 END) AS Mai_Saida,
SUM(CASE WHEN tipo = 'Saída' AND MONTH(data_cadastro) = 6 THEN valor ELSE 0 END) AS Jun_Saida,
SUM(CASE WHEN tipo = 'Saída' AND MONTH(data_cadastro) = 7 THEN valor ELSE 0 END) AS Jul_Saida,
SUM(CASE WHEN tipo = 'Saída' AND MONTH(data_cadastro) = 8 THEN valor ELSE 0 END) AS Ago_Saida,
SUM(CASE WHEN tipo = 'Saída' AND MONTH(data_cadastro) = 9 THEN valor ELSE 0 END) AS Set_Saida,
SUM(CASE WHEN tipo = 'Saída' AND MONTH(data_cadastro) = 10 THEN valor ELSE 0 END) AS Out_Saida,
SUM(CASE WHEN tipo = 'Saída' AND MONTH(data_cadastro) = 11 THEN valor ELSE 0 END) AS Nov_Saida,
SUM(CASE WHEN tipo = 'Saída' AND MONTH(data_cadastro) = 12 THEN valor ELSE 0 END) AS Dez_Saida
FROM
gestao_financeira
WHERE
YEAR(data_cadastro) = YEAR(CURRENT_DATE)
AND id_usuario = :id
GROUP BY
id_usuario;", ['id' => $id]);


$resultado = $result->results;

$response = array(
    "jan_ent" => $resultado[0]->Jan_Entrada,
    "fev_ent" => $resultado[0]->Fev_Entrada,
    "mar_ent" => $resultado[0]->Mar_Entrada,
    "abr_ent" => $resultado[0]->Abr_Entrada,
    "mai_ent" => $resultado[0]->Mai_Entrada,
    "jun_ent" => $resultado[0]->Jun_Entrada,
    "jul_ent" => $resultado[0]->Jul_Entrada,
    "ago_ent" => $resultado[0]->Ago_Entrada,
    "set_ent" => $resultado[0]->Set_Entrada,
    "out_ent" => $resultado[0]->Out_Entrada,
    "nov_ent" => $resultado[0]->Nov_Entrada,
    "dez_ent" => $resultado[0]->Dez_Entrada,

    "jan_sai" => $resultado[0]->Jan_Saida,
    "fev_sai" => $resultado[0]->Fev_Saida,
    "mar_sai" => $resultado[0]->Mar_Saida,
    "abr_sai" => $resultado[0]->Abr_Saida,
    "mai_sai" => $resultado[0]->Mai_Saida,
    "jun_sai" => $resultado[0]->Jun_Saida,
    "jul_sai" => $resultado[0]->Jul_Saida,
    "ago_sai" => $resultado[0]->Ago_Saida,
    "set_sai" => $resultado[0]->Set_Saida,
    "out_sai" => $resultado[0]->Out_Saida,
    "nov_sai" => $resultado[0]->Nov_Saida,
    "dez_sai" => $resultado[0]->Dez_Saida
);

header('Content-Type: application/json');

echo json_encode($response);

?>
