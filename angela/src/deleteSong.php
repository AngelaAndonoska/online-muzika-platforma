<?php
require "SongManager.php";
$songManager = new SongManager();
$songs = $songManager->getSongs();
if (isset($_GET['index'])) {
    array_splice($songs, $_GET['index'], 1);
    $songManager->saveSongs($songs);
}
header("Location: listSongs.php");
exit;
?>
