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
         * Fetch and return one user by the id provided
        */
        function getUserByID($id) {
            $query = "SELECT id, email, username, department_id FROM User WHERE id = ?;";
            $stmt = mysqli_prepare($this->connection, $query);
            
            if (!$stmt) {
                throw new Exception("Error while preparing Statment");
            }

            mysqli_stmt_bind_param($stmt, "s", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($result);
            mysqli_stmt_close($stmt);
            return $user;
        }

        /**
         * Fetch and return one user by the email provided
        */
        function getUserByEmail($email) {
            $query = "SELECT id, email, username, password FROM User WHERE email = ?;";
            $stmt = mysqli_prepare($this->connection, $query);
            
            if (!$stmt) {
                throw new Exception("Error while preparing Statment");
            }

            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($result);
            mysqli_stmt_close($stmt);
            return $user;
        }
        
        function getUserCountByUsername($username) {
            $query = "SELECT count(*) as total FROM User WHERE username = ?";
            $stmt = mysqli_prepare($this->connection, $query);
            if (!$stmt) {
                throw new Exception("Error while preparing Statment");
            }

            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $count = mysqli_fetch_assoc($result);
            return $count["total"];
        }

        /**
         * Set the department id of the user identified by $userID to 
         * $departmentID
        */
        function setDepartment($userID, $departmentID) {
            $query = "UPDATE User SET department_id = ? WHERE id = ?;";
            $stmt = mysqli_prepare($this->connection, $query);
            if (!$stmt) {
                throw new Exception("Error while preparing Statment");
            }

            mysqli_stmt_bind_param($stmt, "ii", $departmentID, $userID);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_errno($stmt) > 0) {
                throw new Exception("Something went wrong while creating user: " . mysqli_error($this->connection));
            }

            mysqli_stmt_close($stmt);
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