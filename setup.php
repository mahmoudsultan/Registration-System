<?php
    require_once 'db_setup.php';
    
    // models
    require 'model/department.php';
    require 'model/user.php';

    // instantiate project models
    $Department = new Department($dbconnection);
    $User = new User($dbconnection);

    // Exceptions for handling models
    class InvalidateInputException extends Exception {}