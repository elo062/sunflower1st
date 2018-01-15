<?php
require_once("header.php");
require_once("./config/connexion.php");
require_once("bdd.php");

// On définit la variable $idResa en récupérant le ? idResa = de la boucle foreach accueil.php
$idResa = $_GET['idResa'];
$idUser = $_SESSION['id'];


$utilisateurACetteReservation = verifResaUtilisateur($bdd, $idResa, $idUser);
if ($utilisateurACetteReservation == false) {
    echo "<div class='false'>Cette réservation ne vous appartient pas.</div>";
} else {
    $dateResaNonDispo = getListeDateReservationNonDisponible($bdd);
    $reservation = getReservationById($bdd, $idResa);

    // On exécute la requête

    // formulaire permettant de modifier une résa
    echo "<div class='texte formulaire'>
      <form method='post' action='traitementUpdateResa.php?idResa=" . $idResa . "' enctype='multipart/form-data'>
        <p>
          <label for='date'>Modifiez la date de l'événement :</label>
          <input type='text' name='dateResa'  value='" . $reservation['dateResaFr'] . "'/>
          </p>
          <p><label for='lieu'>Modifiez le lieu de l'événement :</label>
          <input type='text' name='lieu'  value='" . $reservation['lieu'] . "'/>
          </p>
          <p><label for='duree'>Modifiez sa durée (en heures) :</label>
          <input type='number' name='duree' placeholder='Ex : 2' size='2' value='" . $reservation['duree'] . "'/>
          </p>
        <p>  <label for='message'>Modifiez le message :</label>
          <input type='text' name='message'  value='" . $reservation['message'] . "'/>
          </p>

        <input type='submit' name='envoyer' value='Envoyer' class='button'>
      </form>
    </div>";

};

require_once("footer.php");
?>
