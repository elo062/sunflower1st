<?php
// On se connecte à la bdd
require_once("./config/connexion.php");
require_once("./model/bdd.php");
require_once("./model/mail.php");

require_once('./redirection.php');


// On récupère l'id de la résa de la page updateResa.php
// @ permet de ne pas afficher d'erreur si l'id de résa n'est pas passée dans l'url
$idResa = @(int) $_GET['idResa'];

// on vérifie que l'id de réservation est bien passé
if($idResa > 0) {
    // On déclare les variables
    $dateResa = $_POST['dateResa'];
    $lieu = $_POST['lieu'];
    $duree = $_POST['duree'];
    $message = $_POST['message'];

    updateReservation($bdd, $dateResa, $duree, $lieu, $message, $idResa);

    echo mailReservation($bdd, 'modification', $idResa);
// Redirection vers la page accueil.php
//    header('Location:accueil.php?modifResa=1');
}
else {
  echo "La réservation n'existe pas";
}


?>
