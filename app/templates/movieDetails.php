<h2>details</h2>

 <section>
    <h2><?= $movie->getTitle(); ?></h2>
    <p>Publié le <?= $movie->getDateCreated();?></p>
     <p><?= $movie->getgetYear(); ?></p>
     <p><?= $movie->getgetCast(); ?></p>
     <p><?= $movie->getDirectors(); ?></p>
     <p><?= $movie->getWriters(); ?></p>
     <p><?= $movie->getPlot(); ?></p>
     <p><?= $movie->getRating(); ?></p>
     <p><?= $movie->getVotes(); ?></p>
     <p><?= $movie->getRuntime(); ?></p>
     <p><?= $movie->getTrailerUrl(); ?></p>
     <p><?= $movie->getDateModified(); ?></p>
     <?php if ($movie->getImdbId()); ?>
     <img src="<?= BASE_URL ?>public/uploads/<?= $movie->getImdbId(); ?>">
     </section>