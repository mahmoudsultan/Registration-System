<?php
    require_once 'db_setup.php';
    
    // models
    require 'model/department.php';
    require 'model/user.php';
    require 'model/course.php';

    // instantiate project models
    $Department = new Department($dbconnection);
    $User = new User($dbconnection);
    $Course = new Course($dbconnection);

    // Exceptions for handling models input validations
    class InvalidateInputException extends Exception {}