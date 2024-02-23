<!-- ISSO AQUI É PARA FAZER OS TEMPLATES DAS TELAS PARA EIBIR OS DADOS -->

<style>
    .list-group-item {
        overflow: hidden;
    }

    .id {
        float: left;
        color: gray;
        font-size: 12px;
        margin-right: 5px; /* Adicionando margem para separação do conteúdo */
    }
</style>

<ul class="list-group">
    <li class="list-group-item"><span class="id">id</span><?= $equipamento->idcheck ?></li>
    <li class="list-group-item"><span class="id">id</span><?= $equipamento->equipamento ?></li>
    <li class="list-group-item"><span class="id">id</span><?= $equipamento->idprova ?></li>
    <li class="list-group-item"><span class="id">id</span><?= $equipamento->identificacao == "1" ? "CHEGADA" : ($equipamento->identificacao == "2" ? "PERCURSO" : "LARGADA") ?></li>
    <li class="list-group-item"><span class="id">id</span><?= $equipamento->tituloprova ?></li>
    <li class="list-group-item"><span class="id">id</span><?= $equipamento->descricao_check ?></li>
    <li class="list-group-item"><span class="id">id</span><?= $equipamento->status == 1 ? "<span style='color:green;'>ATIVADO</span>" : "<span style='color:red;'>DESATIVADO</span>" ?></li>
    <li class="list-group-item"><span class="id">id</span><?= $equipamento->hora ?></li>
</ul>
