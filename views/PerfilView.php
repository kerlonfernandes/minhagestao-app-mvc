<?php
session_start();

use Midspace\Database;
require_once('./../../_app/config.php');
require_once("../../model/Database.php");


if (isset($_SESSION['id_user'])) {

    $id = $_SESSION['id_user'];
}


$query = new Database(MYSQL_CONFIG);
$results = $query->execute_query("SELECT * FROM usuarios WHERE id = :id", ["id" => $id]);
$user = $results->results[0];

?>
<div class="modal" id="confirmationModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirme a Exclusão</h5>
            </div>
            <div class="modal-body">
                <p>Para confirmar a exclusão, digite sua senha:</p>
                <input type="password" id="passwordInput" class="form-control" placeholder="Senha">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal" id="cancelar">Cancelar</button>
                <button type="button" id="confirmDelete" class="btn btn-danger">Confirmar</button>
            </div>
            <div class="error-box d-none m-3">
                <div class="alert alert-danger" role="alert">
                    <strong><span>Senha incorreta!</span></strong>
                </div>
            </div>
            </div>

        </div>
    </div>

    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 mx-auto">
                <div style="margin-top: 25px;">
                    <div class="card border-light mb-3">
                        <div class="card-header">

                            <i class="fa-solid fa-user"></i>
                            <h3><strong><?= isset($user->nome) ? $user->nome : "Sem nome"; ?> <?php if ($_SESSION['is_admin'] == true) echo "- Administrador" ?></strong></h3>
                        </div>
                        <div class="card-body">
                            <div class="text-end">
                                <div class="dropdown">
                                    <a class="btn dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="border: none;">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>

                                    <ul class="dropdown-menu" style="cursor: pointer;">
                                        <li><a class="dropdown-item text-end" id="openModal">
                                                <div class="text-end" style="display: inline; margin-right:10px; color:red;">Deletar minha conta</div><i style="color: red;" class="fa-solid fa-circle-exclamation"></i>
                                            </a></li>
                                        <li><a class="dropdown-item" href="#">Editar Perfil</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mb-3 mt-3 text-center">

                            </div>
                            <h5 class="card-title">Dados do usuário:</h5>
                            <div class="card">
                                <ul class="list-group list-group-flush" style="font-size: 18px;">
                                    <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                        <div class="d-flex align-items-center me-2">
                                            <i class="fa-solid fa-lock"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0" style="margin-left: -15px ;">@<?= isset($user->id) ? $user->id : "Id inválido"; ?></p>
                                        </div>
                                    </li>
                                    <!--  -->
                                    <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                        <div class="d-flex align-items-center me-2">
                                            <i class="fa-solid fa-at"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0" style="margin-left: -15px ;"><?php if (isset($user->email)) {
                                                                                                echo $user->email;
                                                                                            } else {
                                                                                                echo "Usuário não encontrado";
                                                                                            } ?></p>
                                            </p>
                                        </div>
                                    </li>
                                    <!--  -->
                                    <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                        <div class="d-flex align-items-center me-2">
                                            <i class="fa-solid fa-phone"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0" style="margin-left: -15px ;"><?php if (isset($user->telefone)) {
                                                                                                echo $user->telefone;
                                                                                            } else {
                                                                                                echo "Sem telefone";
                                                                                            } ?></p>
                                        </div>
                                    </li>
                                    <!--  -->
                                    <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                        <div class="d-flex align-items-center me-2">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0" style="margin-left: -15px ;" id="preco"><?php if (isset($user->endereco)) {
                                                                                                        echo $user->endereco;
                                                                                                    } else {
                                                                                                        echo "Sem endereço";
                                                                                                    } ?></p>
                                        </div>
                                    </li>
                                    <!--  -->
                                    <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                        <div class="d-flex align-items-center me-2">
                                            <i class="fa-solid fa-flag"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0" style="margin-left: -15px ;" id="qtd"><?php if (isset($user->uf)) {
                                                                                                        echo $user->uf;
                                                                                                    } else {
                                                                                                        echo "UF não definida";
                                                                                                    } ?></p>
                                        </div>
                                    </li>
                                    <!--  -->
                                    <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                        <div class="d-flex align-items-center me-2">
                                            <i class="fa-solid fa-calendar-days"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0" style="margin-left: -15px ;" id="qtd"><?php if (isset($user->data_acesso)) {
                                                                                                        echo $user->data_acesso;
                                                                                                    } else {
                                                                                                        echo "Não definido";
                                                                                                    } ?></p>
                                        </div>
                                    </li>
                                    <!--  -->
                                    <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                        <div class="d-flex align-items-center me-2">
                                            <i class="fa-solid fa-key"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0" style="margin-left: -15px ;"><?php if (isset($user->chave_recuperacao)) {
                                                                                                echo $user->chave_recuperacao;
                                                                                            } else {
                                                                                                echo "Usuário inválido";
                                                                                            } ?></p>
                                        </div>
                                    </li>
                                    <!--  -->
                                    <li class="list-group-item d-flex align-items-center" style="text-align: center;">
                                        <div class="d-flex align-items-center me-2">

                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0" style="margin-left: -15px ;">
                                            </p>
                                        </div>
                                    </li>
                                    <!-- Outros detalhes do produto aqui -->
                                </ul>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector("#cancelar").addEventListener("click", () => {
            $('#confirmationModal').modal('hide');
        })
        document.getElementById("openModal").addEventListener("click", function() {
            $('#confirmationModal').modal('show');
        });

        document.getElementById("confirmDelete").addEventListener("click", function() {
                let senha = $("#passwordInput").val()
                $.ajax({
                    url: "ajax/deletarConta.php",
                    method: "POST",
                    data: {
                        senha: senha
                    },
                    success: function(data) {
                        if (data !== "") {
                            document.querySelector(".error-box").classList.remove("d-none")
                        }
                        else {
                            location.href = "../social/?area=goodbye"
                        }
                    },

                    error: function(err) {
                        console.log(err)
                    }
                })
            }

        )
    </script>