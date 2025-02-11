<?php
class UserManager {
    private $usersFile = 'data/users.json';

    public function registerUser($username, $password) {
        $users = json_decode(file_get_contents($this->usersFile), true);
        $users[$username] = [
            'username' => $username,
            'password' => $password
        ];
        file_put_contents($this->usersFile, json_encode($users, JSON_PRETTY_PRINT));
    }

    public function loginUser($username, $password) {
        $users = json_decode(file_get_contents($this->usersFile), true);
        if (isset($users[$username]) && password_verify($password, $users[$username]['password'])) {
            return true;
        }
        return false;
    }
}
?>