<div class="movies">
        <?php foreach($search as $movie): ?>
        <figure>
            <a href="<?=BASE_URL?>movieDetails?id=<?= $movie->getId()?>"><img src="<?= BASE_URL?>public/uploads/<?=$movie->getImdbId()?>.jpg"></a>
            <figcaption><?= $movie->getRating() ?></figcaption>
        </figure>
        <?php endforeach; ?>
    </div>
