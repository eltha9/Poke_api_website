<?php
$cache = '../cache/';
include '../private/curl.php';
include './private/game_init.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qui est ce ? </title>
    <link rel="stylesheet" href="styles/home.css">

    <link href="https://fonts.googleapis.com/css?family=Space+Mono:400,700&amp;subset=latin-ext,vietnamese" rel="stylesheet">
</head>
<body>
    <header>
        <a href="../index.html" title="home"><img src="http://cdn.elph.fr/logo-6221638601ef7fa7c835eae08ef67a16.png" alt="pokéapi games"></a>
    </header>
    <main>
        <section class="pokeball">
            
            <div class="info">
                <div class="question">

                </div>
                <div class="reponse">
                    
                </div>
            </div>
        </section>
        
        <section class="content">
            <?php foreach($choices as $pokemon): ?>
            <div class="pokemon" data-name="<?= $pokemon->name?>">
                <div class="pokemon-info">
                    <?php
                        $temp_data = to_curl($pokemon->url, $cache)
                    ?>
                    <img src="<?= $temp_data->sprites->front_default?>" alt="Devant <?= $pokemon->name?>" title="<?= $pokemon->name?>">
                    <h4><?= ucfirst($pokemon->name) ?></h4>
                </div>
                <div class="pokemon-buttons">
                    <button class="submit">Proposer</button>
                    <button class="kill">Cacher</button>
                </div>
                <div class="pokemon hide "></div>
            </div>

            <?php endforeach; ?>
        </section>

    </main>

    <script src="scripts/modules/three.min.js"></script>
    <script src="scripts/modules/objloader.js"></script>
    <script src="scripts/modules/mtlloader.js"></script>
    <script src="scripts/modules/control.js"></script>
    <script src="scripts/modules/3dClass.js"></script>

    <script src="scripts/app.js"></script>
</body>
</html>