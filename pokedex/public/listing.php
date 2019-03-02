<?php
include '../../private/curl.php';
$cache = '../../cache/';
if(!empty($_GET)){
    $offset=$_GET['offset'];
    
    $url= 'https://pokeapi.co/api/v2/pokemon?offset='.$offset.'&limit=30';

    $data=to_curl($url, $cache);
    
    $i= $offset;
    foreach($data->results as $pokemon){
        $i++;
        echo '<li data-id="'.$i.'"><a href="pokemon.php?pokemon='.$pokemon->name.'">'.ucfirst($pokemon->name).'</a></li>';
    }
    
}