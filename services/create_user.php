<?php
    require_once '../setup.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        header("Content-Type: application/json");
        $response = [];
        try {
            $User->createUser($username, $email, $password);  
            // TODO return user id
        } catch (InvalidateInputException $e) {
            http_response_code(400);
            $response = ["error" => $e->getMessage()];
        } catch (Exception $e) {
            http_response_code(500);
            $response = ["error" => $e->getMessage()];
        }
        echo json_encode($response);
    } else {
        http_response_code(404);
    }