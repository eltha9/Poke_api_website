<?php
include '../../private/curl.php';
$cache = '../../cache/';

// search by location area
function habitat($location, $cache){
    $url= 'https://pokeapi.co/api/v2/pokemon-habitat/'.$location;
    $data=to_curl($url, $cache);
    
    foreach($data->pokemon_species as $pokemon){
        echo '<li><a href="pokemon.php?pokemon='.$pokemon->name.'">'.$pokemon->name.'</a></li>';
    }
}

//search by pokemon type (some types doesn't have pokmein)
function type($location, $cache){
    $url= 'https://pokeapi.co/api/v2/type/'.$location;
    $data=to_curl($url, $cache);


    foreach($data->pokemon as $pokemon){
        echo '<li><a href="pokemon.php?pokemon='.$pokemon->pokemon->name.'">'.$pokemon->pokemon->name.'</a></li>';
    }
}

// search function por pokemon
function by_name($key, $cache){
    $url='https://pokeapi.co/api/v2/pokemon?offset=0&limit=964';

    $pokemon_list = [];
    $data= to_curl($url, $cache);

    $result= [];
    $key = strtolower($key);

    foreach($data->results as $pokemon){
        array_push($pokemon_list, $pokemon->name);
    }
    
    for($i=0; $i<count($pokemon_list); $i++){
        $temp = $pokemon_list[$i];
        for($j=0; $j<strlen($key); $j++){
            if(strlen($temp)<strlen($key)){
                $pokemon_list[$i] = NULL;
                break;
            }
            if($key[$j] != $temp[$j]){
                 $pokemon_list[$i] = NULL;
            }
        }
    }
    
    foreach($pokemon_list as $nb=>$pokemon){
        if($pokemon != NULL){
            echo '<li value="'.$nb.'"><a href="pokemon.php?pokemon='.$pokemon.'">'.$pokemon.'</a></li>';
        }
        
    }
}


if(!empty($_GET)){
    
    if(array_key_exists('habitat', $_GET)){
        $value = htmlspecialchars($_GET['habitat']);
        if(is_string($value)){
            habitat($value, $cache);
        }else{
            echo 'error';
        }

    }elseif(array_key_exists('search', $_GET)){
        
        $value = htmlspecialchars($_GET['search']);
        if(is_string($value)){
            by_name($value, $cache);
        }else{
            echo 'error';
        }

    }elseif(array_key_exists('type', $_GET)){
        $value = htmlspecialchars($_GET['type']);
        
        if(is_string($value)){
            type($value, $cache);
        }else{
            echo 'error';
        }   

    }

}