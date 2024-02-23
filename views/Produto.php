<?php require("./views/templates/header.php") ?>

<title>Produto - <?= $produto->nome ?> </title>

<div class="container text-center">
    <span class="deleted-produto h3 d-none" style="background-color: #B80000; color:white; font-weight:bold; padding:20px; margin:10px;">O produto Não está mais existente no sistema, Volte para a página inicial.</span>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 mx-auto">
            <div style="margin-top: 25px;">
                <div class="card border-light mb-3">
                    <div class="card-header">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" readonly class="form-control-plaintext editar_produto_input nome-produto text-center h3" value="<?= isset($produto->nome) ? $produto->nome : "Sem nome"; ?>">

                    </div>
                    <div class="card-body">
                        <div class="mb-3 mt-3 text-center">
                            <?php if(isset($produto->imagem_produto)) { ?>
                                <img src="<?php echo SITE."/_app/images/".$produto->imagem_produto ?>" alt="imagem do produto <?= $produto->nome ?>">
                            <?php } else {?>
                                <img src="<?php echo SITE."/public/images/no_image.png"?>" alt="no-image">
                            <?php } ?>
                        </div>
                        <h5 class="card-title">Dados do produto:</h5>
                        <div class="card text-center">
                            <ul class="list-group list-group-flush corpo" style="font-size: 18px;">
                                <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                    <div class="d-flex align-items-center me-2">
                                        <i class="fa-solid fa-lock"></i>
                                    </div>
                                    <input type="hidden" class="id-produto" value="<?= isset($produto->id) ? $produto->id : "Id inválido"; ?>">
                                    <div class="flex-grow-1">
                                        <p class="mb-0" style="margin-left: -15px ;">#<?= isset($produto->id) ? $produto->id : "Id inválido"; ?></p>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                    <div class="d-flex align-items-center me-2">
                                        <i class="fa-solid fa-id-card"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="text" readonly class="form-control-plaintext editar_produto_input" id="cpf" value="@<?php if (isset($produto->id_usuario)) echo $produto->id_usuario;
                                                                                                                                            else echo "Sem CPF"; ?>">
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                    <div class="d-flex align-items-center me-2">
                                        <i class="fa-solid fa-at"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="text" readonly class="form-control-plaintext editar_produto_input" id="email" value="<?php if (isset($produto->categoria)) echo $produto->categoria;
                                                                                                                                            else echo "Sem email"; ?>">
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                    <div class="d-flex align-items-center me-2">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="text" readonly class="form-control-plaintext editar_produto_input" id="telefone" value="<?php if (isset($produto->codigo_categoria)) echo $produto->codigo_categoria;
                                                                                                                                                else echo "Adicione uma categoria"; ?>">
                                    </div>
                                </li>
                                <li class="list-group-item " style="text-align: center;">
                                    <div class="d-flex align-items-center mt-2">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <textarea type="text" readonly class="form-control-plaintext editar_produto_input"><?php if (isset($produto->descricao)) echo $produto->descricao;
                                                                                                                            else echo "Sem descrição"; ?></textarea>
                                    </div>
                                    <div class="d-flex align-items-center mt-2"></div>
                                    <div class="flex-grow-1">
                                        <input type="text" readonly class="form-control-plaintext editar_produto_input" value="<?php if (isset($produto->preco)) echo $produto->preco;
                                                                                                                                else echo "Valor não definido"; ?>">
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="text" readonly class="form-control-plaintext editar_produto_input" value="<?php if (isset($produto->qtd_no_estoque)) echo $produto->qtd_no_estoque;
                                                                                                                                else echo "Valor não definido"; ?>">
                                    </div>


                                </li>
                                <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                    <div class="d-flex align-items-center me-2">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-0" style="margin-left: -15px ;"><?php if (isset($produto->hora_registro)) {
                                                                                            echo date("H:i:s", strtotime($produto->hora_registro));
                                                                                        } else {
                                                                                            echo "Id inválido";
                                                                                        } ?></p>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                    <div class="d-flex align-items-center me-2">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-0" style="margin-left: -15px ;"><?php if (isset($produto->data_registro)) {
                                                                                            echo date("d/m/Y", strtotime($produto->data_registro));
                                                                                        } else {
                                                                                            echo "Id inválido";
                                                                                        } ?></p>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                    <div class="d-flex align-items-center me-2">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-0" style="margin-left: -15px ;"><?php if (isset($produto->codigo_produto)) {
                                                                                            echo $produto->codigo_produto;
                                                                                        } else {
                                                                                            echo "Produto inválido";
                                                                                        } ?></p>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                    <div class="d-flex align-items-center me-2">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="flex-grow-1">
                                            <p class="mb-0" style="margin-left: -15px ;">
                                                <?php
                                                require('./vendor/autoload.php');
                                                $url = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . "?") . "/" . $produto_code;
                                                $qrcode = (new \chillerlan\QRCode\QRCode())->render($url);
                                                ?>
                                            <div><?= "<img width='356px' src='$qrcode'>"; ?></div>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <button class="btn editar-btn"><strong>Editar</strong></button>
                                <button class="btn salvar-btn d-none"><strong>Salvar</strong></button>
                                <button class="btn" id="deletar-btn"><strong>Deletar</strong></button>

                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= SITE ?>/public/js/helpers.js"></script>
<script src="<?= SITE ?>/public/js/boxes.js"></script>
<script src="<?= SITE ?>/public/js/mascaras.js"></script>
<?php require("./views/templates/footer.php") ?>