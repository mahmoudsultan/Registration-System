<?php
    session_start();
    
    require_once "setup.php";
    include "views/_header.html";
    if (isset($_SESSION['usersession'])) {
        $departments = $Department->getDepartments();    
        include "views/_choose_department.php";
    } else {
        echo "What?";
    }
    include "views/_footer.html";