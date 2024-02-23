<?php

use HelpersClass\SupAid;

session_start();

require_once('../../config/config.php');
require_once('../../models/Database.php');
require_once("../../src/app/SupAid.php");
// $dados = selectCliente($conn, $_SESSION['id_user'] );

$query = new Midspace\Database(MYSQL_CONFIG);
$helpers = new SupAid;

if (isset($_GET['pessoa'])) {
    $pessoa = $_GET['pessoa'];
    $user_id = $_SESSION['id_user'];


    $sql = "SELECT * FROM clientes WHERE nome LIKE :pessoa AND id_usuario = :user_id ORDER BY nome ASC";
    $parameters = [':pessoa' => "%$pessoa%", ":user_id" => $user_id];
    $result = $query->execute_query($sql, $parameters);

    $rows = $result->results;
}
?>



<?php if ($result->affected_rows > 0) : ?>
    <?php foreach ($rows as $row) : ?>
        <tr class='resultados' scope='row' style='text-align: center;'>
            <td style='margin: 5px; '>
                <div style='display: flex;'>
                    <div class='btn-campo' style='display:flex; padding: 10px; flex-wrap: wrap;'>
                        <div>
                            <a href="./cliente/<?= $row->id ?>"><button style="background:none; color:black;"><i class="fa-solid fa-eye"></i></button></a>
                            <!-- <button class='btn btn-acessa'>
                                    <a href='' style='text-decoration: none;'>
                                        Acessar
                                    </a>
                                </button> -->
                            <div class="dropdown">
                                <button style="background: none; border:1px solid black;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical" style="color: black;"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="./cliente/<?= $row->id ?>"><i class="fa-solid fa-address-card"></i> Ver cliente</a></li>

                                    <li><a class="dropdown-item edita-cliente" data-bs-toggle="modal" data-bs-target="#editarCliente" data-endereco="<?= $row->endereco ?>" data-nome="<?= $row->nome ?>" data-client-id='<?= $row->id ?>' data-cpf="<?= $row->cpf ?>" data-email="<?= $row->email ?>" data-telefone="<?= $row->telefone ?>" data-cep="<?= $row->cep ?>" data-logadouro="<?= $row->logadouro ?>" data-bairro="<?= $row->bairro ?>" data-localidade="<?= $row->localidade ?>" data-uf="<?= $row->uf ?>"><i class="fa-solid fa-user-pen editar-cliente"></i> Editar cliente</a></li>
                                    <li><a class="dropdown-item deleta-cliente" data-delete-id="<?= $row->id ?>"><i class="fa-solid fa-trash"></i> Deletar</a></li>

                                </ul>
                            </div>
                        </div>
                        <!-- <input type='hidden' name='id' value='<?= $row->id ?>'>
                            <button class='btn deleta_cliente' data-client-id='<?= $row->id ?>' style='color:red;'>Deletar</button> -->
                    </div>
                </div>
            </td>

            <td id="id_<?= $row->id ?>"><?= $row->id ?></td>
            <td><?= $row->nome ?></td>
            <td><?= $row->endereco ?></td>
            <td><?= $row->email ?></td>
            <td><?= $row->telefone ?></td>
        </tr>

    <?php endforeach; ?>

<?php else : ?>
    <td></td>
    <td></td>
    <td style='text-align:center;'>Nenhum resultado encontrado.</td>
<?php endif; ?>

</script>
