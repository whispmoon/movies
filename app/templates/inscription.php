<?php

	require("vendor/autoload.php");

	if (!empty($_POST)){

		//attention aux XSS ici 
		$username = strip_tags($_POST['username']);
		$email = $_POST['email'];
		$plainPassword = $_POST['password'];
		$passwordBis = $_POST['password_bis'];

		//s'assurer que tous les champs sont remplis
		//...

		//s'assurer que les 2 mdp concordent
		if ($plainPassword != $passwordBis){
			$error = "les mdps ne concordent pas";
		}

		//email avec filter_var($email, FILTER_VALIDATE_EMAIL);

		//hache le mdp
		$passwordHash = password_hash($plainPassword, PASSWORD_DEFAULT);

		//rôle par défaut
		$role = "user";

		//génère une chaîne réellement aléatoire
		$factory = new \RandomLib\Factory;
		$generator = $factory->getGenerator(new \SecurityLib\Strength(\SecurityLib\Strength::MEDIUM));
		$token = $generator->generateString(32, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

		echo $token;
		//stocker cette token avec le user...


	}

?>

		<form method="POST">
			<div>
				<label for="username">Pseudo</label>
				<input type="text" name="username" id="username" value="">
			</div>
			<div>
				<label for="email">Email</label>
				<input type="email" name="email" id="email" value="">
			</div>
			<div>
				<label for="password">Mot de passe</label>
				<input type="password" name="password" id="password" value="">
			</div>
			<div>
				<label for="password_bis">Mot de passe encore</label>
				<input type="password" name="password_bis" id="password_bis" value="">
			</div>
			<div>
				<button type="submit">M'inscrire !</button>
			</div>
		</form>

	