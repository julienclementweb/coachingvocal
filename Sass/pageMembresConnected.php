<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../public/css/style.css">
        <link rel="stylesheet" href="../Public/css/mobile.css">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
        <title>Nina Coach Vocal</title>
</head>

<?php if (!isset($_SESSION['name'])) header ('Location: pageMembresDisconneted.php');
// else if ($_SESSION['name']=='admin') header ('Location: pageadmin.php'); ?>

<body>

<header>


</header>

<?php
include "script.php";

$pdo = getPDO($config);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

<body onmousewheel="hideNav();" onscroll="arrowUp();">

    <!--NAVBAR-->
    <div class="container-fluid nav navbar-fixed-top" id="menu">
            <ul class="nav__ul">
                <li class="nav__link nav__logo">Coaching Vocal</li>
                <li class="nav__link"><a href="index.php">Home</a></li>
                <li class="nav__link"><a href="#">A propos</a></li>
                <li class="nav__link"><a href="#">Mes services</a></li>
                <li class="nav__link"><a href="#">Contact</a></li>
                <li class="nav__link"><a href="#">Blog</a></li>
                <li class="nav__link nav__login"><?php if (isset($_SESSION['name'])) {
                echo "<span style='padding-right: 40px; color: #ffffff;'>".$_SESSION['name']."</span><br/>";
                echo "<a href='deconnexion.php'>Déconnexion</a>";
                }
                else echo "<a href='pageMembresDisconnected.php'>Connexion / Inscription</a>";?> </li>
            </ul>

    </div>

        <!--Script pour apparition et disparition de la Nav au scroll-->
        <script type="text/javascript">
            // Initial state
            let scrollPos = 0;
            // adding scroll event
            window.addEventListener('scroll', function(){
            // detects new state and compares it with the new one
            if ((document.body.getBoundingClientRect()).top > scrollPos)
                    $('#menu').fadeIn();
                else
                $('#menu').fadeOut();
                // saves the new position for iteration.
                scrollPos = (document.body.getBoundingClientRect()).top;
            });
        </script>


    <!--HEADER-->
    <div class="container-fluid heading">
        <h1 class="heading__title heading__title--top">Coaching</h1>
        <h1 class="heading__title">Vocal</h1>
    </div>

    <div class="container">
        <h3><?php if (isset($_SESSION['name'])) {
            echo "<p class='welcomePerso'>Bonjour ".$_SESSION['name'].".<br/>Bienvenue dans votre espace personnel.</p><br/>";
        }
        ?> </h3>
    </div>
</body>
</html>
