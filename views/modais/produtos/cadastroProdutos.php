<div class="modal fade" id="produtosModal" tabindex="-1" aria-labelledby="produtosModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="produtosModalLabel">Cadastrar Produto | Cadastro Rápido</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-container">
                    <div class="input-container">
                        <div class="mb-3 mt-3 text-center">
                            <label for="formFile" class="form-label">Imagem do Produto</label>
                            <input class="form-control" type="file" id="imagemInput">
                            <img src="" alt="Imagem do Produto" id="imagemPreview" class="center-image" style="display:none;">

                        </div>
                    </div>
                    <div class="input-container">
                        <label for="id_categoria">Categoria:</label>
                        <select id="id_categoria" name="id_categoria" class="form-select">


                        </select>
                    </div>
                </div>

                <div class="input-container">
                    <label for="title">Nome do Produto:</label>
                    <input type="text" id="title" name="title">
                </div>

                <div class="input-container">
                    <label for="description">Descrição do Produto:</label>
                    <textarea id="description" name="description"></textarea>
                </div>
                <div class="input-container sm-2">
                    <div class="input-group mb-3">


                        <span class="input-group-text" id="cifrao">R$</span>
                        <span class="input-group-text" id="price">0.00</span>
                        <input type="text" class="form-control" id="moeda" aria-label="O formato inserido deve ser 0.00" name="precoProduto" value="0,01">
                    </div>
                </div>
                <div class="input-container sm-2">
                    <div class="input-group mb-3">


                        <span class="input-group-text" id="qtd_estoque">Quantidade</span>
                        <span class="input-group-text" id="qtd-prod">0</span>
                        <input type="text" class="form-control" id="qtd" aria-label="Quantidade no Estoque" name="precoProduto" value="1">
                        <div class="quantidade_area">
                            <button class="btn mt-2" id="aumenta_qtd" type="button"><i class="fa-solid fa-plus"></i></button>
                            <button class="btn mt-2" id="diminui_qtd" type="button"><i class="fa-solid fa-minus"></i></button>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>

                    <button class="btn" id="envia-btn">Enviar</button>
                    <!-- <button class="btn" type="submit" id="mais-detalhado"><a href="?area=mais-detalhes">Cadastro Detalhado</a></button> -->


                </div>
            </div>
        </div>
    </div>
</div>