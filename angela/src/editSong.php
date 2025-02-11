<?php
require "SongManager.php";
$songManager = new SongManager();


$albums = json_decode(file_get_contents(__DIR__ . '/../data/albums.json'), true);
$songs = $songManager->getSongs();

if (!isset($_GET['index']) || !isset($songs[$_GET['index']])) {
    header("Location: listSongs.php");
    exit;
}

$index = $_GET['index'];
$song = $songs[$index];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedAlbumName = $_POST['album'];
    
  
    $albumNameIsValid = false;
    foreach ($albums as $album) {
        if ($album['name'] === $selectedAlbumName) {
            $albumNameIsValid = true;
            break;
        }
    }

    if (!$albumNameIsValid) {
        echo "Invalid album name.";
        exit;
    }

   
    $songs[$index] = [
        'title' => $_POST['title'],
        'genre' => $_POST['genre'],
        'releaseYear' => $_POST['releaseYear'],
        'album' => $selectedAlbumName 
    ];

    $songManager->saveSongs($songs);
    header("Location: listSongs.php");
    exit;
}
?>

<form method="post">
    <input type="text" name="title" value="<?= $song['title'] ?>" required>
    <input type="text" name="genre" value="<?= $song['genre'] ?>" required>
    <input type="number" name="releaseYear" value="<?= $song['releaseYear'] ?>" required>
    

    <label for="album">Choose an Album:</label>
    <select name="album" id="album">
        <?php foreach ($albums as $album): ?>
            <option value="<?= $album['name']; ?>" <?= ($song['album'] == $album['name']) ? 'selected' : ''; ?>><?= $album['name']; ?></option>
        <?php endforeach; ?>
    </select>
    
    <button type="submit">Update Song</button>
</form>


<a href="listSongs.php">Back to Song List</a>
