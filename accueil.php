<?php
require_once('header.php');
require_once('config/connexion.php');
require_once('bdd.php');
// si l'utilisateur est connecté on affiche l'accueil
if (isset($_SESSION['id'])) {
    $information = "";

    if(isset($_GET['supprResa'])) {
        $information =   "<div class='ok'>Votre réservation a bien été supprimée.</div>";
    }
    if(isset($_GET['modifResa'])) {
        $information =   "<div class='ok'>Votre réservation a bien été modifiée.</div>";
    }
    if(isset($_GET['inscription'])) {
        $information =  "<div class='ok'>Merci de votre inscription</div>";
    }
    $erreur = "";
    if(isset($_POST["ajoutReservation"])) {
        include('traitementResa.php');
        $information =  "<div class='ok'>Nous avons bien reçu votre demande de réservation.</div>";
    }

    ?>
    <!--    On prévient le visiteur qu'il est bien connecté-->
    <div class='texte'>Bienvenue <?php echo $_SESSION['prenom'] ?> !<br/></div>
    <!--// On lui donne la possibilité de réserver une nouvelle date-->

    <div class='reservations'><a href='deconnexion.php'><input type='submit' value='Se déconnecter' class='button'></a></div>
    <?php echo $erreur; ?>
    <?php echo $information; ?>
    <h4 class='reservations'>Ajouter une réservation :</h4>
    <div class='reservations formulaire'>

        <form action="" method="post" >
            <!-- On récupère l'id_user pour la page traitementResa.php -->
            <input type="hidden" name="id_user" value="<?php echo $_SESSION['id']; ?>"/>
            <?php
            // On récupère le message d'erreur de la page traitementResa.php si la date est déjà réservée
            if (isset($_GET['message'])) {
                if ($_GET['message'] == 'erreurDate') {
                    echo "<div class='false'>La date choisie est déjà prise, merci d'en choisir une autre.</div></br>";
                }
            }

            require_once("./config/connexion.php");
            require_once("./bdd.php");


            $dateResaNonDispo = getListeDateReservationNonDisponible($bdd);
            ?>
            <p><label for="date">Date de l'événement : </label><input type="text" name="dateResa"
                                                                      placeholder="jj/mm/aaaa" class="champ" required/>
            </p>
            <p><label for="duree">Durée de l'animation :</label><input type="number" name="duree"
                                                                       placeholder="en heures" class="champ" required/>
            </p>
            <p><label for="lieu">Lieu de l'animation :</label><input type="text" name="lieu" class="champ" required/>
            </p>
            <p><label for="message">Remarques :</label><textarea name="message" cols="40" rows="4" maxlength="250"
                                                                 placeholder="250 caractères max."/></textarea></p>
            <!--Envoyer la résa-->
            <p><input type="submit" value="Envoyer" name="ajoutReservation" class="button"/></p>
        </form>
    </div>
    <!--// Ou bien de consulter ses réservations-->
    <h4 class='reservations'>Mes réservations :</h4>
    <?php
    $reservations = getLstAllReservationsByUser($bdd, $_SESSION['id']);

    // On parcourt le tableau avec la boucle foreach pour afficher toutes les réservations :
    foreach ($reservations as $reservation) {
        echo "<p class='reservations'>Date : " . $reservation['dateResaFr'] . "</p>";
        echo "<p class='reservations'>Lieu : " . $reservation['lieu'] . "</p>";
        echo "<p class='reservations'>Durée : " . $reservation['duree'] . " heure(s) </p>";
        echo "<p class='reservations'>Message : " . $reservation['message'] . " </p>";
        echo "<p class='reservations'><a href='updateResa.php?idResa=" . $reservation['id'] . "'><input type='submit' value='Modifier' class='button' name='idResa'></a>";
        // Lorsqu'on clique sur "annuler" on récupère l'id de la résa et on est redirigé vers la page supprimerResa.php pour le traitement
        echo "<a href='supprimerResa.php?idResa=" . $reservation['id'] . "&idUser=" . $reservation['id_utilisateur'] . "'><input type='submit' value='Annuler' class='button' name='idResa'></a></p>";
        echo "<hr>";
    }

    require_once('footer.php');
} else {
    // sinon on le redirige vers la page de login
    header('Location:login.php');
}
