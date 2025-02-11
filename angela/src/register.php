<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = json_decode(file_get_contents("../data/users.json"), true) ?? [];
    $newUser = [
        'name' => $_POST['name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
    ];
    $users[] = $newUser;
    file_put_contents("../data/users.json", json_encode($users, JSON_PRETTY_PRINT));
    header("Location: login.php");
    exit;
}
?>

<form method="post">
    <input type="text" name="name" placeholder="First Name" required>
    <input type="text" name="last_name" placeholder="Last Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>
<a href="login.php">Already registered? Login</a>
