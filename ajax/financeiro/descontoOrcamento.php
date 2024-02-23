<?php
session_start();

use Midspace\Database;

require_once('../../_app/config.php');
require_once('../../model/Database.php');


if (isset($_SESSION['id_user'])) {
    $id_usuario = $_SESSION['id_user'];

    if (!empty($_GET["orcamento_spec"])) {
        if (!empty($_GET['orc_id'])) {
            $orcamento_id = $_GET['orc_id'];
        }
        $query = new Database(MYSQL_CONFIG);
        $result = $query->execute_query(
            "SELECT desconto_orcamento.* FROM desconto_orcamento RIGHT JOIN orcamentos ON orcamentos.id = desconto_orcamento.id_orcamento AND orcamentos.id_usuario = desconto_orcamento.id_usuario AND orcamentos.id = desconto_orcamento.id_orcamento WHERE orcamentos.orcamento_code = :orcamento_code AND orcamentos.id_usuario = :id_usuario AND orcamentos.id = :id",
            [':id_usuario' => $id_usuario, ':id' => $orcamento_id, ":orcamento_code" => $_GET["orcamento_spec"]]
        );

        $resultado = $result->results;
        $rows = $result->affected_rows;
    }
}

?>
  

<?php if ($rows > 0): ?>
    <?php foreach ($resultado as $desc) : ?>
        <div class="card p-2">
            <span class="card-header"><?= $desc->titulo_desconto ?></span>
            <small class=""><?= $desc->descricao_desconto ?></small>
            <span>R$<?= $desc->valor_desconto ?></span>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <span>Não houve descontos em seu orçamento.</span>
<?php endif; ?>