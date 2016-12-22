<h1>Bienvenue sur Lorem Bacon !</h1>


    <?php foreach($homeMovies as $movie): ?>
     <figure>
        <a href="<?=BASE_URL?>movieDetails?id=<?= $movie->getId()?>"><img src="<?= BASE_URL?>public/uploads/<?=$movie->getImdbId()?>.jpg"></a>
        <figcaption><?= $movie->getRating() ?></figcaption>
     </figure>
    <?php endforeach; ?>
    <div>
        <a href="?page=<?= $currentPage-1?>">préc</a>
        <a href="?page=<?= $currentPage+1?>">suiv</a>
    </div>