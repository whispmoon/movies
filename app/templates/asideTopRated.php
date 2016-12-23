<ul>
    <?php foreach($movies as $movie): ?>
    <li>
        <a href="<?=BASE_URL?>movieDetails?id=<?= $movie->getId()?>"><?= $movie->getTitle()?></a>
    </li>
    <?php endforeach; ?>
</ul>