<?php
require_once("header.php");
require_once("./config/connexion.php");
require_once("./model/bdd.php");
require_once("./model/mail.php");

require_once('./redirection.php');


// On définit la variable idResa en récupérant l'id de accueil.php
$idResa = @(int) $_GET['idResa'];


// on vérifie que l'id de réservation est bien passé
if($idResa > 0) {
// on envoie le mail qui va chercher les infos de la réservation en bdd pour le mettre dans le corps du message

    echo mailReservation($bdd, 'annulation', $idResa);


// on supprime la réservation une fois le mail envoyé
supprimerReservation($bdd, $idResa);

header('Location:accueil.php?supprResa=1');

// pas besoin vu que l'on redirige la page
//require_once("footer.php");
}
else {
    echo "La réservation n'existe pas";
}
 ?>
