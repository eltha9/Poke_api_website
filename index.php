<?php
    include 'private/curl.php';
    include 'private/game_init.php'
    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';
    // $data = json_decode(to_curl($data->sprites));

    // $keys = array_keys((array)$data->sprites);

    // foreach($keys as $sprite){
    //     if($data->sprites->$sprite != NULL){

    //         echo '<img src="'.$data->sprites->$sprite.'" title="'.$sprite.'">';
    //     }

    // }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poké api</title>
</head>
<body>
    <?php foreach($choices as $pokemon):?>
        <p><?= $pokemon->name ?></p><br>

        <?php 
            $data_poke= to_curl($pokemon->url);
            $data_poke = json_decode($data_poke);
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

</body>
</html>