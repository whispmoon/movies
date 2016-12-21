

 <section>
     <div class="detailImdb">
        <?php if ($movie->getImdbId()); ?>
        <img src="<?= BASE_URL ?>public/uploads/<?= $movie->getImdbId(); ?>"> 
        <p><?= $movie->getRating(); ?></p>
     </div>
     <div class="detailMovie">
        <h2><?= $movie->getTitle(); ?></h2>
        <p><b>Year :</b><?= $movie->getYear(); ?></p>
        <p><b>Cast :</b><?= $movie->getCast(); ?></p>
        <p><b>Directors :</b><?= $movie->getDirectors(); ?></p>
        <p><b>Writers :</b><?= $movie->getWriters(); ?></p>
        <p><b>Plot :</b><?= $movie->getPlot(); ?></p>
        <p><b>Votes :</b><?= $movie->getVotes(); ?></p>
        <p><b>Runtime :</b><?= $movie->getRuntime(); ?></p>
        <p><b>Trailer :</b><?= $movie->getTrailerUrl(); ?></p>
        <p><b>Modified :</b><?= $movie->getDateModified(); ?></p>
        <p><b>Publié le :</b><?= $movie->getDateCreated();?></p>
     </div>
     </section>