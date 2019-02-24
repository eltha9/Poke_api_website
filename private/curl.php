<?php
define('CACHE_DURATION',(60*60*24*2));
define('CACHE_LOCATION', './cache/');

function to_curl($url){
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $data= curl_exec($curl);
    curl_close($curl);

    $url= CACHE_LOCATION.md5($url);
    to_cache($url, $data);

    return $data;
}
// appeler à chaque requete
function cached($input){
    $status = false;
    
    $url= CACHE_LOCATION.$input;
    $url = md5($url);
    if(file_exists($url)){

        $data = file_get_contents($url);
        $data = json_decode($data);  

    }else{
        $data = to_curl($input);
        to_cache($url, $data);
    }

    
    $values = (object)[
        "status"=> $status,
        "value"=> $data
    ];
    return $values;
}

function to_cache($url, $input){
    $status = false;

    file_put_contents($url,$input);


    // returned data
    return $status;
}

function update_cache(){
    $status = false;

    $values = (object)[
        "status"=> $status,
        "value"=> $data
    ];
    return $values;
}


/*
How name cahce file is define ? 

POKEMON : 
    -Sprite+id
    -name of the attack
    -


*/