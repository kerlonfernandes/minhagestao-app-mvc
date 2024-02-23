<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("./views/templates/header.php");

require("./views/modais/clientes/cadastrarClienteModal.php");
require("./views/modais/clientes/clienteEditar.php");
require("./views/modais/clientes/relatorioModal.php");
require("./views/modais/clientes/selecionarClientes.php");

require("./views/components/toast-aviso.php");
?>
<title><?= $title; ?></title>



    <div style=" margin: 25px; border-bottom: 1px solid black;">
        <h1>Clientes de <strong><?= $_SESSION['user']; ?></strong></h1>
    </div>


    <div class="container text-center">
        <span class="input-group-text" id="basic-addon1">@
            <input type="text" id="pesquisar-cliente" class="form-control" placeholder="Pesquisar Cliente" aria-label="Username" aria-describedby="basic-addon1" style="margin: left 5px;"></span>
    </div>

    <div class="row align-items-start">


        <div class="container-fluid">
            <div class="content">
                <div class="row">
                    <!-- Barra lateral -->
                    <div class="col-lg-2 p-3 m-2">
                        <div class="sidebar">
                            <!-- placeholder -->

                            <div class="card p-5 info-skeleton">
                                <div class="d-flex justify-content-center">
                                    <div id="loader-0" role="status">
                                        <div id="spinner-container" style='padding:24px;'><img src="<?= SITE ?>/public/images/spinner.gif" alt="loading..." style="width:24px;"></div>
                                    </div>
                                </div>
                            </div>

                            <!--  -->
                            <div class="clientes-info"></div>
                        </div>
                    </div>
                    <div class="col-lg-8">

                        <div class="card card-primary card-outline">

                            <div class="card-body table-responsive table-responsive-sm" style="border-radius: 10px;">
                                <!-- <button id="adicionarCheckbox">Adicionar Checkbox</button>
                            <button id="mostrarIds">Debug ids</button>
                            <button id="cancelarSelecao">Cancelar</button>
                            <button id="fecharCheckboxes">Del</button>
                            <button id="mostrarCheckboxes"></button>
                             -->
                                <table class="table table-hover g-col-2 g-col-md-2" style="border-radius: 10px;">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align: center;" class="options"></th>
                                            <th scope="col" style="text-align: center;">ID</th>
                                            <th scope="col" style="text-align: center;">Nome Do Cliente</th>
                                            <th scope="col" style="text-align: center;">Endereço</th>
                                            <th scope="col" style="text-align: center;">E-mail</th>
                                            <th scope="col" style="text-align: center;">Telefone</th>
                                        </tr>
                                    </thead>
                                    <div id="loader" role="status">
                                        <div id="spinner-container" style='padding:24px;'><img src="<?= SITE ?>/public/images/spinner.gif" alt="loading..." style="width:24px;"></div>
                                    </div>
                                    <tbody class="resultados mb-3">

                                    </tbody>
                                </table>
                            </div>
                        </div>



                    </div>

                </div>


            </div>
        </div>
    </div>
</div>



<script src="<?= SITE ?>/public/js/config.js?id=<?= uniqid() ?>"></script>
<script src="<?= SITE ?>/public/js/mensagens.js?id=<?= uniqid() ?>"></script>
<script src="<?= SITE ?>/public/js/assets/code.jquery.com_jquery-3.7.1.min.js?id=<?= uniqid() ?>"></script>



<script src="<?= SITE ?>/public/js/boxes.js?id=<?= uniqid() ?>"></script>
<script src="<?= SITE ?>/public/js/helpers.js?id=<?= uniqid() ?>"></script>
<script src="<?= SITE ?>/public/js/ajax/clientes/clientes-components.js?id=<?= uniqid() ?>"></script>

<script src="<?= SITE ?>/public/js/ajax/clientes/clientes.js?id=<?= uniqid() ?>"></script>

<script src="<?= SITE ?>/public/js/validadores.js?id=<?= uniqid() ?>"></script>
<script src="<?= SITE ?>/public/js/tabelas.js?id=<?= uniqid() ?>"></script>
<script src="<?= SITE ?>/public/js/consultas.js?id=<?= uniqid() ?>"></script>


<?php require("./views/templates/footer.php") ?>