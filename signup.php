<?php
    require_once 'setup.php';
    if (!isset($_SESSION['usersession'])) {
        include 'views/_header.php';
        include 'views/signup.html';
        include 'views/_footer.html';
    } else {
        header("location: /index.html");
    }
?>