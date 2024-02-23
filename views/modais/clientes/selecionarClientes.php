<div class="modal fade" id="selectClients" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecionar Clientes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <div class="card p-3 mt-2">

          <div>
            <a style="background-color: #EF4040; padding:8px; border-radius:10px;" type="button" id="delete-selected-clients"><i class="fa-solid fa-trash"></i></a>
          </div>
        </div>

        <div class="col-lg p-3 m-2">

          <div class="card p-5 info-skeleton">
            <div class="d-flex justify-content-center">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg">

          <div class="card card-primary card-outline">

            <div class="card-body table-responsive" style="border-radius: 10px;">

              <table class="table table-hover" id="tabelaClientes" style="border-radius: 10px;">

                <thead>
                <!-- <label for="select-all-clients">Selecionar Todos</label> -->

                  <tr>

                    <th scope="col" style="text-align: center;" class="options">
                      <!-- <input type="checkbox" id="select-all-clients"> -->

                    </th>
                    <th scope="col" style="text-align: center;">ID</th>
                    <th scope="col" style="text-align: center;">Nome Do Cliente</th>
                    <th scope="col" style="text-align: center;">E-mail</th>
                  </tr>
                </thead>

                <tbody class="clientes-select-list mb-3">
                </tbody>
              </table>
            </div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
    </div>

  </div>
</div>
</div>
