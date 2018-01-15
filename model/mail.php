<?php

// Envoi du mail pour prévenir qu'il y a une résa :
require_once('PHPMailer/PHPMailerAutoload.php');



function getConfig()
{


    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';

    $mail->Port = 465;

//Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'ssl';

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
//Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    // on va chercher les informations du compte gmail pour pouvoir envoyer le mail

    // parse_ini_file() permet de renvouyer sous forme de tableau les données
    $gmail = parse_ini_file('config/mail.ini');

//Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = $gmail['email'];
//Password to use for SMTP authentication
    $mail->Password = $gmail['password'];

// Expéditeur
    $mail->SetFrom("sunflower.groupe@gmail.com", "Sunflower.fr");
// Destinataire
    $mail->AddAddress('sunflower.groupe@gmail.com', 'Sunflower.fr');


    // pour les accents
    $mail->CharSet = "UTF-8";

    return $mail;
}

function mailReservation($bdd, $type, $idResa)
{

    $mail = getConfig();

// Objet
    if ($type == "annulation") {
        $objet = "Annulation réservation";
        $phrase = "annulé une réservation.";
    } else if ($type == "ajout") {
        $objet = "Demande de réservation";
        $phrase = "Demandé une réservation.";
    } else if ($type == "modification") {
        $objet = "Modification de réservation";
        $phrase = "modifié la réservation.";
    }
    $mail->Subject = $objet;


    // on va chercher la réservation en base de données pour la mettre dans le message du mail
    $reservation = getReservationById($bdd, $idResa);


    if (is_null($reservation)) {
        return "Erreur : la réservation n'existe pas";
    }


    // ajout du logo dans le mail
    $mail->AddEmbeddedImage('assets/img/sunflower-logo1.png', 'logo');


    // on va chercher le contenu de la page contentMail dans une chaine de caractère

    $mail_content = file_get_contents('contentMail.php');

    // on remplace les variables entre % dans la page

    $mail_content = str_replace('%phrase', $phrase, $mail_content);

    // informations du contact
    $mail_content = str_replace('%nom%', ucfirst($_SESSION['nom']), $mail_content);
    $mail_content = str_replace('%prenom%', ucfirst($_SESSION['prenom']), $mail_content);
    $mail_content = str_replace('%tel%', chunk_split($_SESSION['tel'],2,"."), $mail_content);
    $mail_content = str_replace('%email%', $_SESSION['email'], $mail_content);

    // informations de la réservation

    $mail_content = str_replace('%date%', $reservation["dateResaFr"], $mail_content);
    $mail_content = str_replace('%lieu%', $reservation['lieu'], $mail_content);
    $mail_content = str_replace('%duree%', $reservation['duree'], $mail_content);
    $mail_content = str_replace('%message%', $reservation['message'], $mail_content);

    $mail->msgHTML($mail_content);

// Envoi du mail avec gestion des erreurs
    if (!$mail->Send()) {
        return 'Erreur : ' . $mail->ErrorInfo;
    } else {
        return 'Message envoyé !';
    }

}