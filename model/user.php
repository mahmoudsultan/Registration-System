<?php
    class User {
        var $connection;

        function __construct($db_connection) {
            $this->connection = $db_connection;
        }

        /**
         * Get all users from database
        */
        function getUsers() {
            $query = "SELECT * FROM User";
            $results = mysqli_query($this->connection, $query);
            if (mysqli_num_rows($results) > 0) {
                return $results;
            } else {
                return null;
            }
        }
        /**
         * Create New User Method
        */
        function createUser($username, $email, $password) {
            // validate user info first
            try {
                $this->validateUserInfo($username, $email, $password);
            } catch (InvalidateInputException $e) {
                // re-throw for the controller to handle
                throw $e;
            }
            
            // hash the password before storing in database
            $password = password_hash($password, PASSWORD_DEFAULT);

            if (!$this->connection) {
                throw new Exception("No Connection to Database");
            }

            $stmt = mysqli_prepare($this->connection, 'INSERT INTO `User`(`username`, `email`, `password`) VALUES (?,?,?)');
            if (!$stmt) {
                // TODO
                throw new Exception("Error while preparing Statment");
            }
            
            mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $password);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_errno($stmt) > 0) {
                throw new Exception("Something went wrong while creating user: " . mysqli_error($this->connection));
            }

            mysqli_stmt_close($stmt);
        }

        private function validateUserInfo($username, $email, $password) {
            $username = preg_replace('/\s+/', '', $username);
            $email = preg_replace('/\s+/', '', $email);
            $errors = array();
            if ($username == '') {
                array_push($errors, "Username can not be empty");
            }

            if ($email == '') {
                array_push($errors, "Email can not be empty");
            }

            if (!$password) {
                array_push($errors, "Password Can not be empty");
            }

            if (strlen($password) < 8) {
                array_push($errors, "Password must be at least 8 characters long.");
            }

            if (count($errors) > 0) {
                // TODO: This is not a good way to return errors
                throw new InvalidateInputException(implode("<br />", $errors));
            }
        }

    }