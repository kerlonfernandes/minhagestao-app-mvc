<?php
session_start();

require_once('../../config/config.php');
require_once('../../models/Database.php');

// $dados = selectCliente($conn, $_SESSION['id_user'] );

$database = new Midspace\Database(MYSQL_CONFIG);

$result = $database->execute_query('SELECT
COUNT(*) AS number_of_rows
FROM clientes WHERE id_usuario = :user_id', ['user_id' => $_SESSION['id_user']]);

$clientes_qtd = $result->results[0]->number_of_rows;
?>
<style>
  .collapse-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-out;
    margin-top: 10px;
  }

  .collapse-content.active {
    max-height: 1000px;
    /* Altura máxima do conteúdo colapsado */
  }

  .btn {
    cursor: pointer;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    transition: background-color 0.3s;
  }


  .btn.active i {
    animation: rotateCaret 0.3s ease forwards;
  }

  @keyframes rotateCaret {
    from {
      transform: rotate(0);
    }

    to {
      transform: rotate(180deg);
    }
  }
</style>
<ul class="list-group list-group">
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Clientes Cadastrados <i class="fa-solid fa-users m-1"></i></div>
    </div>
    <span class="badge bg-primary rounded-pill" style="font-size: 16px;"><?= $clientes_qtd ?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <button class="btn btn-mais-recursos" id="collapseBtn">
      Mais recursos <i class="fa-solid fa-caret-down"></i>
    </button>
  </li>
  <div class="collapse-content" id="collapseExample">
    <div class="card p-4">
      <div>
        <ul class="list-group">
          <a type="button" data-bs-toggle="modal" data-bs-target="#cadastrarUsuarioModal">
            <li class="list-group-item d-flex justify-content-between align-items-start"><i class="fa-solid fa-user-plus"></i>
              Cadastrar novo Cliente
            </li>
          </a>
        <?php if ($clientes_qtd > 0) { ?>

          <a  type="button" class="mt-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="text-decoration: none;">
            <li class="list-group-item d-flex justify-content-between align-items-start" style="border-radius: 4px; text-decoration: none;">Relatório de Clientes <i class="fa-regular fa-file-lines"></i></li>
          </a>

          <a  type="button" class="mt-1" data-bs-toggle="modal" data-bs-target="#selectClients" style="text-decoration: none;">
            <li class="list-group-item d-flex justify-content-between align-items-start" style="border-radius: 4px; text-decoration: none;"><i class="fa-solid fa-list-check"> </i> Selecionar Clientes</i></li>
          </a>

        <?php } else {?>
            <span class="text-center"><i class="fa-solid fa-arrow-up mt-3"></i></span>
            <span class="mt-2 mb-2 p-3" style="background-color: #6DB9EF; border-radius:10px; font-weight:bold;">Para mais recursos, cadastre um cliente. 😉</span>
        <?php } ?>

        </ul>
      </div>
    </div>

  </div>
  <div class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <strong class="me-auto">Título do Toast</strong>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Fechar"></button>
  </div>
  <div class="toast-body">
    Conteúdo do Toast
  </div>
</div>

  <!-- <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Subheading</div>
      Content for list item
    </div>
    <span class="badge bg-primary rounded-pill">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Subheading</div>
      Content for list item
    </div>
    <span class="badge bg-primary rounded-pill">14</span>
  </li> -->
</ul>


<script>



  function toggleCollapse() {
    var collapseContent = document.getElementById("collapseExample");
    var collapseBtn = document.getElementById("collapseBtn");

    collapseContent.classList.toggle("active");
    collapseBtn.classList.toggle("active");

  }

  document.querySelector("#collapseBtn").addEventListener("click", toggleCollapse)
</script>
