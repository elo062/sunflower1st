<?php
require_once("header.php");
require_once("./config/connexion.php");
require_once("bdd.php");

// On définit la variable $idResa en récupérant le ? idResa = de la boucle foreach accueil.php
$idResa = $_GET['idResa'];
$idUser = $_SESSION['id'];


$utilisateurACetteReservation = verifResaUtilisateur($bdd, $idResa, $idUser);
if ($utilisateurACetteReservation == false) {
    echo "<div class='texte'>Cette réservation ne vous appartient pas.</div>";
} else {
    $dateResaNonDispo = getListeDateReservationNonDisponible($bdd);
    $reservation = getReservationById($bdd, $idResa);

    // On exécute la requête

    // formulaire permettant de modifier une résa
    echo "<div class='texte'>
      <form method='post' action='traitementUpdateResa.php?idResa=" . $idResa . "' enctype='multipart/form-data'>
        <p>
          <label for='date'>Modifiez la date de l'événement :</label>
          <input type='text' name='dateResa'  value='" . $reservation['dateResaFr'] . "'/>
          <br />
          <label for='lieu'>Modifiez le lieu de l'événement :</label>
          <input type='text' name='lieu'  value='" . $reservation['lieu'] . "'/>
          <br />
          <label for='duree'>Modifiez sa durée (exprimée en heures) :</label>
          <input type='number' name='duree' placeholder='Ex : 2' size='2' value='" . $reservation['duree'] . "'/>
          <br />
          <label for='message'>Modifiez le message :</label>
          <input type='text' name='message'  value='" . $reservation['message'] . "'/>
          <br />
        </p>
        <input type='submit' name='envoyer' value='Envoyer' class='button'>
      </form>
    </div>";

};

require_once("footer.php");
?>

