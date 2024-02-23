<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> </title>
    <style>
        .sidenav {
            height: 100%;
            /* 100% Full-height */
            width: 0;
            /* 0 width - change this with JavaScript */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Stay on top */
            top: 0;
            /* Stay at the top */
            left: 0;
            background-color: #111;
            /* Black*/
            overflow-x: hidden;
            /* Disable horizontal scroll */
            padding-top: 60px;
            /* Place content 60px from the top */
            transition: 0.5s;
            /* 0.5 second transition effect to slide in the sidenav */
        }

        /* The navigation menu links */
        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        /* When you mouse over the navigation links, change their color */
        .sidenav a:hover {
            color: #f1f1f1;
        }

        /* Position and style the close button (top right corner) */
        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
        #main {
            transition: margin-left .5s;
            padding: 20px;
        }

        /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }
    </style>
     <link rel="stylesheet" href="<?= SITE ?>/public/css/alerts.css">
  <link rel="stylesheet" href="<?= SITE ?>/public/css/paineis.css">
</head>

<body>

    <div id="overlay">
        <div id="loader-container">
            <div id="custom-loader"></div>
        </div>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="<?= SITE ?>/admin/?area=home">Home</a>
        <a href="<?= SITE ?>/admin/?area=users">Usuários</a>
        <a href="<?= SITE ?>/admin/?area=reports">Relatórios</a>
        <a href="<?= SITE ?>/admin/?area=system-tools">Ferramentas</a>
    </div>


        <!-- Use any element to open the sidenav -->
        <span onclick="openNav()">open</span>

        <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
        <div id="main">

        <?php if (!isset($_GET['metodo'])) { ?>
        <div class="corpo">
        <?php } ?>

        <?php if (isset($_GET['area'])) {
            $areaAdmin = ["home", "users", "reports", "system-tools"];

            if (in_array($_GET['area'], $areaAdmin)) {
        ?>
                <div class="area-<?= $_GET['area'] ?>"></div>
            <?php

            } else {
            ?>
                <div class="area-home">area nao existente</div>
        <?php
            }
        }

        ?>
        </div>





        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
            }

            /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
            }
            openNav()
        </script>
        <script src="<?= SITE ?>/public/js/assets/code.jquery.com_jquery-3.7.1.min.js?id=<?= uniqid() ?>"></script>

        <script src="<?= SITE ?>/public/js/ajax/admin/admin.js?id=<?= uniqid() ?>"></script>

</body>

</html>