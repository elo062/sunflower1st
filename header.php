<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sunflower : groupe de musique dans l'Aude et l'Hérault</title>
  <link rel="icon" href="./assets/img/sunflower-logo.ico">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/icone/css/font-awesome.css"/>
  <link href="https://fonts.googleapis.com/css?family=Comfortaa|Poiret+One" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/modern-slide-in/modern-slide-in/css/sequence-theme.modern-slide-in.css" />
  <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.min.css" />
</head>

<!-- Start horizontal navigation -->
<nav>
  <div id="op-horizontalnav">
    <ul class="op-sectionlist">
      <li class="rubrique"><a class="lien-rubrique" href="index.php"><img src="assets/img/sunflower-logo1.png"alt="logo sunflower" title="Accueil" id="logo"></a></li>
      <div class="contact">
        <span>SUNFLOWER </span>
        <span class="coordonnees">
        <a href="tel: 06 10 93 37 46">
        <i class="fa fa-phone" aria-hidden="true"></i>06.10.93.37.46
        </a>
        </span>
        <span class="coordonnees"><a href="mailto:contact@sunflower.com"><i class="fa fa-envelope" aria-hidden="true"></i>Envoyer un mail</a></span>
      </div>
      <li class="rubrique"><a class="lien-rubrique" href="index.php#accueil">ACCUEIL</a></li>
      <li class="rubrique"><a class="lien-rubrique" href="index.php#intro">PRÉSENTATION</a></li>
      <li class="rubrique"><a class="lien-rubrique" href="index.php#demo">DÉMO</a></li>
      <li class="rubrique"><a class="lien-rubrique" href="index.php#contact">CONTACT</a></li>
      <!-- <li class="rubrique"><a class="lien-rubrique" href="index.php#reservation">DEMANDE DE RESERVATION</a></li> -->
      <!-- <li class="rubrique"><a class="lien-rubrique" href="index.php#mysect6">MENU ITEM 6</a></li> -->
      <li class="rubrique">
              <?php
              if(isset($_SESSION['id'])) {
                  echo '<a class="lien-rubrique" href="accueil.php">MON COMPTE</a>';
              }
              else {
                  echo '<a class="lien-rubrique" href="enregistrement.php">SE CONNECTER</a>';
              }
              ?>

          </a></li>
    </ul>
    <div class="menuSandwich"><img src="assets/img/menu-sandwich.png" alt="menu" title="menu"></div>
  </div>
</nav>
