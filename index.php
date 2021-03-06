<?php
    session_start();
    
    require_once "setup.php";
    include "views/_header.php";
    if (isset($_SESSION['usersession'])) {
        $user = $User->getUserByID($_SESSION['usersession']);
        if (!$user["department_id"]) {
            $departments = $Department->getDepartments();    
            include "views/_choose_department.php";
        } else {
            $courses = $Course->getCoursesInDepartment($user['department_id']);
            include 'views/_courses_list.php';
        }
    } else {
        header("location: /login.php");
    }
    include "views/_footer.html";