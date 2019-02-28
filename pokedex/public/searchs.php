<?php
include '../../private/curl.php';

function habitat($location){
    $url= 'https://pokeapi.co/api/v2/pokemon-habitat/'.$location;
    $data=to_curl($url);
    $data = json_decode($data);

    foreach($data->pokemon_species as $pokemon){
        echo '<li><a href="pokemon.php?pokemon='.$pokemon->name.'">'.$pokemon->name.'</a></li>';
    }
}

function type($location){
    $url= 'https://pokeapi.co/api/v2/type/'.$location;
    $data=to_curl($url);
    $data = json_decode($data);

    foreach($data->pokemon as $pokemon){
        echo '<li><a href="pokemon.php?pokemon='.$pokemon->pokemon->name.'">'.$pokemon->pokemon->name.'</a></li>';
    }
}

function by_name($key){
    $url='https://pokeapi.co/api/v2/pokemon?offset=0&limit=964';

    $pokemon_list = [];
    $data= to_curl($url);
    $data= json_decode($data);
    $result= [];


    foreach($data->results as $pokemon){
        array_push($pokemon_list, $pokemon->name);
    }
    
    for($i=0; $i<count($pokemon_list); $i++){
        $temp = $pokemon_list[$i];
        for($j=0; $j<strlen($key); $j++){
            
            if($key[$j] != $temp[$j]){
                 $pokemon_list[$i] = NULL;
            }
        }
    }
    
    foreach($pokemon_list as $pokemon){
        if($pokemon != NULL){
            echo '<li><a href="../pokemon.php?pokemon='.$pokemon.'">'.$pokemon.'</a></li>';
        }
        
    }
}
echo 'prout';
by_name('bas');