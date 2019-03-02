<?php
define('CACHE_DURATION',(60*60)); // 1 HEURE DE MISE EN CACHE

function to_curl($url, $cache_location){
    
    $check_cache = md5($url);
    if(file_exists($cache_location.$check_cache)){
        if( time() < (filectime($cache_location.$check_cache)+CACHE_DURATION) ){ // seul cas ou le cache est utilsé
            $data = file_get_contents($cache_location.$check_cache);
        }else{
            $data = to_get($url);
            file_put_contents($cache_location.$check_cache, $data);
        }

    }else{ // si il n'est pas dans le cache
        $data= to_get($url);
        file_put_contents($cache_location.$check_cache, $data);
    } 

    
    $data= json_decode($data);
    return $data;
}

function to_get($url){
    
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $data= curl_exec($curl);
    curl_close($curl);
    
    return $data;
}

