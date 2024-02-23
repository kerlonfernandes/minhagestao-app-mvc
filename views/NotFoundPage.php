<?php
$listaImgsGifs = ["gif1.gif", "gif2.gif", "gif3.gif", "spxhqa.gif"]; // Sua lista de nomes
shuffle($listaImgsGifs);
$sorteado = array_shift($listaImgsGifs);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Não Encontrado :[</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap-grid.min.css" integrity="sha512-ZuRTqfQ3jNAKvJskDAU/hxbX1w25g41bANOVd1Co6GahIe2XjM6uVZ9dh0Nt3KFCOA061amfF2VeL60aJXdwwQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <a href="<?= SITE ?>/" style="text-decoration: none; color:black; font-weight:100px;">
        <div class="back-page m-5 text-center">
            <i class="fa-solid fa-house" style="font-size:30px;"></i>

        </div>
        
    </a>
 
    <div class="content-page" style="font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50vh;">

        <div class="container" style="text-align: center;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <h1 style="color: #333;">Página não Encontrado</h1>
            
            <img src="<?= SITE ?>/public/images/<?= $sorteado ?>" alt="<?= $sorteado ?>">

            <p style="color: #666; font-size: 28px;">Lamentamos, mas a página solicitada não foi encontrada.</p>
        </div>
    </div>

</body>

</html>