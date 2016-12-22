<?php

	
	//efface la donnée qui permet d'identifier l'utilisateur
	unset($_SESSION['user']);
	
	//redirige ailleurs
	header("Location: accueil.php");


?>

http://localhost/site/password-recovery?token=fjdaskfsfds&email=son@email.com