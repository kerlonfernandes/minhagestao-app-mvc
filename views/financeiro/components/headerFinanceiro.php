<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= SITE ?>/perfil" style="font-size:28px;"><?= $_SESSION['user'] ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Novo controle Financeiro</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Orçamentos</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ferramentas
          </a>

    
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Relatório Financeiro</a></li>
            <li><a class="dropdown-item" class="btn filtrar-pesquisa" data-bs-toggle="modal" data-bs-target="#filtraPesquisa">Filtrar Registros</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>