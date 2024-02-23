<?php

// use app\library\Authenticate;
// use app\library\GoogleClient;

// require "./src/app/library/Authenticate.php";
// require "./src/app/library/GoogleClient.php";
// require './vendor/autoload.php';

// $googleClient = new GoogleClient;
// $googleClient->init();
// $auth = new Authenticate;
// if ($googleClient->authorized()) {
//     $auth->authGoogle($googleClient->getData());
// }

// /* 
// <a href="<?= $authUrl " type="button" class="hov btn mt-5" id="entrar-btn"><strong>Entrar com Google <img src="<?= SITE /public/images/google-img.png" style="width:28px;" alt=""></strong></a>  -->



// if (isset($_GET['logout'])) {
//     $auth->logout();
// }

// $authUrl = $googleClient->generateAuthLink();

?>

<head>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .login-container {
            display: flex;
            height: 100vh;
        }

        .left-side {
            flex: 1;
            background-color: #3498db;
            /* Cor desejada para o lado esquerdo */
            overflow: hidden;
        }

        .left-side img {
            width: 100%;
            max-width: 100%;
            /* Adicionado para ajustar a imagem corretamente */
            height: 100%;
            object-fit: cover;
        }

        .right-side {
            flex: 1;
            /* background-color: #2ecc71; */
            /* Cor desejada para o lado direito */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form {
            max-width: 300px;
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #e74c3c;
            /* Cor do botão */
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        /* Adicionando estilos responsivos para dispositivos móveis */
        @media screen and (max-width: 767px) {
            .login-container {
                flex-direction: column;
            }

            .left-side {
                display: none;
                /* Oculta a imagem em dispositivos móveis */
            }

            .right-side {
                width: 100%;
            }

            .form {
                max-width: none;
            }
        }

        /* Estilos para a classe custom-input */
        .custom-input {
            font-size: 18px;
            padding: 10px 10px 10px 5px;
            display: block;
            width: 100%;
            border: none;
            border-bottom: 1px solid #757575;
            background: transparent;
            transition: border-color 0.3s, color 0.3s;
            /* Adicionando transição */
            color: #333;
        }

        .custom-input:focus {
            outline: none;
            border-bottom: 1px solid #5264AE;
        }

        .custom-input~label {
            color: #999;
            font-size: 18px;
            font-weight: normal;
            position: absolute;
            pointer-events: none;
            left: 5px;
            top: 10px;
            transition: 0.2s ease all;
        }

        .custom-input:focus~label,
        .custom-input:valid~label {
            top: -20px;
            font-size: 14px;
            color: #5264AE;
        }

        .custom-input~.bar {
            position: relative;
            display: block;
            width: 100%;
        }

        .custom-input:focus~.bar:before,
        .custom-input:focus~.bar:after {
            width: 50%;
        }

        .custom-input~.highlight {
            position: absolute;
            height: 60%;
            width: 100px;
            top: 25%;
            left: 0;
            pointer-events: none;
            opacity: 0.5;
        }

        .custom-input:focus~.highlight {
            animation: inputHighlighter 0.3s ease;
        }

        @keyframes inputHighlighter {
            from {
                background: #5264AE;
            }

            to {
                width: 0;
                background: transparent;
            }
        }

        .custom-label {
            font-size: 8px;
            /* Tamanho inicial da fonte */
            transition: font-size 0.3s ease-in-out;
            /* Transição suave de tamanho da fonte */
        }

        /* Estilo quando o input ou a label está em foco */
        .custom-label:focus-within {
            font-size: 10px;
            /* Tamanho maior da fonte ao focar o input */
        }
    </style>

    <title><?= $title; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>


    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="card p-5 col-md-6 mb-5" style="max-width: 1000px;box-shadow: 3px 3px 5px 2px rgba(200, 200, 200, 1); border:none;

">
            <div class="text-center">
                <img src="<?= SITE ?>/public/images/gestao_img.png" alt="" width="128px">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3 input-container">
                        <label for="email-input" class="form-label">Email</label>
                        <div class="input-group">
                            <input type="text" class="form-control custom-input" id="email-input" placeholder="Digite seu e-mail" style="border: none; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.12); background-color: rgba(131, 192, 193, 0.3); " value="<?php echo isset($_SESSION['temp-email']) ? $_SESSION['temp-email'] : ''; ?>">
                        </div>
                    </div>

                    <div class="valid-feedback">
                        Válido
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password-input" style="border: none; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.12); background-color: rgba(131, 192, 193, 0.3); " name="password">

                </div>
            </div>

            <button type="button" class="btn btn-outline btn-block mt-4" id="entrar-btn" style="background-color: rgba(131, 192, 193, 0.5);">Login</button>
            <div class="mt-3">
                <div class="status-login"></div>
            </div>
        </div>
    </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="<?= SITE ?>/public/js/assets/cdn.jsdelivr.net_npm_bootstrap@5.3.1_dist_js_bootstrap.bundle.min.js"></script>
    <script src="<?= SITE ?>/public/js/assets/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="<?= SITE ?>/public/js/ajax/login/scripts.js"></script>



    <!-- <script>
        const createAccountLink = document.querySelector('.create-account');
        const userIcon = createAccountLink.querySelector('.fa-user');

        createAccountLink.addEventListener('mouseover', () => {
            userIcon.classList.add('animate-jump');
        });

        createAccountLink.addEventListener('mouseout', () => {
            userIcon.classList.remove('animate-jump');
        });
    </script> -->
</body>

</html>