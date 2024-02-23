<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>


<div class="col-lg-8">
<span class="input-group-text" id="basic-addon1">@
    <input type="text" id="pesquisar-usuario" class="form-control" placeholder="Pesquisar usuário" aria-label="Username" aria-describedby="basic-addon1">
</span>
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
                    <div id="spinner-container" style='padding:24px;'><img src="./../public/images/spinner.gif" alt="loading..." style="width:24px;"></div>
                </div>
                <tbody class="resultados mb-3">

                </tbody>
            </table>
        </div>
    </div>



</div>

</div>