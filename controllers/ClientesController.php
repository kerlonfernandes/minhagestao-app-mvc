<?php
session_start();

if (!isset($_SESSION["id_user"])) header("Location: " . SITE . "/login");

use HelpersClass\SupAid;
use Midspace\Database;

require("./models/Database.php");
require("./src/app/SupAid.php");


class ClientesController extends RenderView
{

    public function index()
    {
        // Verifica se a sessão 'id_user' está definida


        $this->loadView("Clientes", [
            'title' => "Clientes - {$_SESSION['user']}",
        ]);
    }

    public function cliente($id)
    {
        $helpers = new SupAid;
        if (isset($id)) {
            $database = new Database(MYSQL_CONFIG);

            $query = "SELECT * FROM clientes WHERE id_usuario = :id_usuario AND id = :id";
            $params = [':id_usuario' => $_SESSION['id_user'], ':id' => $id[0]];
            $results = $database->execute_query($query, $params);


            if ($results->affected_rows > 0) {
                $cliente = $results->results[0];



                $this->loadView("ClienteSpec", [
                    'title' => "Cliente - {$cliente->nome}",
                    'id_user' => $id,
                    'cliente' => $cliente,
                    'cliente_id' => $cliente->id,


                ]);
            } else {

                $this->loadView("NotFoundCliente", ['title' => "Cliente não encontrado.", "cliente_id" => $id[0]]);
            }
        }
    }
    public function relatorioClientes()
    {

        $trueParams = [];

        foreach ($_GET as $param => $value) {
            if ($value === 'true') {
                $trueParams[] = "$param";
            }
        }

        $stringTrueParams = implode(', ', $trueParams);

        $database = new Database(MYSQL_CONFIG);

        $query = "SELECT $stringTrueParams FROM clientes WHERE id_usuario = :id_usuario";
        $params = [':id_usuario' => $_SESSION['id_user']];
        $results = $database->execute_query($query, $params);

        if ($results && !empty($results->results)) {
            $header = array_keys((array) $results->results[0]); 
            $dataHoraAtual = date("Y-m-d H:i:s"); 
            
            $filename = "Relatorio Clientes {$dataHoraAtual}.csv";
            $output = fopen('php://output', 'w');

            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=' . $filename);

            fputcsv($output, $header, ',');

            foreach ($results->results as $row) {
                fputcsv($output, (array) $row, ',');
            }

            fclose($output);
            exit;
        } else {
            echo "<script>alert('Nenhum resultado encontrado para os parâmetros selecionados.') window.location.href=". SITE ."/clientes'</script>";
  
        }
    }
}
