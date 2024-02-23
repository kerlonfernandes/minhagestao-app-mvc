<div class="modal fade" id="cadastrarUsuarioModal" tabindex="-1" aria-labelledby="cadastrarUsuarioModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cadastrarUsuarioModalLabel">Cadastrar Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col">
                                <label for="First name" class="form-label" style="color: black;">Nome</label>
                                <input type="text" class="form-control" placeholder="Nome do Cliente" aria-label="First name" name="nome-cliente" id="nome-cliente">
                                <span class="nomeisempty" style="color:red; font-weight:bold;">O cliente precisa ter um nome</span>
                            </div>

                        </div>
                        <div class="col-12">
                            <label for="email-cliente" class="form-label" style="color: black;">Email</label>
                            <input type="email" class="form-control" id="email-cliente" name="email-cliente" placeholder="Ex.:exemplo@email.com">
                        </div>

                        
                        <div class="col-md-12">
                            <label for="cep" class="form-label" style="color: black;">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep" placeholder="Ex.:00000-000">
                            <div class="cep-not-found d-none mt-2" style="color:red;">CEP não encontrado</div>

                            <label for="logadouro" class="form-label" style="color: black;">Logadouro/Nome</label>
                            <input type="text" class="form-control" id="logadouro" name="logadouro" placeholder="Ex.: Praça Mesquita Neto">
                        </div>

                        <div class="col-md-12">
                            <label for="bairro" class="form-label" style="color: black;">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Ex.: Centro">
                        </div>
                        <div class="col-md-12">
                            <label for="bairro" class="form-label" style="color: black;">Localidade</label>
                            <input type="text" class="form-control" id="localidade" name="localidade" placeholder="Ex.: Localidade">
                        </div>
                        <div class="col-md-6">
                            <label for="uf" class="form-label" style="color: black;">UF</label>
                            <select id="uf" class="form-select" name="uf">
                                <option value="">Selecione a UF</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>

                            </select>
                        </div>
                        <div class="col-12">
                            <label for="endereco" class="form-label" style="color: black;">Endereço</label>
                            <input type="text" class="form-control" id="endereco" placeholder="Endereço" name="endereco">
                        </div>
                        <div class="col-md-12">
                            <label for="telefone" class="form-label" style="color: black;">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" oninput="formatarTelefone(this)" placeholder="27 9 9999-9999">
                        </div>
                        <div class="col-md-12">
                            <label for="cpf" class="form-label" style="color: black;">CPF/CNPJ (Opicional)</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF ou CNPJ">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal" style="color: #6c757d; border:1px solid #6c757d;">Fechar</button>
                            <button class="btn" id="salva-btn" style="color: green; border:1px solid green;">Salvar</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>