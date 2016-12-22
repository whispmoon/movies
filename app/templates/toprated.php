<h2>TOP RATED !</h2>
<div class="movies">
    <?php foreach($movies as $movie): 
    if($movie->getRating() > 8.5){ ?>
     <figure>
        <a href="<?=BASE_URL?>movieDetails?id=<?= $movie->getId()?>"><img src="<?= BASE_URL?>public/uploads/<?=$movie->getImdbId()?>.jpg"></a>
        <figcaption><?= $movie->getRating() ?></figcaption>
     </figure>
    <?php }endforeach; ?>
    </div>