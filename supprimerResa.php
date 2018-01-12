<?php
require_once("header.php");
require_once("./config/connexion.php");
require_once("bdd.php");

// On définit la variable idResa en récupérant l'id de accueil.php
$idResa = $_GET['idResa'];

$dateResa = $_POST['dateResa'];
$lieu = $_POST['lieu'];
$duree = $_POST['duree'];
$message = $_POST['message'];

supprimerReservation($bdd, $idResa);


// Envoi du mail pour prévenir qu'il y a une résa :
require('PHPMailer/class.phpmailer.php');

$mail = new PHPMailer();
$mail->Host = 'smtp.domaine.fr';
$mail->SMTPAuth   = false;
$mail->Port = 25; // Par défaut

// Expéditeur
$mail->SetFrom($_SESSION['email'], $_SESSION['nom']);
// Destinataire
$mail->AddAddress('eloisemecozzi@gmail.com', 'Administrateur');
// Objet
$mail->Subject = htmlspecialchars('Annulation réservation');

// Votre message
$msg='Nom :'.$_SESSION['nom'].'<br />
Lieu :'.$lieu.'<br />
Date de la réservation :'.$dateResa.'<br />
Durée : '.$duree.'<br />
Message : '.$message.'<br />
ID Résa : '.$idResa.'<br /><br />';
$mail->MsgHTML($msg);

// Envoi du mail avec gestion des erreurs
if(!$mail->Send()) {
    echo 'Erreur : ' . $mail->ErrorInfo;
} else {
    echo 'Message envoyé !';
}



header('Location:accueil.php?supprResa=1');


require_once("footer.php");
 ?>
