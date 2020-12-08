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
        <h3 class="punchline">Coaching vocal pour professionnels et particuliers</h3>
    </div>
    <div class="container mybtn">
        <div class="btn mybtn__design"><a href="#">Contactez-moi !</a></div>
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
    
    <div class="container-fluid separator">
    </div>

    <!--SECTION 1-->

    <div class="container-fluid section">
        <div class="section__title">
            <hr><h2>un coach vocal... mais qu'est-ce que c'est ?</h2><hr>
        </div>
        <div class="section__content">
            <p>It is a long established fact that a reader will be distracted 
                by the readable content of a page when looking at its layout. 
                The point of using Lorem Ipsum is that it has a more-or-less normal 
                distribution of letters, as opposed to using 'Content here, 
                content here', making it look like readable English.
                The point of using Lorem Ipsum is that it has a more-or-less normal 
                distribution of letters, as opposed to using 'Content here, 
                content here', making it look like readable English.
            </p> 
        </div>
        <div class="container mybtn">
            <div class="btn mybtn__design">En savoir plus</div>
        </div>
    </div>

    <!--SECTION 2-->

    <div class="container-fluid section">
        <div class="section__title">
            <hr><h2>découvrez mes services</h2><hr>
        </div>
    </div>
    <div class="container section">
        <a href="#">
            <div class="section__images col-md-4">
                <img src="../Public/images/mic3.png" 
                    alt="microphone" 
                    class="img-responsive" 
                    id="image1" 
                    onmouseover="changeImage1();"
                    onmouseout="resetImage1();"> 
            </div>
        </a>
        <a href="#">
            <div class="section__images col-md-4">
                <img src="../Public/images/business3.png"
                    alt="company" 
                    class="img-responsive"
                    id="image2" 
                    onmouseover="changeImage2();"
                    onmouseout="resetImage2();">
            </div>
        </a>
        <a href="#">
            <div class="section__images col-md-4">
                <img src="../Public/images/band3.png" 
                    alt="band" 
                    class="img-responsive"
                    id="image3" 
                    onmouseover="changeImage3();"
                    onmouseout="resetImage3();">
            </div>
        </a>
    </div>

    <div class="container-fluid separator">
    </div>


    <!--SECTION 3-->

    <div class="container-fluid section">
        <div class="section__title">
            <hr><h2>qui suis-je ?</h2><hr>
        </div>
        <div class="section__content">
            <p>Auteure – compositrice – interprète depuis 10 ans, les différentes formations 
                suivies pour améliorer ma voix, ont développé chez moi une passion pour l’enseignement. <br><br>

                Après un cursus d’accompagnement de projet au conservatoire de Lyon et un stage 
                intensif de technique vocale à la Complete Vocal Institute de Copenhague, j’ai obtenu 
                le Diplôme d’Etat de professeure de chant en musiques actuelles amplifiées au CEFEDEM 
                Auvergne Rhône Alpes.
            </p> 
        </div>
        <div class="container mybtn">
            <div class="btn mybtn__design"><a href="about.html">En savoir plus</a></div>
        </div>
    </div>


    <!--SECTION CONTACT-->

    <div class="container-fluid section">
        <div class="section__title">
            <hr><h2>contactez-moi</h2><hr>
        </div>
        <div class="section__content">
            <p>Vous souhaitez obtenir un devis, un renseignement ?
                Envoyez-moi un message et c'est avec plaisir que je vous répondrais.
            </p> 
        </div>

        <div class="container">
            <form action="" mehod="post" id="myForm">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nom *">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email *">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Objet">
                </div>
                <div class="form-group">
                    <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Votre message"></textarea>
                </div>
                <div class="container mybtn">
                    <input type="submit" class="btn mybtn__design"></div>
                </div>
            </form>
        </div>

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