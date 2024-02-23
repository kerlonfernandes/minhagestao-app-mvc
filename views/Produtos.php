<?php 
    require("./views/templates/header.php");
    require("./views/modais/produtos/cadastroProdutos.php");

?>


<title><?= $title; ?></title>


<div class="modal fade" id="categorias" tabindex="-1" aria-labelledby="categoriasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="categoriasLabel">Categorias Cadastradas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="cadastra-categoria" class="col-form-label">Categoria que deseja cadastrar para seus produtos:</label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="fa-solid fa-tag"></i></div>
                        <input type="text" class="form-control" id="cadastra-categoria" placeholder="Nome da Categoria">
                    </div>
                </div>
                <ul class="list-group list-group-numbered" id="lista-categorias">
                </ul>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn" id="cad-cat-btn">Cadastrar categoria</button>
            </div>
        </div>
    </div>
</div>

<div class="container text-center">
    <div class="row">
        <div class="col-sm">
            <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><strong>Mais Opções <i class="fa-solid fa-gear"></i></strong></button>

            <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Sobre seus produtos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">

                    <div class="list-group">

                        <button type="button" class="list-group-item list-group-item-action">Produtos Cadastrados: <span style="font-weight: bold;" id="quantidade_de_produtos">
                                <div id="loader_qtd" role="status">
                                    <div id="spinner-container-qtd" style='padding:24px;'><img src="<?= SITE ?>/static/images/spinner.gif" alt="loading..." style="width:24px
                                            ;"></div>
                                </div>
                            </span></button>


                        <button class="list-group-item list-group-item-action" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span class="cad-cat"><i class="fa-solid fa-ellipsis-vertical"></i>
                                Categorias Cadastradas: </span><span style="font-weight: bold;" id="categorias_cad">
                                <div id="loader_cat" role="status">
                                    <div id="spinner-container-cat" style='padding:24px;'><img src="<?= SITE ?>/public/images/spinner.gif" alt="loading..." style="width:24px;"></div>
                                </div>

                        </button>


                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <button type="button" class="list-group-item list-group-item-action" id="cad-cat-btn" data-bs-toggle="modal" data-bs-target="#categorias">Cadastrar Categoria</button>

                            </div>
                        </div>

                        <button type="button" class="list-group-item list-group-item-action mt-5">Relatório de produtos: <span style="font-weight: bold;" id="quantidade_de_produtos">
                                <div id="loader_qtd" role="status">
                                    <div id="spinner-container-qtd" style='padding:24px;'><img src="<?= SITE ?>/static/images/spinner.gif" alt="loading..." style="width:24px
                                            ;"></div>
                                </div>
                            </span></button>

                    </div>



                </div>
            </div>
        </div>
        <div class="col-lg-12">




            <div class="container">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#produtosModal" data-bs-whatever="@mdo"><i class="fa-solid fa-boxes-stacked"></i> Cadastrar Produto</button>
            </div>


        </div>
        <div class="col-bg">

        </div>
    </div>
</div>

<!-- <div class="container text-center">
  <span class="input-group-text" id="basic-addon1">@
    <input type="text" id="pesquisar-produto" class="form-control" placeholder="Pesquisar Produto" aria-label="Produto" aria-describedby="basic-addon1" style="margin: left 5px;"></span>
</div> -->
<div class="row align-items-start">
    <div class="col-2">

    </div>

    <div class="col-lg-8">
        <div class="container-fluid m-6">
            <div class="container text-center">
                <span class="input-group-text" id="basic-addon1">@
                    <input type="text" id="pesquisar-produto" class="form-control" placeholder="Pesquisar Produto" style="margin: left 5px;"></span>
            </div>
            <div class="content">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body table-responsive table-responsive-sm" style="border-radius: 10px;">
                            <table class="table table-hover g-col-2 g-col-md-2" style="border-radius: 10px;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center;"> </th>
                                        <th scope="col" style="text-align: center;">ID</th>
                                        <th scope="col" style="text-align: center;">Nome Do Produto</th>
                                        <th scope="col" style="text-align: center;">Preço</th>
                                        <th scope="col" style="text-align: center;">Quantidade</th>
                                        <th scope="col" style="text-align: center;">Código</th>
                                    </tr>
                                </thead>
                                <div id="loader" role="status">
                                    <div id="spinner-container" style='padding:24px;'><img src="<?= SITE ?>/static/images/spinner.gif" alt="loading..." style="width:24px
                                            ;"></div>
                                </div>
                                <tbody class="resultados">

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-8">

</div>


<script src="<?= SITE ?>/public/js/assets/code.jquery.com_jquery-3.7.1.min.js"></script>
<script src="<?= SITE ?>/public/js/ajax/produtos/produtos.js?id=<?= uniqid()?>"></script>

<!-- <script src="<?= SITE ?>/public/js/filtros.js"></script> -->
<script src="<?= SITE ?>/public/js/validadores.js?id=<?= uniqid()?>"></script>
<!-- <script src="<?= SITE ?>/public/js/mensagens.js"></script> -->