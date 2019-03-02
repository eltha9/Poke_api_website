<?php
    $first_time = time();
    $cache = '../cache/';
    include '../private/curl.php';
    include 'private/game_init.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poké api</title>
    <link rel="shortcut icon" href="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/poke-ball.png" type="image/png">
</head>
<body>
    <?php foreach($choices as $pokemon):?>
        <p><?= $pokemon->name ?></p><br>

        <?php 
            $data_poke= to_curl($pokemon->url, $cache);
            
            $keys = array_keys((array)$data_poke->sprites);
            $temp = false;
            foreach($keys as $sprite){
                if($data_poke->sprites->$sprite != NULL){

                    echo '<img src="'.$data_poke->sprites->$sprite.'" title="'.$sprite.'">';
                    $temp = true;
                }

            }
            if(!$temp){
                echo 'no sprite available';
            }
        ?>
    <?php endforeach ?>
    <?php
        $secont_time = time();
        echo 'temps d\'excution '.($secont_time-$first_time).'s';
    ?>
</body>
</html>