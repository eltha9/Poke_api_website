<?php
    $data =to_curl('https://pokeapi.co/api/v2/pokemon?offset=0&limit=1000', $cache);

    
    $choices= [];
    $to_guess = $data->results[rand(0, (count($data->results)-1 ))];

    for($i=0; $i<20; $i++){
        $sprite_able = false;
        $duplicated = false;
        $temp = $data->results[rand(0,($data->count-1))] ;

        $data_poke= to_curl($temp->url, $cache);
       
        $keys = array_keys((array)$data_poke->sprites);
        foreach($keys as $sprite){

            if($data_poke->sprites->$sprite != NULL){
                $sprite_able = true;
            }

        }
        foreach($choices as $pokemon){
            if($temp == $pokemon){
                $duplicated = true;
                break;
            }
        }


        if($sprite_able && !$duplicated){
            array_push($choices, $temp);
        }else{
            $i--;
        }
    }

    if(!in_array($to_guess, $choices)){
        $choices[rand(0, (count($choices)-1 ) )] = $to_guess;
    }

file_put_contents('value.txt', $to_guess->name);
