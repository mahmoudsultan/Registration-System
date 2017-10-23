<?php
    session_start();

    if (isset($_SESSION['usersession'])) {
        header("location: /index.php");
        exit();
    } else {
        include "views/_header.php";
        include "views/login.html";
        include "views/_footer.html";
    }