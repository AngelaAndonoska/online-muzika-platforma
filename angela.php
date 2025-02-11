<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: angela/src/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
</head>
<body>
    <h1>Welcome, <?= $_SESSION['user']['name'] ?>!</h1>
    <a href="angela/src/listSongs.php">Manage Songs</a>
    <a href="angela/src/listAlbums.php">Manage Albums</a>
    <a href="angela/src/login.php">Logout</a>
</body>
</html>
