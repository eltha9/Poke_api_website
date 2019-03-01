<?php
include '../private/curl.php';

$data = to_curl('https://pokeapi.co/api/v2/type');
$data = json_decode($data);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokédex</title>
    <link rel="stylesheet" href="styles/main.css">

    <link href="https://fonts.googleapis.com/css?family=Space+Mono:400,700&amp;subset=latin-ext,vietnamese" rel="stylesheet">
</head>
<body>
    <header>
        <a href="../index.html" title="home"><img src="http://cdn.elph.fr/logo-6221638601ef7fa7c835eae08ef67a16.png" alt="pokéapi games"></a>
    </header>

    <main>
        <section class="content-list">
            <ul>
                <li>
                    <h2>Liste Pokémon</h2>
                </li>
                <ul class="sub-list">
                    <li class="mode-numerique">Mode numérique <img src="./images/right_arrow.png" alt="" class="arrow "></li>
                   
                </ul>
                <li>
                    <h2>Habitats Pokémon</h2>
                </li>
                <ul class="sub-list habitats">
                    <li data-type="grassland">Champs <img src="./images/right_arrow.png" alt="" class="arrow "></li>
                    <li data-type="forest">Forêts <img src="./images/right_arrow.png" alt="" class="arrow "></li>
                    <li data-type="montain">Montagne <img src="./images/right_arrow.png" alt="" class="arrow "></li>
                    <li data-type="rough-terrain">Milieux Hostiles <img src="./images/right_arrow.png" alt="" class="arrow "></li>
                    <li data-type="cave">Cave <img src="./images/right_arrow.png" alt="" class="arrow "></li>
                    <li data-type="sea">Mer <img src="./images/right_arrow.png" alt="" class="arrow "></li>
                    <li data-type="waters-edge">Maré-cage <img src="./images/right_arrow.png" alt="" class="arrow "></li>
                    <li data-type="urban">Urbains <img src="./images/right_arrow.png" alt="" class="arrow "></li>
                    <li data-type="rare">Pokémon rare <img src="./images/right_arrow.png" alt="" class="arrow "></li>
                </ul>
                <li>
                    <h2>Recherche</h2>
                </li>
                <ul class="sub-list">
                    <li class="search">Mode A à Z <img src="./images/right_arrow.png" alt="" class="arrow "></li>
                    <li class="type">Type <img src="./images/right_arrow.png" alt="" class="arrow "></li>
                </ul>
            </ul>

        </section>
        <!-- formulaire section -->
        <section class="content-form">
            <!-- mode numérique -->
            <div class="mode-numerique-content form">
                <ol type="1" start="1">
                    
                </ol>
            </div>

            <!-- Habitats div -->
            <div class="mode-habitats-content form">
                <ol type="1" start="1">
                    
                </ol>
            </div>
            
            <!-- search div -->
            <div class="mode-search-content form">
                <input type="text" class="input-search">
                <ol type="1" start="1">
                    
                </ol>  
            </div>

            <!-- type div -->
            <div class="mode-type-content form">
                <select name="" id="">
                    <?php
                        foreach($data->results as $type){
                            echo '<option value="'.$type->name.'">'.$type->name.'</option>';
                        }
                    ?>
                </select>
                <button>Go</button>
            </div>
        </section>
    </main>

    <footer>

    </footer>
    <script src="scripts/app.js"></script>
</body>
</html>