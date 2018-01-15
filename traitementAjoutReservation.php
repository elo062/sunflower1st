<?php
// On se connecte à la bdd
require_once("./config/connexion.php");
require_once("./model/bdd.php");
require_once('./redirection.php');


// On récupère l'id de la résa de la page updateResa.php
// @ permet de ne pas afficher d'erreur si l'id de résa n'est pas passée dans l'url
$idResa = @(int)$_GET['id'];

if ($idResa > 0) {
    $date = $_POST['dateResa'];
    $duree = $_POST['duree'];
    $lieu = $_POST['lieu'];
    $message = $_POST['message'];
    $id_user = $_POST['id_user'];


    try {
        $dateDisponible = dateDisponible($bdd, $date);

        if ($dateDisponible == false) {
            $erreur = "Date non disponible, veuillez en sélectionner une autre.";
        } else {
            // on insère la réservation et on récupère son id nouvellement créé
            $idResa = insertReservation($bdd, $date, $duree, $lieu, $message, $id_user);

            require_once('model/mail.php');
            mailReservation($bdd, 'Ajout', $idResa);

            header('Location:accueil.php?modifResa=1');
        }

    } catch (Exception $e) {
        $erreur = 'La base de donnée rencontre un problème, merci de nous en informer via le formulaire de contact.';
    }
}
else {
    header('Location:accueil.php');
}
?>
