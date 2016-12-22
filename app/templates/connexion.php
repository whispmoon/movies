<?php
	


	//si le form est soumis...
	if (!empty($_POST)){
		//on va chercher le user en fonction du pseudo ou de l'email
		$sql = "SELECT * FROM users 
				WHERE username = :usernameOrEmail 
				OR email = :usernameOrEmail";

		//...

		//hash le mot de passe
		if (password_verify($_POST['password'], $user->getPassword())){
			//connectez l'user en stockant une ou des infos dans la session. On vérifiera ces infos sur les pages à sécuriser.
			$_SESSION['user'] = $user;

			//$_COOKIE pour la lecture
			//on stocke le token dans un cookie
			setcookie("remember_me", $user->getToken(), time() + 3600, "/");
		}

	}

?>


		<form method="POST">
			<div>
				<label for="usernameOrEmail">Pseudo ou email</label>
				<input type="text" name="usernameOrEmail" id="usernameOrEmail" value="">
			</div>
			<div>
				<label for="password">Mot de passe</label>
				<input type="password" name="password" id="password" value="">
			</div>
			<div>
				<button type="submit">M'inscrire !</button>
			</div>
		</form>

	