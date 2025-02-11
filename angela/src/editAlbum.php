<?php

$albums = json_decode(file_get_contents("../data/albums.json"), true) ?? [];


if (!isset($_GET['index']) || !isset($albums[$_GET['index']])) {
    header("Location: listAlbums.php");
    exit;
}

$index = $_GET['index'];
$album = $albums[$index];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $albums[$index]['name'] = $_POST['name'];
    
  
    file_put_contents("../data/albums.json", json_encode($albums, JSON_PRETTY_PRINT));
    
    
    header("Location: listAlbums.php");
    exit;
}
?>


<form method="post">
    <input type="text" name="name" value="<?= htmlspecialchars($album['name']) ?>" required>
    <button type="submit">Update Album</button>
</form>


<a href="listAlbums.php">Back to Album List</a>
