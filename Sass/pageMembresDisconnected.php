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


    <!-- Formulaire de connexion -->

    <form action="" method="post" name="formConnexion" class="container loginForm">
        <h3>Connexion</h3>

        <div class="form-group">
            <input type="text" name="name" placeholder="Nom" class="form-control"/> <br/>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Mot de passe" class="form-control"/> 
        </div>
        
        <input class="mybtn mybtn__design" type="submit" name="validerConnexion" value="Valider" />
    </form>

    <?php

          if (isset($_POST['validerConnexion'])) {
              if (empty($_POST['name'] || empty($_POST['password']))) {
                  echo "<script type='text/javascript'> alert ('Veuillez remplir tous les champs'); </script>";
              }
              else {
                  $name = $_POST['name'];
                  $password = $_POST['password'];
                  $hash = password_hash($password, PASSWORD_DEFAULT);

                  $pdo = getPDO($config);
                  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  /*echo "<script type='text/javascript'> alert ('Le PDO fonctionne'); </script>";*/

                  $resultat = getUser($pdo, $name, $password);

                  if (isset($resultat)) {
                    if (password_verify($password, $hash)) {
                      $temp = getUser($pdo,$name,$password);
                      $_SESSION['id_user'] = $temp['id_user'];
                      $_SESSION['name'] = $name;
                      $_SESSION['password'] = $password;
                      echo "<script type='text/javascript'>document.location.replace(\"pageMembresConnected.php\")</script>";
                    }
                    else echo "<script type='text/javascript'> alert ('Le login ou le mot de passe est erroné'); </script>";
                  }
                  else echo "<script type='text/javascript'> alert ('Vous n\'êtes pas encore inscrit sur le site'); </script>";
              }
          }
          ?>


    <!-- Formulaire d'inscription -->

    <form name="formInscription" method="post" action="" class="container loginForm">
        <h3>Vous n'avez pas encore de compte ?</h3>

        <div class="form-group">
            <input type="text" name="name" placeholder="Nom" class="form-control" /> <br/>
        </div>
        <div class="form-group">
            <input type="text" name="mail" placeholder="Email" class="form-control"/> <br/>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Mot de passe" class="form-control"/>
        </div>
        
        <input class="mybtn mybtn__design" type="submit" name="validerInscription" value="Valider"/>

        <?php

if (isset($_POST['validerInscription'])) {

    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $arrobase = "@";
    $dot = ".";

    if (!empty($name) && !empty($mail) && !empty($hash)) {
        if(strpos($mail, $arrobase) != false ) {
            if(strpos($mail, $dot) != false ) {
              $pdo = getPDO($config);
              $temp = getUsers($pdo);
              while ($user = $temp->fetch()) {
                  if ($user['name'] == $name) {
                      echo"<script type='text/javascript'>alert('Le pseudonyme rentré est déjà utilisé !');
                          window.location.replace(\"pageMembresDisconnected.php\");</script>";
                  }
              } ;
                $pdo = getPDO($config);
                $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $req = $pdo->prepare('INSERT INTO users (name, mail, password)  VALUES(?,?,?)');
                $req->execute(array($name, $mail, $hash ));

                $resultat = getUser($pdo, $name, $hash);
                $_SESSION['id_user'] = $resultat['id_user'];
                $_SESSION['name'] = $name;
                $_SESSION['password'] = $hash;
                echo "<script type='text/javascript'>document.location.replace(\"pageMembresConnected.php\")</script>";

            } else echo "<script type='text/javascript'> alert ('Votre adresse mail doit contenir un point !'); </script>";
        } else echo "<script type='text/javascript'> alert ('Votre adresse mail doit contenir le caractère @ !'); </script>";
    } else echo "<script type='text/javascript'> alert ('Veuillez remplir tous les champs'); </script>";
}
?>

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


