<?php require("./views/templates/header.php") ?>

<title><?= $title; ?></title>
<style>
  body {
    overflow: auto;
  }
</style>

</head>

<body>


  <div class="areas">
    <div class="text-center">
      <div id="loader" role="status">
        <div id="spinner-container" style='padding:24px;'><img src="<?= SITE ?>/public/images/spinner.gif" alt="loading..." style="width:24px
                                            ;"></div>
      </div>
    </div>

  </div>

  <script src="<?= SITE ?>/public/js/config.js?id=<?= uniqid() ?>"></script>

  <script src="<?= SITE ?>/public/js/assets/code.jquery.com_jquery-3.7.1.min.js"></script>

  <script src="<?= SITE ?>/public/js/inicio.js?id=<?= uniqid() ?>"></script>

  <script>
    const userName = "<?php echo $_SESSION['user'];
                      if ($_SESSION['is_admin'] == True) echo "- Admin" ?>"
    const userSpan = document.getElementById('user-name');
    let currentCharIndex = 0;

    function typeUserName() {
      if (currentCharIndex < userName.length) {
        userSpan.textContent += userName.charAt(currentCharIndex);
        currentCharIndex++;
        setTimeout(typeUserName, 100);
      }
    }

    typeUserName();
  </script>

  <?php require("./views/templates/footer.php") ?>