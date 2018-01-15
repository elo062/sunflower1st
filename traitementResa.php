<?php
// On se connecte à la bdd
require_once("./config/connexion.php");
require_once("bdd.php");

$date = $_POST['dateResa'];
$duree = $_POST['duree'];
$lieu = $_POST['lieu'];
$message = $_POST['message'];
$id_user = $_POST['id_user'];
// $idResa = $_GET['id'];


try{
	$dateDisponible = dateDisponible($bdd, $date);

	if($dateDisponible == false) {
        $erreur = "<div class='false'>Date non disponible, veuillez en sélectionner une autre.</div>";
    }
    else {
        insertReservation($bdd, $date, $duree, $lieu, $message, $id_user);

        // Envoi du mail pour prévenir qu'il y a une résa :
        require('PHPMailer/class.phpmailer.php');

        $mail = new PHPMailer();
        $mail->Host = 'smtp.editionweb.fr';
        $mail->SMTPAuth   = false;
        $mail->Port = 25; // Par défaut

        // Expéditeur
        $mail->SetFrom($_SESSION['email'], $_SESSION['nom']);
        // Destinataire
        $mail->AddAddress('eloisemecozzi@gmail.com', 'Administrateur');
        // Objet
        $mail->Subject = htmlspecialchars('Nouvelle réservation');

        // Votre message
        $msg='Nom :'.$_SESSION['nom'].'<br />
        Lieu :'.$lieu.'<br />
        Date de la réservation :'.$date.'<br />
        Durée : '.$duree.'<br />
        Message : '.$message.'<br />';
        $mail->MsgHTML($msg);

        // Envoi du mail avec gestion des erreurs
        if(!$mail->Send()) {
            echo 'Erreur : ' . $mail->ErrorInfo;
        } else {
            echo "<div class='ok'></div>";
        }

    }

}
catch (Exception $e) {
    $erreur=  'La base de donnée rencontre un problème, merci de nous en informer via le formulaire de contact.';
}

?>
