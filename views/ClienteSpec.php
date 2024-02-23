<?php 
use HelpersClass\SupAid;
require("./views/templates/header.php");
require("./views/modais/clientes/modalAvisoClienteDeletado.php");



?>

<title><?= $title; ?></title>

<div class="container text-center">
    <span class="deleted-cliente h3 d-none" style="background-color: #B80000; color:white; font-weight:bold; padding:20px; margin:10px;">O Cliente Não está mais existente no sistema, Volte para a página inicial.</span>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 mx-auto">
            <div style="margin-top: 25px;">
                <div class="card border-light mb-3">
                    <div class="card-header">
                        <i class="fa-solid fa-user"></i>
                       <input type="text" readonly class="form-control-plaintext editar_cliente_input nome-cliente text-center h3" value="<?= isset($cliente->nome) ? $cliente->nome : "Sem nome"; ?>">
                     

                    </div>
                    <div class="card-body">
                        <div class="mb-3 mt-3 text-center"></div>
                        <h5 class="card-title">Dados do Cliente:</h5>
                        <div class="card text-center">
                            <ul class="list-group list-group-flush corpo" style="font-size: 18px;">
                                <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                    <div class="d-flex align-items-center me-2">
                                        <i class="fa-solid fa-lock"></i>
                                    </div>
                                    <input type="hidden" class="id-cliente" value="<?= isset($cliente->id) ? $cliente->id : "Id inválido"; ?>">
                                    <div class="flex-grow-1">
                                        <p class="mb-0" style="margin-left: -15px ;">@<?= isset($cliente->id) ? $cliente->id : "Id inválido"; ?></p>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                    <div class="d-flex align-items-center me-2">
                                        <i class="fa-solid fa-id-card"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="text" readonly class="form-control-plaintext editar_cliente_input" id="cpf" value="<?php if (isset($cliente->cpf)) echo $cliente->cpf;
                                                                                        else echo "Sem CPF"; ?>"  >
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                    <div class="d-flex align-items-center me-2">
                                        <i class="fa-solid fa-at"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="text" readonly class="form-control-plaintext editar_cliente_input" id="email" value="<?php if (isset($cliente->email)) echo $cliente->email;
                                                                                        else echo "Sem email"; ?>"  >
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                    <div class="d-flex align-items-center me-2">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="text" readonly class="form-control-plaintext editar_cliente_input" id="telefone" oninput="formatarTelefone(this)" value="<?php if (isset($cliente->telefone)) echo $cliente->telefone;
                                                                                        else echo "Adicione uma categoria"; ?>"  >
                                    </div>
                                </li>
                                <li class="list-group-item " style="text-align: center;">
                                    <div class="d-flex align-items-center mt-2">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="text" readonly class="form-control-plaintext editar_cliente_input" value="<?php if (isset($cliente->cep)) echo $cliente->cep;
                                                                                        else echo "Valor não definido"; ?>"  >
                                    </div>
                                    <div class="d-flex align-items-center mt-2"></div>
                                    <div class="flex-grow-1">
                                        <input type="text" readonly class="form-control-plaintext editar_cliente_input" value="<?php if (isset($cliente->logadouro)) echo $cliente->logadouro;
                                                                                        else echo "Valor não definido"; ?>"  >
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="text" readonly class="form-control-plaintext editar_cliente_input" value="<?php if (isset($cliente->bairro)) echo $cliente->bairro;
                                                                                        else echo "Valor não definido"; ?>"  >
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="text" readonly class="form-control-plaintext editar_cliente_input" value="<?php if (isset($cliente->localidade)) echo $cliente->localidade;
                                                                                        else echo "Valor não definido"; ?>"  >
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="text" readonly class="form-control-plaintext editar_cliente_input" value="<?php if (isset($cliente->endereco)) echo $cliente->endereco;
                                                                                        else echo "Valor não definido"; ?>"  >
                                    </div>
                                    <div class="flex-grow-1">
                                        
                                        <input type="text" readonly class="form-control-plaintext editar_cliente_input" value="<?php if (isset($cliente->uf)) echo $cliente->uf;
                                                                                        else echo "Valor não definido"; ?>"  >
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                    <div class="d-flex align-items-center me-2">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                    <p class="mb-0" style="margin-left: -15px ;"><?php if(isset($cliente->data_cadastro)) {
                                        echo date("d/m/Y", strtotime($cliente->data_cadastro));
                                    } else {echo "Id inválido";} ?></p>
                                    </div>
                                </li>
                                <button class="btn editar-btn"><strong>Editar</strong></button>
                                <button class="btn salvar-btn d-none"><strong>Salvar</strong></button>
                                <button class="btn" id="deletar-btn"><strong>Deletar</strong></button>

                            </ul>
                        </div>

                        <div class="card p-5 mt-3">
                            <strong>
                                <h4 class="text-center">Horários Agendados</h4>
                            </strong>
                            <div class="card">
                                <div id="horarios" class="p-3">
                                    <div id="loader-horario">
                                        <div class="spinner-border spinner-border-sm" role="status">
                                            <span class="visually-hidden p-3">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= SITE ?>/public/js/config.js?id=<?= uniqid() ?>"></script>

<script src="<?= SITE ?>/public/js/helpers.js?id=<?= uniqid() ?>"></script>
<script src="<?= SITE ?>/public/js/boxes.js?id=<?= uniqid() ?>"></script>
<script src="<?= SITE ?>/public/js/mascaras.js?id=<?= uniqid() ?>"></script>
<script src="<?= SITE ?>/public/js/ajax/clientes/clientes.js?id=<?= uniqid() ?>"></script>
<?php require("./views/templates/footer.php") ?>