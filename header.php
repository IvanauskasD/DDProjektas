<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
    <nav>
        <div class="main-wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
            <div class="nav-login">
                <?php
                    if(isset($_SESSION['u_id'])){
                        echo '<form action="includes/logout.inc.php" method="POST">
                    <button type="submit" name="submit">Logout</button>
                </form>';
                    } else{
                        echo '<form action="includes/login.inc.php" method="POST">
                    <input type="text" name="uid" placeholder="Username/email">
                    <input type="password" name="pwd" placeholder="Password">
                    <button type="submit" name="submit">Login</button>
                </form>
                <a href="signup.php">Sign up</a>';
                    }
                ?>

                <?php

                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if (strpos($fullUrl, "login=empty") == true)
                {
                    //echo "<p class=error>Login field is empty!</p>";
                    echo "<script>alert('Login field is empty!')</script>";
                }

                elseif (strpos($fullUrl, "login=userNotFound") == true)
                {
                    //echo "<p class=error>Wrong username or password!</p>";
                    echo "<script>alert('Wrong username or password!')</script>";
                }

                ?>
            </div>
        </div>
    </nav>
</header>