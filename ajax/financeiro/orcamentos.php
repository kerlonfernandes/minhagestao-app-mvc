<?php

session_start();

use Midspace\Database;

require_once('../../_app/config.php');
require_once('../../model/Database.php');


if (isset($_SESSION['id_user'])) {

    $id = $_SESSION['id_user'];
}


$query = new Database(MYSQL_CONFIG);
$result = $query->execute_query("SELECT id, titulo_orcamento, descricao, valor_orcamento, orcamento_code FROM orcamentos WHERE id_usuario = :id_usuario ", [':id_usuario' => $id]);
$orcamentos = $result->results;

?>





<style>
    .card {
        width: 100%;
        height: 275px;
      
    }

    .card-body {
        max-height: 250px;
        overflow-y: auto;
    }

    .card-img-top {
        object-fit: cover;
        height: 100%;
    }

    .acessar-orcamento-board {

        border: none;
        background-color: white; 
        color:black; 
        text-decoration: none;
        padding:10px;
        width:100%;
        text-align: center;
        transition: background-color 0.3s ease;

    }
    .acessar-orcamento-board:hover {
        background-color: #EEF5FF;

    }

</style>
</head>



<div class="container mt-4">
    <div class="row">
        <?php if ($orcamentos > 0) : ?>
            <?php foreach ($orcamentos as $orcamento) : ?>


                <div class="col-md-3">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title"><?php if (isset($orcamento->titulo_orcamento)) echo $orcamento->titulo_orcamento;
                                                    else echo "Sem título" ?></h5>
                            <p class="card-text"><?php if (isset($orcamento->descricao)) echo $orcamento->descricao;
                                                    else echo "Sem título" ?></p>
                        </div>
                        <div class="card-footer">
                            <div class="orcamento-code"><?= $orcamento->orcamento_code ?></div>
                            <div id="valor-orcamento-area">Orçamento: <span class="valor-orcamento"><?= $orcamento->valor_orcamento ?></span></div>
                            <div class="mt-1 valor-disponivel-area">Valor Disponível: <span class="valor-disponivel">0</span></div>
                        </div>
                        <a href="<?= SITE ?>/financeira/orcamentos/<?= $orcamento->orcamento_code ?>" class="acessar-orcamento-board" style="">Acessar</a>

                    </div>

                </div>



            <?php endforeach; ?>
        <?php endif; ?>

    </div>