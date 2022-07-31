
<?php
/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */

require __DIR__ . '/vendor/autoload.php';

use Engineered\Marvel\MarvelFacade;

$marvel = new MarvelFacade();

$movies = $marvel->getMovies();
$series = $marvel->getSeries();
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
    .row{
        display:flex;
    }
    .row>div{
        padding:15px;
    }
    .text{
        width:50%
    }
    .image{
        width:50%
    }
    .container {
        padding: 10px;
    }
</style>

<section>

    <div class="container">
        <header class="mb-auto">
            <h1>Marvel Cinematic Universe</h1>
        </header>
    </div>

    <div class="container">
        <h2>Movies</h2>
        <?php foreach ($movies['data'] as $movie): ?>
            <div class="row">
                <div class="image">
                    <img src="<?= $movie['cover_url']; ?>" width="300px" height="450px" alt="<?= $movie['title']; ?>"/>
                </div>
                <div class="text">
                    <h3><?= $movie['title']; ?></h3>
                    <?php if (!empty($movie['release_date'])): ?>
                        <h4><?= date("jS M Y", strtotime($movie['release_date'])); ?></h4>
                    <?php endif; ?>
                    <p><?= $movie['overview']; ?></p>

                    <?php if (!empty($movie['imdb_id'])): ?>
                        <a href="https://www.imdb.com/title/<?= $movie['imdb_id']; ?>" target="_blank">
                            <img src="https://cdn4.iconfinder.com/data/icons/logos-brands-5/24/imdb-512.png" width="48px" height="48px" alt="IMDB"/>
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($movie['trailer_url'])): ?>
                        <a href="<?= $movie['trailer_url']; ?>" target="_blank">
                            <img src="https://cdn1.iconfinder.com/data/icons/social-media-rounded-corners/512/Rounded_Youtube3_svg-256.png" width="48px" height="48px" alt="Youtube"/>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="container">
        <h2>TV Shows</h2>
        <?php foreach ($series['data'] as $show): ?>
            <div class="row">
                <div class="image">
                    <img src="<?= $show['cover_url']; ?>" width="300px" height="450px"/>
                </div>
                <div class="text">
                    <h3><?= $show['title']; ?></h3>
                    <?php if (!empty($show['release_date'])): ?>
                        <h4><?= date("jS M Y", strtotime($show['release_date'])); ?></h4>
                    <?php endif; ?>
                    <p><?= $show['overview']; ?></p>

                    <?php if (!empty($show['imdb_id'])): ?>
                        <a href="https://www.imdb.com/title/<?= $show['imdb_id']; ?>" target="_blank">
                            <img src="https://cdn4.iconfinder.com/data/icons/logos-brands-5/24/imdb-512.png" width="48px" height="48px" alt="IMDB"/>
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($show['trailer_url'])): ?>
                        <a href="<?= $show['trailer_url']; ?>" target="_blank">
                            <img src="https://cdn1.iconfinder.com/data/icons/social-media-rounded-corners/512/Rounded_Youtube3_svg-256.png" width="48px" height="48px" alt="Youtube"/>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
