<?php
session_start();

use Midspace\Database;

require("./models/Database.php");

if (!isset($_SESSION["id_user"])) header("Location: ./login");

class ProdutosController extends RenderView
{

    public function index()
    {
        // Verifica se a sessão 'id_user' está definida


        $this->loadView("Produtos", [
            'title' => "Produtos - {$_SESSION['user']}",
        ]);
    }
    
    public function produto($code)
    {
        print_r($_GET['user_perm']);
        $id = $_SESSION["id_user"];

        $database = new Database(MYSQL_CONFIG);

        //     SELECT 
        //     produtos.id AS id_do_produto, 
        //     categorias.id AS id_da_categoria, 
        //     produtos.*, 
        //     categorias.*
        //     FROM produtos
        //     JOIN categorias ON categorias.codigo_categoria = produtos.categoria
        //     WHERE produtos.id_usuario = 207 AND produtos.id = 156;

        $query = "SELECT 
        produtos.id AS id_do_produto, 
        categorias.id AS id_da_categoria, 
        produtos.*, 
        categorias.*
        FROM produtos
        JOIN categorias ON categorias.codigo_categoria = produtos.categoria
        WHERE produtos.id_usuario = :id_usuario AND produtos.codigo_produto = :id_produto";

        $params = [':id_usuario' => $id, ':id_produto' => $code[0]]; // Corrigido de :codigo_produto para :id_produto
        $results = $database->execute_query($query, $params);



        if ($results->affected_rows > 0) {
            $produto = $results->results[0];

            $this->loadView("Produto", [
                'title' => "Produto",
                'id_user' => $id,
                'produto' => $produto,
                'produto_id' => $produto->id,
                'produto_code' => $produto->codigo_produto


            ]);
        } else {

            print_r($results);
        }
    }
}
