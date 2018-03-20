<?php

if(isset($_POST['submit'])){

    include_once 'dbh.inc.php';

    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $country= mysqli_real_escape_string($conn, $_POST['country']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $uid = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);

    //Ar nera tusciu lauku
    if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)){
        header("Location: ../signup.php?signup=empty");
        exit();
    } else{
        //Ar irasyta info tinkama

        if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)
            || !preg_match("/^[a-zA-Z]*$/", $country) || !preg_match("/^[a-zA-Z]*$/", $city)
            || !preg_match("/^[0-9]*$/", $age)){
            header("Location: ../signup.php?signup=invalid");
            exit();
        } else{
            //ar tinka email
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../signup.php?signup=invalidEmail");
                exit();
            } else{
                $sql = "SELECT * FROM users WHERE username='$uid'";

                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck > 0){
                    header("Location: ../signup.php?signup=userTaken");
                    exit();
                } else{
                    //Hashina slaptazodi
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //Prideti vartotoja i database

                    $sql = "INSERT INTO users (firstname, lastname,
                            email, country, city, age) VALUES ('$first', '$last',
                            '$email', '$country', '$city', '$age');";
                    mysqli_query($conn, $sql);
                    $sql1 = "INSERT INTO users_login (username, email, password) VALUES ('$uid', '$email', '$hashedPwd');";
                    mysqli_query($conn, $sql1);
<<<<<<< Updated upstream
=======
                   // echo "<script>alert('Registration successful, redirecting to Home page');
                    //document.location='../index.php'</script>";
                    header("Location: ../signup.php?signup=success");
				    exit();
>>>>>>> Stashed changes

                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }

} else{
    header("Location: ../signup.php");
    exit();
}