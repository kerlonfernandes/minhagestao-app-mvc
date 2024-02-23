<?php


require("./views/templates/header.php");
require("./views/modais/financeiro/modalEntrada.php");
// require("./views/modais/financeiro/modalSaida.php");
require("./views/modais/financeiro/modalAgenda.php");
require("./views/modais/financeiro/modalFiltrarPesquisa.php");


?>

<title><?= $title; ?></title>

<div class="mt-4">
    <div class="container text-center mb-2">
        <div class="row">
            <div class="col-md-1">
            </div>
            <h3 class="text-center mt-3"><strong>Minha Gestão Financeira</strong></h3>
             <?php
            //   require("./views/financeiro/components/headerFinanceiro.php"); 
             ?>

            <div class="container text-center">

                <div class="row">


                    <div class="container"><button class="btn" data-bs-toggle="modal" data-bs-target="#modalRegistro">Novo Registro</button>
                       
                        
                    </div>

                    <div class="col-4">

                        <div class="card">
                            <span><strong>Entradas</strong></span>

                            <strong><span id="entrada-financeiro">0</span></strong>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <span><strong>Saídas</strong></span>

                            <strong><span id="saida-financeiro">0</span></strong>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="card">
                            <span><strong>Total</strong></span>
                            <strong><span id="total-financeiro">0</span></strong>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container-fluid m-6">
                <div class="content">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body table-responsive table-responsive-sm" style="border-radius: 10px;">
                                <table class="table table-hover g-col-2 g-col-md-2" style="border-radius: 10px;">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align: center;"> </th>
                                            <th scope="col" style="text-align: center;">Ent/Sai</th>
                                            <th scope="col" style="text-align: center;">Valor</th>
                                            <th scope="col" style="text-align: center;">Categoria</th>
                                            <th scope="col" style="text-align: center;">Descrição</th>
                                            <th scope="col" style="text-align: center;">Data</th>
                                        </tr>
                                    </thead>
                                    <div class="container">
                                        <div id="loader" role="status">
                                            <div id="spinner-container" style='padding:24px;'><img src="<?= SITE ?>/public/images/spinner.gif" alt="loading..." style="width:24px
                                            ;"></div>
                                        </div>
                                        <tbody id="content">

                                        </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

            <div class="text-center h3 m-5 d-none ano-rel">Relatório <?= date("Y") ?></div>
            <canvas id="myChart"></canvas>

        </div>



        <!-- <div class="alert-success">
                    <span class="icon">&#10004;</span>
                    <p>Sucesso!</p>
                </div> -->
        <!-- 
                -->


    </div>

    <!-- Tables control -->



</div>

<div class="col-md-1">


</div>
<div class="overlay text-end">
</div>

<script src="<?= SITE ?>/public/js/config.js?id=<?= uniqid() ?>"></script>

<script src="<?= SITE ?>/public/js/assets/code.jquery.com_jquery-3.7.1.min.js?id=<?= uniqid() ?>"></script>
<script src="<?= SITE ?>/public/js/helpers.js?id=<?= uniqid() ?>"></script>

<script src="<?= SITE ?>/public/js/filtros.js?id=<?= uniqid() ?>"></script>
<script src="<?= SITE ?>/public/js/modals.js?id=<?= uniqid() ?>"></script>
<script src="<?= SITE ?>/public/js/moeda.js?id=<?= uniqid() ?>"></script>
<script src="<?= SITE ?>/public/js/ajax/financeiro/fincanceiro.js?id=<?= uniqid() ?>"></script>

<?php require("./views/templates/footer.php") ?>