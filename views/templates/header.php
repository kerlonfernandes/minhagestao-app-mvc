<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?= SITE ?>/static/images/gestao_img.png" type="image/x-icon">

  <link rel="stylesheet" href="<?= SITE ?>/public/assets/cdn.jsdelivr.net_npm_bootstrap@5.3.2_dist_css_bootstrap.min.css">
  <!-- <link rel="stylesheet" href="<?= SITE ?>/public/assets/fastbootstrap.min.css"> -->
  <link rel="stylesheet" href="<?= SITE ?>/public/css/alerts.css">
  <link rel="stylesheet" href="<?= SITE ?>/public/css/paineis.css">
  <link rel="stylesheet" href="<?= SITE ?>/public/css/components/boxes.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?= SITE ?>/public/assets/css.css">
  <link href="https://cdn.jsdelivr.net/npm/css.gg/icons/icons.css" rel="stylesheet" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Public+Sans&family=Roboto+Condensed&display=swap');

    #loader {
      width: 24px;
      height: 24px;
    }

    * {
      font-family: 'Public Sans', sans-serif;

    }
    .custom-loader-parts {
        width: 50px;
  height: 50px;
  border-radius: 50%;
  background: 
    radial-gradient(farthest-side,#393939 94%,#0000) top/8px 8px no-repeat,
    conic-gradient(#0000 30%,#393939);
  -webkit-mask: radial-gradient(farthest-side,#0000 calc(100% - 8px),#000 0);
  animation:s3 0.5s infinite linear;
}

@keyframes s3{ 
  100%{transform: rotate(1turn)}
    }
  </style>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <header>
    <div class="area-0">

    </div>

    <div class="area-1">

      <div class="container-fluid">

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="navbar-text">
            <div class="d-flex align-items-center"> <!-- Added align-items-center class -->
              <a class="nav-link" href="<?= SITE ?>/perfil">
                <img src="<?= SITE ?>/public/images/perfil.png" alt="perfil-img" width="48px">
                <span class="user" style="margin-top: 15px;"><?= $_SESSION['user'] ?></span>

              </a>

            </div>
          </div>
          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= SITE ?>/"><i class="fa-solid fa-house-user"></i> Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= SITE ?>/clientes"><i class="fa-regular fa-address-card"></i> Clientes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= SITE ?>/produtos"><i class="fa-solid fa-box-open"></i> Produtos</a>
              </li> 
              <!-- <li class="nav-item">
                <a class="nav-link" href="<?= SITE ?>/agenda"><i class="fa-solid fa-calendar-days"></i> Agenda</a>
              </li> -->
              <!-- <li class="nav-item">
                <a class="nav-link" href="./servicos.php">Serviços</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="<?= SITE ?>/financeira"><i class="fa-solid fa-hand-holding-dollar"></i> Gestão Finaceira</a>
              </li>
            
     
            </ul>

          </div>


          <div class="area-2">
            <span class="navbar-text">
              <form class="d-flex" role="search" action="<?= SITE ?>/logout.php" method="post">
                <button class="btn" type="submit"><i class="fa-solid fa-right-from-bracket fa-rotate-90"></i></button>
              </form>
            </span>
          </div>
      </div>
    </div>
    </div>
    </nav>

  </header>
  <div id="overlay">
    <div id="loader-container">
      <div id="custom-loader"></div>
    </div>
  </div>

