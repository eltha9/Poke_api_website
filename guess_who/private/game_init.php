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


$party = file_get_contents('./private/party.json');
$party = json_decode($party);
$temp_party= new stdClass();
$temp_party->id = md5(time().$_SERVER['REMOTE_ADDR']);
$temp_party->guess = $to_guess->name;


$temp_party->data = new stdClass();
$color = to_curl($to_guess->url, $cache);
$temp_party->sprite = $color->sprites->front_default;


$color = to_curl($color->species->url, $cache);

$temp_party->data->color = $color->color->name;
$temp_party->data->baby = $color->is_baby;

$types = [];
$type_guess = to_curl($to_guess->url, $cache);
foreach($type_guess->types as $type){
    array_push($types, $type->type->name);
}

$temp_party->data->type = $types;

array_push($party, $temp_party);

$party = json_encode($party);
file_put_contents('./private/party.json', $party);


$question = file_get_contents('./private/question.json');
$question = json_decode($question);