<?php

function search_game($id){
    $game_file = file_get_contents('../private/party.json');
    $game_file = json_decode($game_file);
    

    foreach($game_file as $game){
        if($game->id === $id){
            return $game;
            
        }
    }

}

if(!empty($_GET)){
    if(array_key_exists('aws', $_GET) && is_string($_GET['aws'])){
        if(array_key_exists('id', $_GET) && is_string($_GET['id'])){
            $g_id = htmlspecialchars($_GET['id']);
            $aws = htmlspecialchars($_GET['aws']);

            $current = search_game($g_id);
            
            if($current != false){
                if($current->guess === $aws){
                    echo $current->sprite;
                }else{
                    echo false;
                }


            }else{
                echo false;
            }

        }else{
            echo false;
        }


    }else{
        echo false;
    }
}else{
    echo false;
}