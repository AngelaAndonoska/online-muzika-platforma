<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $albums = json_decode(file_get_contents("../data/albums.json"), true) ?? [];
    $albums[] = ['id' => uniqid(), 'name' => $_POST['name']];
    file_put_contents("../data/albums.json", json_encode($albums, JSON_PRETTY_PRINT));
    header("Location: listAlbums.php");
    exit;
}
?>

<form method="post">
    <input type="text" name="name" placeholder="Album Name" required>
    <button type="submit">Add Album</button>
</form>


<a href="listAlbums.php">Back to Album List</a>
