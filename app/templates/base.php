<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title><?= $title ?></title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>public/css/style.css">
</head>
<body>
	<header>
	<h1>LOREM BACON</h1>
	<div class="top" >
		<div class="login">
			<a>LOGIN</a>
		</div>
		<div class="pub" >
			<p>Votre PUB ICI !!!!!!</p>
		</div>
			<form action="" method="post" class="search">
				<input type="text" name="recherche" placeholder="Saisissez votre recherche ici">
				<input type="submit" name="form" value="Rechercher">
			</form>
	</div>
	</header>
	<div class="middle">
		<nav>
			<a href="<?=BASE_URL?>">Home</a>
			<a href="<?=BASE_URL?>/toprated">Top rated</a>
		</nav>
		<div class="container">
			<?php //include le fichier spécifié à la fin des méthodes de contrôleurs ?>
			<?php include("app/templates/$page.php") ?>
		</div>
		<aside>
			<h2>TOP RATED</h2>
				<ul>
					<?php foreach($movies as $movie): ?>
					<li>
						<a href="<?=BASE_URL?>movieDetails?id=<?= $movie->getId()?>"><?= $movie->getTitle()?></a>
					</li>
					<?php endforeach; ?>
				</ul>
		</aside>
	</div>
	<footer>
		<h2>footer</h2>
	</footer>
</body>
</html>