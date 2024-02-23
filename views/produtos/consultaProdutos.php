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
                        <div>
                            <button class='btn btn-acessa'>
                                <a href="<?= SITE ?>/produto/<?= $row->codigo_produto ?>" style='text-decoration: none;'>
                                    Detalhes do produto
                                </a>
                            </button>
                        </div>
                        <form method='POST' action='ajax/deleta-produto.php?id=<?= $row->id ?>'>
                            <input type='hidden' name='id' value='<?= $row->id ?>'>
                            <button class='btn' style='color:red;' id='deleta-produto'>Deletar</button>
                        </form>
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
    <td></td><td></td><td style='text-align:center;'>Nenhum resultado encontrado.</td>
    <?php
}
    
?>
