<?php
require_once ("header.php");
require_once("./config/connexion.php");
require_once("./model/bdd.php");


$connecte = false;
$email = "";

if(isset($_POST['email'])) {

    $email = $_POST['email'];
    $password = sha1($_POST['mdp']);

    $result = getUtilisateurByEmail($bdd, $email);
    $hash = $result['password']; // Password chiffré en base

// On vérifie qu'il s'agit des bonnes données
    if($password == $hash){
        $_SESSION['client'] = true ;
        $_SESSION['id'] = $result['id'];
        $_SESSION['email'] = $email;
        $_SESSION['tel'] = $result['tel'];

        $_SESSION['nom'] = $result['nom'];
        $_SESSION['prenom'] = $result['prenom'];

        $connecte = true;

        header("Location:accueil.php");
    } else {
        // Si le mot de passe est invalide on le redirige vers la page de connexion
        echo "<div class='texte'><div class='false'>Le mot de passe est invalide !</div></div><br />";

    }
}
// on affiche le formulaire de connexion si l'utilisateur n'est pas connecté
if($connecte == false) {
?>

    <div class="container">
    	<section id="content">
    		<form action=""  method="post">
                <h1>Connexion</h1>
    			<div>
                    <input type="email" placeholder="Email" name="email" id="username" value="<?php echo $email; ?>">
    			</div>
    			<div>
    				<input type="password" placeholder="Mot de passe" name="mdp" required="" id="password" />
    			</div>
    			<div>
    				<input type="submit" value="Se connecter" class="button" />
    			</div>
    		</form><!-- form -->
    	</section><!-- content -->
    </div><!-- container -->

<?php
}
?>
<?php require_once ("footer.php"); ?>
