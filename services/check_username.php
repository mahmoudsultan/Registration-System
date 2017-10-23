<?php
    require_once '../setup.php';

    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        $username = $_POST['username'];
        $count = $User->getUserCountByUsername($username);
        if($count > 0) {
            echo json_encode(["available" => false]);
        } else {
            echo json_encode(["available" => true]);
        }
        http_response_code(200);
    } else {
        http_response_code(404);
    }