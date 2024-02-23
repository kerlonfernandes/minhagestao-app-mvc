<?php


session_start();

require_once('../../config/config.php');
require_once('../../models/Database.php');

// $dados = selectCliente($conn, $_SESSION['id_user'] );

$query = new Midspace\Database(MYSQL_CONFIG);




    $sql = "SELECT * FROM clientes WHERE id_usuario = :user_id ORDER BY nome DESC";
    $parameters = [":user_id" => $_SESSION['id_user']];
    $result = $query->execute_query($sql, $parameters);

    $rows = $result->results;

?>

<?php if ($result->affected_rows > 0) : ?>
    <?php foreach ($rows as $row) : ?>
        <tr class='' scope='row' style='text-align: center;'>
            <td style='margin: 5px; '>
                <!-- Adicione um checkbox em cada linha com o ID do cliente como ID do checkbox -->
                <input type='checkbox' name='cliente_checkbox[]' value='<?= $row->id ?>' id='cliente_checkbox_<?= $row->id ?>'>
            </td>
            <td id="id_<?= $row->id ?>"><?= $row->id ?></td>
            <td><?= $row->nome ?></td>
            <td><?= $row->email ?></td>
        </tr>
    <?php endforeach; ?>
<?php else : ?>
    <tr>
        <td></td>
        <td></td>
        <td style='text-align:center;' colspan="5">Nenhum resultado encontrado.</td>
    </tr>
<?php endif; ?>
