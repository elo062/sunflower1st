<?php
// On se connecte à la bdd
require_once("./config/connexion.php");
require_once("./bdd.php");

// On déclare les variables
$dateResa = $_POST['dateResa'];
$lieu = $_POST['lieu'];
$duree = $_POST['duree'];
$message = $_POST['message'];
// On récupère l'id de la résa de la page updateResa.php
$idResa = $_GET['idResa'];

updateReservation($bdd, $dateResa, $duree, $lieu, $message, $idResa);

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
$mail->Subject = htmlspecialchars('Modification réservation');

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
  echo "<div class='ok'>Message envoyé !</div>";
}

// Redirection vers la page accueil.php
header('Location:accueil.php?modifResa=1');
?>
