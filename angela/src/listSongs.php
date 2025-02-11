<?php
session_start(); 

require "SongManager.php";
$songManager = new SongManager();
$songs = $songManager->getSongs();


$isLoggedIn = isset($_SESSION['user']);
?>


<?php if ($isLoggedIn): ?>
    <p>Welcome, <?= $_SESSION['user']['name'] ?>! <a href="logout.php">Logout</a></p>
<?php else: ?>
    <p><a href="login.php">Login</a> | <a href="register.php">Register</a></p>
<?php endif; ?>

<a href="addSong.php">Add Song</a>
<table border="1">
    <tr>
        <th>Title</th><th>Genre</th><th>Release Year</th><th>Album</th><th>Actions</th>
    </tr>
    <?php foreach ($songs as $index => $song): ?>
        <tr>
            <td><?= $song['title'] ?></td>
            <td><?= $song['genre'] ?></td>
            <td><?= $song['releaseYear'] ?></td>
            <td><?= $song['album'] ?></td>
            <td>
                <a href="editSong.php?index=<?= $index ?>">Edit</a>
                <a href="deleteSong.php?index=<?= $index ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="listAlbums.php">Manage Albums</a>
