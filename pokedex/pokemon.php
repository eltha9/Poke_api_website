<?php

include '../private/curl.php';
$cache = '../cache/';
if(!empty($_GET)){
    $pokemon = $_GET['pokemon'];

    $data = to_curl('https://pokeapi.co/api/v2/pokemon/'.$pokemon , $cache);
    
}else{
    // header('location: ./error.html');
}

function id_print($id){
    if($id <10){
        $id = '00'.$id;
    }elseif($id <100){
        $id = '00'.$id;
    }
    return $id;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokédex-<?= $data->name ?></title>
    <link rel="stylesheet" href="styles/pokemon.css">

    <link href="https://fonts.googleapis.com/css?family=Space+Mono:400,700&amp;subset=latin-ext,vietnamese" rel="stylesheet">
    <link rel="shortcut icon" href="../favicon.png" type="image/png">
</head>
<body>
<header>
        <a href="../index.html" title="home"><img src="http://cdn.elph.fr/logo-6221638601ef7fa7c835eae08ef67a16.png" alt="pokéapi games"></a>
    </header>
    <main>
        <section class="data-numbers">
            <table>
                <tr>
                    <th>N° <?=id_print($data->id) ?></th>
                    <td><?= $data->name?></td>   
                </tr>
                
                <tr>
                    <th>Hauteur</th>
                    <td><?=$data->height/10 ?> m</td>   
                </tr>
                <tr>
                    <th>Poids</th>
                    <td><?=$data->weight/10 ?> kg</td>   
                </tr>
            </table>
            <img src="<?= $data->sprites->front_default?>" alt="front <?=$data->name ?>">
        </section>
        <section class="data-type">
            <div class="types">
                <h2>Type</h2>
                <?php
                    foreach($data->types as $type){
                        echo $type->type->name.'</br>';
                    }
                ?>       
            </div>

            <div class="abilities">
                <h2>Abilities</h2>
                <?php
                    foreach($data->abilities as $ability){
                        echo $ability->ability->name.'</br>';
                    }
                ?>
            </div>
        </section>
</body>
</html>