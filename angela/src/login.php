<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = json_decode(file_get_contents("../data/users.json"), true) ?? [];
    foreach ($users as $user) {
        if ($user['email'] === $_POST['email'] && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['user'] = $user;
            header("Location: ../src/listSongs.php");
            exit;
        }
    }
    echo "Invalid email or password!";
}
?>

<form method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
<a href="register.php">Register</a>
