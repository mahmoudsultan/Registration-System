<?php
    class Department {
        var $connection;

        function __construct($db_connection) {
            $this->connection = $db_connection;
        }

        function getDepartments() {
            $query = "SELECT * FROM Department";
            $results = mysqli_query($this->connection, $query);
            if (mysqli_num_rows($results) > 0) {
                return $results;
            } else {
                return null;
            }
        }

    }