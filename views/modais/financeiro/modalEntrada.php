<div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="modalRegistroLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalRegistroLabel">Nova Entrada</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <select class="form-select mb-3" id="tipo-registro" aria-label="Default select example">
                    <option selected>Selecione o novo registro</option>
                    <option value="Entrada">Entrada</option>
                    <option value="Saída">Saída</option>
                </select>

                <div class="input-group mb-3">


                    <span class="input-group-text" id="cifrao">R$</span>
                    <span class="input-group-text" id="price">0.00</span>
                    <input type="text" class="form-control" id="moeda" aria-label="O formato inserido deve ser 0.00" name="valor">
                </div>
                <div class="input-container text-center mt-2">
                    <input type="date" id="date-input" name="date" placeholder="Data" />
                    <div class="datas mt-4">
                        <div class="btn" id="hoje-data">Hoje</div>
                        <div class="btn" id="semana-passada">Semana passada</div>
                        <div class="btn" id="mes-passado">Mês passado</div>
                    </div>

                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao"></textarea>
                </div>
                <div class="input-container text-center mt-2">
                    <select id="id_categoria" name="id_categoria" class="form-select">
                        <option value="">Selecione a categoria:</option>

                    </select>
                </div>
                <div class="space-modal">
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalAgenda" data-agenda-type="Entrada">Agenda Entrada</button> -->

                <button type="button" class="btn" style="color: red;" data-bs-dismiss="modal">Fechar</button>
                <button type="button" id="entrada" class="btn" style="color:green;">Salvar</button>
            </div>
        </div>
    </div>
</div>