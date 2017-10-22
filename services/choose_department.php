<?php
    require_once '../setup.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userID = $_POST['userID'];
        $departmentID = $_POST['departmentID'];
        $User->setDepartment($userID, $departmentID);
    } else {
        http_response_code(401);
    }