<?php
require_once ("header.php");

echo "<div class='centre'>Vous êtes maintenant déconnecté(e).</div>";
echo "<div class='reservations'><div class='button'><a href='login.php'>Se connecter</a></div></div>";

require_once ("footer.php");
session_destroy();
?>
