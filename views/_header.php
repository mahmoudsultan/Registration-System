<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registration System</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="assets/css/style.css" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Registration</a>
                <div class="collapse navbar-collapse float-right" id="navbarNav">
                    <ul class="navbar-nav float-right">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <?php
                            if (isset($_SESSION['usersession'])) {
                        ?>
                            <span class="navbar-text">
                                Welcome <?php echo $_SESSION["username"]; ?>
                            </span>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        <?php
                            } else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="signup.php">Signup</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>    
            </nav>
        </header>
        <br/>
        <main>
            <div class="container">