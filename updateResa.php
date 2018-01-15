<?php
require_once("header.php");
require_once("./config/connexion.php");
require_once("model/bdd.php");
require_once('redirection.php');

// On définit la variable $idResa en récupérant le ? idResa = de la boucle foreach accueil.php
// @ permet de ne pas afficher d'erreur si l'id de résa n'est pas passée dans l'url
$idResa = @$_GET['idResa'];

$idUser = $_SESSION['id'];


$utilisateurACetteReservation = verifResaUtilisateur($bdd, $idResa, $idUser);
if ($utilisateurACetteReservation == false) {
    echo "<div class='false'>Cette réservation ne vous appartient pas.</div>";
} else {
    $dateResaNonDispo = getListeDateReservationNonDisponible($bdd);
    $reservation = getReservationById($bdd, $idResa);

    // On exécute la requête

    // formulaire permettant de modifier une résa
    echo '<div class="texte">
<h4>Modification de la réservation</h4>
      <form method="post" action="traitementModificationReservation.php?idResa=' . $idResa . '">
        <p>
          <label for="date">Date de l\'événement :</label>
          <input type="text" name="dateResa"  value="' . $reservation["dateResaFr"] . '"/>
          <br />
          <label for="lieu">Lieu de l\'événement :</label>
          <input type="text" name="lieu"  value="' . $reservation["lieu"] . '"/>
          <br />
          <label for="duree">Durée (exprimée en heures) :</label>
          <input type="number" name="duree" placeholder="Ex : 2" size="2" value="' . $reservation["duree"] . '"/>
          <br />
          <label for="message">Message :</label>
          <textarea name="message" rows="10" cols="50">' . $reservation["message"] . '</textarea>
          <br />
        </p>
        <input type="submit" name="envoyer" value="Envoyer" class="button">
      </form>
    </div>";

};

require_once("footer.php");
?>

