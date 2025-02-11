<?php

$albums = json_decode(file_get_contents("../data/albums.json"), true) ?? [];


if (isset($_GET['index']) && isset($albums[$_GET['index']])) {
    $index = $_GET['index'];
    
    
    array_splice($albums, $index, 1);
    
    
    file_put_contents("../data/albums.json", json_encode($albums, JSON_PRETTY_PRINT));
}


header("Location: listAlbums.php");
exit;
