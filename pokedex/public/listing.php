<?php
include '../../private/curl.php';

if(!empty($_GET)){
    $offset=$_GET['offset'];
    $url= 'https://pokeapi.co/api/v2/pokemon?offset='.$offset.'&limit=30';

    $data=to_curl($url);
    $data = json_decode($data);
    $i= $offset;
    foreach($data->results as $pokemon){
        $i++;
        echo '<li data-id="'.$i.'">'.$pokemon->name.'</li>';
    }
}