<?php
    $data =to_curl('https://pokeapi.co/api/v2/pokemon?offset=0&limit=1000');

    $data = json_decode($data);
    
    $choices= [];

    for($i=0; $i<20; $i++){
        $sprite_able = false;
        $temp = $data->results[rand(0,($data->count-1))] ;

        $data_poke= to_curl($temp->url);
        $data_poke = json_decode($data_poke);
        $keys = array_keys((array)$data_poke->sprites);
        foreach($keys as $sprite){

            if($data_poke->sprites->$sprite != NULL){
                $sprite_able = true;
            }

        }
        if($sprite_able){
            array_push($choices, $temp);
        }else{
            $i--;
        }
    }
    var_dump($choices);
    

?>