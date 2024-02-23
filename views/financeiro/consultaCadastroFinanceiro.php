<?php
session_start();

use Midspace\Database;

require_once('../../config/config.php');
require_once('../../models/Database.php');

$query = new Midspace\Database(MYSQL_CONFIG);

if (isset($_SESSION['id_user'])) {
    $id = $_SESSION['id_user'];
}

$query = new Database(MYSQL_CONFIG);
$result = $query->execute_query("SELECT * FROM gestao_financeira WHERE id_usuario = :id ORDER BY id DESC", ['id' => $id]);

?>
<?php if ($result->results) : ?>
    <?php foreach ($result->results as $resultado) : ?>
        <tr style="border-radius: 10px;" class="<?php echo ($resultado->tipo == 'Entrada') ? 'table-success' : 'table-danger'; ?>">
            <td>
                <div class="dropdown mt-2">
                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </a>

                    <ul class="dropdown-menu mt-2">
                        <li><a class="dropdown-item text-center del-val" data-val-id="<?= $resultado->id ?>" data-tipo=<?= $resultado->tipo ?>><i class="fa-regular fa-trash-can"></i></a></li>
                    </ul>
                </div>
            </td>
            <td class="mt-2">
                <?php if ($resultado->tipo == "Entrada") {
                    echo "<span style='color:green;' >" . "Entrada " . '<i class="fa-solid fa-arrow-up" style="color:green;"></i> ' . "</span>";
                } else {
                    echo "<span style='color:red;' >" . "Saída   " . '<i class="fa-solid fa-arrow-down" style="color:red;"></i> ' . "</span>";
                } ?>
            </td>
            <td class="mt-2"><?= $resultado->valor ?></td>
            <td class="mt-2"><?= $resultado->categoria ?></td>
            <td class="mt-2"><?= $resultado->descricao ?></td>
            <td class="mt-2"><?= date("d/m/Y", strtotime($resultado->data_cadastro)) ?></td>


        </tr>
    <?php endforeach; ?>

<?php else : ?>
    <tr>
        <td></td>
        <td class="mt-4" colspan="5">Nenhum Registro encontrado</td>
    </tr>
<?php endif; ?>