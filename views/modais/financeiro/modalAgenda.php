<div class="modal fade" id="modalAgenda" tabindex="-1" aria-labelledby="modalAgendaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalAgendaLabel">Agendar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <select class="form-select mb-3" id="tipo-registro" aria-label="Default select example">
                    <option selected>Selecione o novo registro</option>
                    <option value="Entrada">Entrada</option>
                    <option value="Saída">Saída</option>
                </select>
                <div class="input-group mb-3">


                    <span class="input-group-text" id="cifrao-agenda">R$</span>
                    <span class="input-group-text" id="price-agenda">0.00</span>
                    <input type="text" class="form-control" id="moeda-agenda" aria-label="O formato inserido deve ser 0.00" name="valor">
                </div>
                <div class="input-container text-center mt-2">
                    <input type="date" id="date-input-agenda" name="date" placeholder="Data" />
                    <div class="datas mt-4">
                        <div class="btn btn-flat btn-block btn-light" id="hoje-data-agenda">Hoje</div>
                        <div class="btn btn-flat btn-block btn-light" id="semana-passada-agenda">Semana que vem</div>
                        <div class="btn btn-flat btn-block btn-light" id="mes-passado-agenda">Mês que vem</div>
                    </div>
                    <div class="mb-3">
                        <div class="cs-form">
                            <input type="time" class="form-control" value="10:05 AM" />
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao-agenda" name="descricao"></textarea>
                </div>
                <div class="input-container text-center mt-2">
                    <select id="id_categoria-agenda" name="id_categoria" class="form-select">
                        <option value="">Selecione a categoria:</option>



                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-flat btn-block btn-light" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-flat btn-block btn-light">Agendar</button>
            </div>
        </div>
    </div>
</div>