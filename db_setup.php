<?php
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';

    $dbconnection = mysqli_connect($dbhost, $dbuser, $dbpass);
    
    
    if (!$dbconnection) {
        die("Could not connect to database server");
    }

    mysqli_select_db($dbconnection, 'registeration');
?>
