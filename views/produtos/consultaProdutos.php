<?php

session_start();

require_once('../../config/config.php');
require_once('../../models/Database.php');

// $dados = selectCliente($conn, $_SESSION['id_user'] );

$query = new Midspace\Database(MYSQL_CONFIG);

if (isset($_GET['produto'])) {
    $produto = $_GET['produto'];
    $user_id = $_SESSION['id_user'];

    $sql = "SELECT * FROM produtos WHERE nome LIKE :produto AND id_usuario = :user_id ORDER BY id DESC";
    $parameters = [
        'produto' => "%$produto%",
        'user_id' => $user_id,
    ];

    $result = $query->execute_query($sql, $parameters);
}

if ($result->status === 'success' && count($result->results) > 0) {

    foreach ($result->results as $row) {
?>
        <tr class='resultados' scope='row' style='text-align: center;'>
            <td style='margin: 5px; '>
                <div style='display: flex;'>
                    <div class='btn-campo' style='display:flex; padding: 10px; flex-wrap: wrap;'>
                        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item">Action</a></li>
                            <li><a class="dropdown-item">Another action</a></li>
                            <li><a class="dropdown-item">Something else here</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= SITE ?>/produto/<?= $row->codigo_produto ?>">Vizualizar produto</a></li>
                        </ul>
                    </div>
                </div>
            </td>
            <td><?= $row->id ?></td>
            <td><?= $row->nome ?></td>
            <td><?= $row->preco ?></td>
            <td><?= $row->qtd_no_estoque ?></td>
            <td><?= $row->codigo_produto ?></td>
        </tr>
    <?php
    }
} else {
    ?>
    <td></td>
    <td></td>
    <td style='text-align:center;'>Nenhum resultado encontrado.</td>
<?php
}

?>