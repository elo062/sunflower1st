<?php
require_once("header.php");
if (empty($_SESSION['id'])) //les membres connecte ne peuvent pas s'inscrire
{
    $nom = "";
    $prenom ="";
    $adresse = "";
    $tel = "";
    $email = "";
    // si on a appuyé sur le bouton valider
    if(isset($_POST["envoyer"])) {
        /* il faut que toutes les variables du formulaires existent et sont remplies*/
        if (
            isset($_POST['nom']) && !empty($_POST['nom']) &&
            isset($_POST['prenom']) && !empty($_POST['prenom']) &&
            isset($_POST['adresse']) && !empty($_POST['adresse']) &&
            isset($_POST['tel']) && !empty($_POST['tel']) &&
            isset($_POST['email']) && !empty($_POST['email']) &&
            isset($_POST['password']) && !empty($_POST['password'])
        ) {


            /* on teste l'adresse email, si c'est bon, on continue, sinon, on affiche un message d'erreur*/
            if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}.[a-z]{2,4}$#", $_POST['email'])) {
                // On se connecte à la bdd
                require_once("./config/connexion.php");
                require_once("bdd.php");
                //  /*on verifie si un membre ne possede pas deja le meme pseudo*/
                //     $req = $bdd->prepare('SELECT membre_id FROM membres WHERE membre_pseudo = :membre_pseudo');
                //     $req->execute(array('membre_pseudo'=> $_POST['membre_pseudo']));
                //     $nb_resultats_recherche_membre=$req->fetch();
                //
                //     if(!$nb_resultats_recherche_membre) /*si il n'y a pas de resultat*/
                //     {
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $adresse = $_POST['adresse'];
                $tel = $_POST['tel'];
                $email = $_POST['email'];
                /*on crypte le mot de passe*/
                $mdp = sha1($_POST['password']);


                // on fait une requête pour savoir si l'adresse mail n'existe pas déjà en bdd
                $emailExistant = getUtilisateurByEmail($bdd, $email);

                //s'il n'est pas vide
                if (!empty($emailExistant)) {
                    // on affiche l'erreur
                    echo "Compte déjà existant. Veuillez vous connecter ou inscrire une adresse mail différente";
                } // s'il est vide ça veut dire que l'on ne l'a pas trouvé en bdd
                else {
                    insertUtilisateur($bdd, $nom, $prenom, $adresse, $tel, $email, $mdp);

                    // On vérifie qu'il s'agit des bonnes données

                    $_SESSION['client'] = true;
                    $_SESSION['id'] = $bdd->lastInsertId();
                    $_SESSION['email'] = $email;
                    $_SESSION['nom'] = $nom;
                    $_SESSION['prenom'] = $prenom;

                    header('Location:accueil.php?inscription=1');
                }


            } else {
                echo "Votre adresse email n'est pas valide";
            }
        } else {
            echo "Il faut remplir tous les champs";
        }
    }


} else {
    header('Location:accueil.php');
}


?>
