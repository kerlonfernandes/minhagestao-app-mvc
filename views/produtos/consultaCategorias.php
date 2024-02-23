<?php
session_start();
use Midspace\Database;
$user_id = $_SESSION['id_user'];


require_once('../../config/config.php');
require_once('../../models/Database.php');


$query = new Database(MYSQL_CONFIG);

$res = $query->execute_query("SELECT * FROM categorias WHERE id_usuario = :id_user", ["id_user" => $user_id]);

?>

<?php if (!empty($res->results)): ?>
 <?php foreach ($res->results as $categorias): ?>
    <li class="list-group-item">
        <?= $categorias->categoria ?>
        <span class="text-end">
            <i class="fa-solid fa-trash delete-cat" style="float: right;" data-category-id="<?= $categorias->id ?>"></i>
        </span>
    </li>

<?php endforeach ?>

<?php else: ?>

    <span class="text-center card p-2">Nenhuma categoria cadastrada ainda</span>

<?php endif; ?>
