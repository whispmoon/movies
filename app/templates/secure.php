<?php

	//page sécurisée
	session_start();

	//l'utilisateur n'est pas connecté
	if (empty($_SESSION['user'])){
		header("Location: connexion.php");
		die();
	}
	//connecté, mais n'a pas le bon rôle
	if ($_SESSION['user']->getRole() != "admin"){
		header("Location: connexion.php");
		die();
	}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Page sécurisée</title>
</head>
<body>
	<div class="container">
		<?php include("nav.php"); ?>
		Page sécurisée

	</div>
</body>
</html>