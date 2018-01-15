<!DOCTYPE html>
<html lang="fr">
<head>
    <style type="text/css">

        .footer, .header {
            background: rgba(000, 000, 000, 0.7);
            width: 100%;
            color: white;

        }

        .content, .footer, .header {
            padding: 20px;

        }

        .content {
            line-height: 1.3em;
        }

        .content h4 {
            border-bottom: 2px black solid;
        }

        .informationContact > span, .informationReservation > span{
            display: block;
        }

        .content .contact {
            color: #ffd700;
        }

        .email {
            color: #ffbf00;
        }


    </style>

</head>

<!-- Start horizontal navigation -->


<body style="font-family: 'Verdana', sans-serif;font-size: 20px;">
<div class="header">
    <img src="cid:logo" alt="logo sunflower" title="Accueil" id="logo">
    <span>Le site de Sunflower vous informe.</span>

</div>
<div class="content">
    <span class="contact">%nom% %prenom%</span> a %verbe% une réservation.

    <div class="informationContact">
        <h4>Informations de l'utilisateur</h4>
        <span>Email : <a class="email" href="email@gmail.com">%email%</a></span>
        <span>Téléphone : <span class="telephone">%tel%</span></span>
    </div>
    <div class="informationReservation">
        <h4>Informations de la réservation</h4>
        <span>Date : %date%</span>
        <span>Lieu : %lieu%</span>
        <span>Durée : %duree% heure(s)</span>
        <span>Message : %message%</span>
    </div>
</div>
<div class="footer">
    <span>A bientôt sur le site de Sunflower.</span>
</div>

</body>

