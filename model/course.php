<?php
    class Course {
        var $connection;

        function __construct($db_connection) {
            $this->connection = $db_connection;
        }

        function getCoursesInDepartment($departemntID) {
            $query = "SELECT * FROM Course WHERE department_id = ?";
            $stmt = mysqli_prepare($this->connection, $query);
            
            if (!$stmt) {
                throw new Exception("Error while preparing Statment");
            }

            mysqli_stmt_bind_param($stmt, "i", $departemntID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            return $result;
        }

    }