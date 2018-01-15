<?php
require_once ("header.php");

include('traitementCreerCompte.php');
?>
<div class="texte">
    <form action="" method="post" >
      <h1>Créer un compte</h1>
        <p>Vous en avez déjà un ?</p>
        <p><i class="fa fa-arrow-down" aria-hidden="true"></i></p>
        <p class="connection"><a href="login.php">Connectez-vous</a></p>
          <div class="formulaire">
            <p><label for="nom"><strong>Nom :<strong></label>
               <input type="text" name="nom" maxlength="40" id="nom" class="champ" value="<?php echo $nom; ?>" required/>
             </p>
             <p><label for="prenom"><strong>Prénom :<strong></label>
               <input type="text" name="prenom" maxlength="40" id="prenom" class="champ"  value="<?php echo $prenom; ?>" required/>
            </p>
              <p><label for="adresse"><strong>Adresse :<strong></label>
                <input type="text" name="adresse" maxlength="255" id="adresse" class="champ"  value="<?php echo $adresse; ?>"   required/>
              </p>
            <p><label for="tel"><strong>Téléphone :<strong></label>
                <input type="tel" name="tel" maxlength="10" id="tel" class="champ" value="<?php echo $tel; ?>"  required/>
            </p>
            <p><label for="email"><strong>Adresse mail :<strong></label>
               <input type="email" name="email" maxlength="40" id="email" class="champ"  value="<?php echo $email; ?>"  required/>
            </p>
             <p><label for="password"><strong>Mot de passe :<strong></label>
               <input type="password" name="password" id="password" maxlength="14" class="champ" required/></p>

             <p><label for="password"><strong>Vérification du mot de passe :<strong></label>
               <input type="password" name="password" maxlength="14" id="vpassword" class="champ" required/></p>
          </div>
          <div id="erreur">
            <p>Vous n'avez pas rempli correctement les champs du formulaire !</p>
          </div>
          <p><input type="submit" name="envoyer" value="Envoyer" class="button" id="envoi"></p>
      </form>
  </div>






<?php require_once ("footer.php"); ?>
