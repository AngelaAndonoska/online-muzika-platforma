<?php
require "SongManager.php";
$songManager = new SongManager();


$albums = json_decode(file_get_contents(__DIR__ . '/../data/albums.json'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $songs = $songManager->getSongs();
    
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

    $songs[] = [
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
    <input type="text" name="title" placeholder="Title" required>
    <input type="text" name="genre" placeholder="Genre" required>
    <input type="number" name="releaseYear" placeholder="Release Year" required>
    
    
    <label for="album">Choose an Album:</label>
    <select name="album" id="album">
        <?php foreach ($albums as $album): ?>
            <option value="<?= $album['name']; ?>"><?= $album['name']; ?></option>
        <?php endforeach; ?>
    </select>
    
    <button type="submit">Save</button>
</form>

<a href="listSongs.php">Back to Song List</a>
