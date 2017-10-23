<?php
    session_start();
    require_once '../setup.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $User->getUserByEmail($email);
        if (!$user || !password_verify($password, $user["password"])) {
            http_response_code(400);
        } else {
            http_response_code(200);
            $_SESSION['usersession'] = $user["id"];
            $_SESSION['username'] = $user["username"];
        }
    } else {
        http_response_code(404);
    }
?>