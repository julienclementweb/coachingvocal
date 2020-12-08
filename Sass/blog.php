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
<body onmousewheel="hideNav();" onscroll="arrowUp();">

    <!--NAVBAR-->
    <div class="container-fluid nav navbar-fixed-top" id="menu">
            <ul class="nav__ul">
                <li class="nav__link nav__logo">Coaching Vocal</li>
                <li class="nav__link"><a href="#">Home</a></li>
                <li class="nav__link"><a href="about.html">A propos</a></li>
                <li class="nav__link"><a href="#">Mes services</a></li>
                <li class="nav__link"><a href="#">Contact</a></li>
                <li class="nav__link"><a href="#">Blog</a></li>
                <li class="nav__link nav__login"><?php if (isset($_SESSION['name'])) {
                echo "<a href='pageMembresConnected.php' style='padding-right: 40px; color: #ffffff;'>".$_SESSION['name']."</a><br/>";
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


    <!--Flèche de retour au top-->
    <div class="container-fluid arrowTop">
        <a href="#">
            <img src="../Public/images/arrowup.png" alt="">
        </a>
    </div>

        <script type="text/javascript">
            $('.arrowTop').hide();
            function arrowUp() {
                $('.arrowTop').fadeIn('slow');
            }
        </script>
    
    <div class="container entries">
        <?php

        $cnx = new PDO("mysql:host=localhost:3306;dbname=coachingvocal;charset=utf8","root", "");

        $requete = "SELECT title, post, date_post FROM entries";
        $reponse = $cnx->query($requete);


        while($data = $reponse->fetch()) { ?>
            <form name="formForum" action="session.php" method="post" class="container " style="border:1px solid black; text-align: center; margin-left:10px; margin-bottom: 10px;">
                <article id="<?php echo $data['title'];?>">
                    <?php
                    echo "<h2>".$data['title']."</h2></br>";
                    echo "<p>".$data['post']."</p></br>";
                    echo "Publié le ".$data['date_post']."</br>";?>
                </article>
                <button type="submit" class="bouton" name="redirectionForum">Lire ce fil</button>
            </form>
            <?php } ?><br/><br/><br/>
    </div>



    <!--FOOTER-->

    <div class="container-fluid separatorFooter">
    </div>

    <div class="container-fluid footer">
        <div class="container legal">
            <span>© Coaching Vocal - 
                    Tous droits réservés | 
                    <a href="#">Mentions légales</a><br><br>
                    Site créé par 
                    <a href="https://julienclement-portfolio.com/" target="_blank">JCW</a>
            </span>
        </div>
    </div>

    
</body>
</html>


