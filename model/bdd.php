<?php

// retourne true ou false pour savoir si l'utilisateur a bien cette réservation
function verifResaUtilisateur($bdd, $idResa, $idUser)
{
// On vérifie que la résa appartient à l'user pour qu'il ne puisse pas modifier celle d'un autre
    $requete = $bdd->prepare('SELECT COUNT(id) AS nombreResa FROM reservation WHERE id = :id_resa AND id_utilisateur = :id_user');
    // :id_resa est inventé ici, il doit crspdre au 1er paramètre de bindParam
    $requete->bindParam(':id_resa', $idResa);
    $requete->bindParam(':id_user', $idUser);
    $requete->execute();
    $nbResaUtilisateur = $requete->fetch(PDO::FETCH_COLUMN);

    if($nbResaUtilisateur == 0) {
        return false;
    }
    else {
        return true;
    }
}

function getListeDateReservationNonDisponible($bdd) {
    // on récupère la liste des dates non disponibles
    $requete = $bdd->prepare('SELECT DATE_FORMAT(dateResa,"%d-%m-%Y") FROM reservation');
    $requete->execute();

    $dateResaNonDispo = $requete->fetchAll(PDO::FETCH_COLUMN);

    return $dateResaNonDispo;
}

// fonction parce qu'elle retourne
function getReservationById($bdd, $idResa) {
    // On sélectionne la résa à modifier :
    $requete = $bdd->prepare('SELECT *, DATE_FORMAT(reservation.dateResa, "%d-%m-%Y") as dateResaFr FROM reservation WHERE id = :id_resa'); // :id_resa est inventé ici, il doit crspdre au 1er paramètre de bindParam
    $requete->bindParam(':id_resa', $idResa);
    $requete->execute();
    $reservation =  $requete->fetch();
// On fait un return car on veut récupèrer les infos de la réservation de la bdd
    return $reservation;
}

// procédure car elle ne retourne rien
function updateReservation($bdd, $dateResa, $duree, $lieu, $message, $idResa) {
    // On modifie les entrées dans la table reservation
    $req = $bdd->prepare('UPDATE `reservation` SET `dateResa` = :dateResa, `lieu` = :lieu, `duree` = :duree, `message` = :message WHERE `reservation`.`id` = :id_resa');

    $req->bindValue(':dateResa', date('Y-m-d', strtotime($dateResa)));
    $req->bindParam(':duree' , $duree);
// permet d'éviter l'insertion de code malfaisant
    $req->bindValue( ':lieu' , htmlspecialchars($lieu));
    $req->bindValue( ':message' , htmlspecialchars($message));
    $req->bindParam( ':id_resa' , $idResa);

    $req->execute();
    // on ne retourne rien car on veut juste envoyer les informations en bdd
}

function getLstAllReservationsByUser($bdd, $idUser) {
    // faire une requete préparée
    // On récupère tout le contenu de la table user
    $reponse = $bdd->query('SELECT *, DATE_FORMAT(reservation.dateResa, "%d-%m-%Y") as dateResaFr FROM reservation
  WHERE reservation.id_utilisateur = "'.$idUser.'"
  ORDER BY reservation.id DESC
  ');
    $reservations = $reponse;

    return $reservations;
}

function getUtilisateurByEmail($bdd, $email) {
    // On récupère toutes les infos de la table user
    $req = $bdd->prepare('SELECT id, password, prenom, nom, tel FROM user WHERE email= :email');
    // bindParam : à faire
    $req->execute(array('email'=>$email));
    $result = $req->fetch(PDO::FETCH_ASSOC);

    return $result;
}

// retourne true ou false si la date de réservation est disponible
function dateDisponible($bdd, $date) {
    $req = $bdd->prepare('SELECT COUNT(id) AS dateResaBdd FROM `reservation` WHERE `dateResa` = :dateResa ');
    // bindParam à faire
    $req->execute(array(
        'dateResa' => date('Y-m-d', strtotime($date))
    ));

    $dateResa = $req->fetch(PDO::FETCH_COLUMN);


// On envoie un message d'erreur si la date est déjà prise :
    if($dateResa > 1){
       return false;
    }
    else {
        return true;
    }

}

function insertReservation($bdd, $date, $duree, $lieu, $message, $id_user) {
    // On insère la réservation en bdd
    $req = $bdd->prepare('INSERT INTO reservation(dateResa, duree, lieu, message, id_utilisateur) VALUES(:dateResa, :duree, :lieu, :message, :id_utilisateur)');
    $req->bindValue(':dateResa', date('Y-m-d', strtotime($date)));
    $req->bindParam(	':duree' , $duree);
    $req->bindParam(	':id_utilisateur' , $id_user);
// permet d'éviter l'insertion de code malfaisant
    $req->bindValue( ':lieu' , htmlspecialchars($lieu));
    $req->bindValue( ':message' , htmlspecialchars($message));
    $req->execute();

    return $bdd->lastInsertId();

}

function insertUtilisateur($bdd, $nom, $prenom, $adresse, $tel, $email, $mdp) {

    /*Si le pseudo est libre et l'email valide, alors on enregistre le nouveau membre*/
    $req = $bdd->prepare('INSERT INTO user(nom, prenom, adresse, tel, email, password) VALUES(:nom, :prenom, :adresse, :tel, :email, :password)');
    $req->bindParam(':nom', $nom);
    $req->bindParam(':prenom', $prenom);
    $req->bindParam(':adresse', $adresse);
    $req->bindParam(':tel', $tel);
    $req->bindParam(':email', $email);
    $req->bindParam(':password', $mdp);
    $req->execute();
}

function supprimerReservation($bdd, $idResa) {

// On entre dans le champ id-resa de la bdd pour supprimer l'id de la résa:
    $requete = $bdd->prepare('DELETE FROM `reservation` WHERE id = :id');
    $requete->bindParam(':id', $idResa);
    $requete->execute();
}