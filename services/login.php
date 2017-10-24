<?php
    session_start();
    require_once '../setup.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $User->getUserByEmail($email);
        if (!$user || !password_verify($password, $user["password"])) {
            http_response_code(400);
            echo json_encode(["error"=>"Invalid email or password"]);
        } else {
            http_response_code(200);
            $_SESSION['usersession'] = $user["id"];
            $_SESSION['username'] = $user["username"];
            echo json_encode($user);
        }
    } else {
        http_response_code(404);
    }
?>