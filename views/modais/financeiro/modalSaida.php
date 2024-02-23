<div class="modal fade" id="modalRegistro-saida" tabindex="-1" aria-labelledby="modalRegistro-saidaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalRegistro-saidaLabel">Nova Saída</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="input-group mb-3">


                            <span class="input-group-text" id="cifrao2">R$</span>
                            <span class="input-group-text" id="price2">0.00</span>
                            <input type="text" class="form-control" id="moeda2" aria-label="O formato inserido deve ser 0.00" name="valor">
                        </div>
                        <div class="input-container text-center mt-2">
                            <input type="date" id="date-input2" name="date" placeholder="Data" />
                            <div class="datas mt-4">
                                <div class="btn" id="hoje-data2">Hoje</div>
                                <div class="btn" id="semana-passada2">Semana passada</div>
                                <div class="btn" id="mes-passado2">Mês passado</div>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="descricao2" class="form-label">Descrição</label>
                            <textarea class="form-control" id="descricao2" name="descricao"></textarea>
                        </div>
                        <div class="input-container text-center mt-2">
                            <select id="id_categoria2" name="id_categoria" class="form-select">
                                <option value="">Selecione a categoria:</option>




                            </select>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">

                    <!-- Botão "Agenda Saída" -->
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalAgenda" data-agenda-type="Saída">Agenda Saída</button>
                    <button type="button" class="btn" style="color: red;" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saida" class="btn" style="color:green;">Salvar</button>
                </div>
            </div>
        </div>
    </div>
