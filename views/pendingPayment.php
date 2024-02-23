<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Tela de Pagamento</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= SITE ?>/public/css/paineis.css">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .payment-options {
      margin-top: 50px;
    }

    .payment-option {
      padding: 20px;
      border-radius: 8px;
      transition: all 0.3s ease;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .payment-option:hover {
      transform: scale(1.05);
    }

    .payment-option a {
      text-decoration: none;
      color: inherit;
    }
  </style>
</head>

<body>

  <div id="overlay">
    <div id="loader-container">
      <div id="custom-loader"></div>
    </div>
  </div>
  <?php if (!isset($_GET['metodo'])) { ?>
    <div class="escolha-forma">
    <?php } ?>

    <?php if (isset($_GET['metodo'])) {
      $metodosDePagamento = ["pix", "cartao", "boleto"];

      if (in_array($_GET['metodo'], $metodosDePagamento)) {
    ?>
        <div class="metodo-<?= $_GET['metodo'] ?>"></div>
    <?php

      } else {
        ?>
          <div class="escolha-forma"></div>
        <?php
      }
    }

    ?>



    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="<?= SITE ?>/public/js/assets/code.jquery.com_jquery-3.7.1.min.js?id=<?= uniqid() ?>"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?= SITE ?>/public/js/ajax/pending/pagamento.js?id=<?= uniqid() ?>"></script>
</body>

</html>