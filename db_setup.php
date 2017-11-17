<?php
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '12345113355423';

    $dbconnection = mysqli_connect($dbhost, $dbuser, $dbpass);
    
    
    if (!$dbconnection) {
        die("Could not connect to database server");
    }

    mysqli_select_db($dbconnection, 'registeration');
?>
