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

function response_team($q_id, $info){
    $q_file = file_get_contents('../private/question.json');
    $q_file = json_decode($q_file);

    switch($q_id){
        case 0: //color
            $type= $q_file[0]->target;
            echo '<p>Ma couleur est le '.$info->data->$type.'</p>';
            break;
        case 1://baby
            $type= $q_file[1]->target;
            if($info->data->$type){
                echo '<p>Je suis un gros bébé</p>';
            }else{
                echo '<p>Bah non je suis pas un bébé</p>';
            }
            break;
        case 2://
            $type= $q_file[2]->target;
            echo '<p> Mes types sont: </p><ul>';
            foreach($info->data->$type as $data){
                echo '<li>'.$data.'</li>';
            }
            echo '</ul>';
            break;
        default:
    }
}

$current_game = new stdClass();


if(!empty($_GET)){
    $question_id = (int)$_GET['q'];
    if(is_int($question_id)){
        $game_id = htmlspecialchars($_GET['id']);
        
        $current_game = search_game($game_id);
        if($current_game != false){
            response_team($question_id, $current_game);
        }
        
    }

}
