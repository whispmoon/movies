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
			<h2>login</h2>
		</div>
		<div class="pub" >
			<h2>Pub</h2>
		</div>
		<div class="search" >
			<h2>search</h2>
		</div>
	</div>
	</header>
	<div class="middle" >
		<nav>
			<h2>nav</h2>
		</nav>
		<div class="container">

			<?php //include le fichier spécifié à la fin des méthodes de contrôleurs ?>
			<?php include("app/templates/$page.php") ?>
		
		</div>
		<aside>
			<h2>TOP RATED</h2>
				<ul>
					<?php foreach($movies as $movie): 
					if($movie->getRating() > 8.5){ ?>
					<li>
						<a href="<?=BASE_URL?>details?id=<?= $movie->getId()?>"><?= $movie->getTitle()?></a>
					</li>
					<?php }endforeach; ?>
				</ul>
		</aside>
	</div>
	<footer>
		<h2>footer</h2>
	</footer>
</body>
</html>