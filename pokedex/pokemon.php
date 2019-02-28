<?php

include '../private/curl.php';
if(!empty($_GET)){
    $pokemon = $_GET['pokemon'];

    $data = to_curl('https://pokeapi.co/api/v2/pokemon/'.$pokemon);
    $data = json_decode($data);
}else{
    header('location: error.html');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>
        
    </main>
</body>
</html>