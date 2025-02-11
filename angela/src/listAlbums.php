<?php
$albums = json_decode(file_get_contents("../data/albums.json"), true) ?? [];
?>

<a href="addAlbum.php">Add Album</a>
<table border="1">
    <tr>
        <th>ID</th><th>Name</th><th>Actions</th>
    </tr>
    <?php foreach ($albums as $index => $album): ?>
        <tr>
            <td><?= $album['id'] ?></td>
            <td><?= $album['name'] ?></td>
            <td>
                <a href="editAlbum.php?index=<?= $index ?>">Edit</a>
                <a href="deleteAlbum.php?index=<?= $index ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="listSongs.php">Back to Songs</a>
