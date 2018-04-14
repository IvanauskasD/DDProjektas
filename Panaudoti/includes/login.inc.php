<?php

session_start();

if(isset($_POST['submit'])){

    include 'dbh.inc.php';


    $uidLogin = $_POST['uid'];
    $pwdLogin = $_POST['pwd'];



    if (empty($uidLogin) || empty($pwdLogin)) {
        header("Location: ../index.php?login=empty");
        exit();
    }
    else {

        if (!preg_match("/^[a-zA-Z0-9.@]*$/", $uidLogin))
        {
            header("Location: ../index.php?login=forbiddenChar");
            exit();
        }
        else if (!filter_var($uidLogin, FILTER_VALIDATE_EMAIL) && preg_match("/[.@]/", $uidLogin))
        {
            header("Location: ../index.php?login=email");
            exit();
        }
        else {
            $uid = mysqli_real_escape_string($conn, $_POST['uid']);
            $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

            if (empty($uid) || empty($pwd)) {
                header("Location: ../index.php?login=userNotFound");
                exit();
            } else {
                $sql = "SELECT * FROM users_login WHERE username='$uidLogin' OR email='$uidLogin'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck < 1) {
                    header("Location: ../index.php?login=userNotFound");
                    exit();
                } else {
                    if ($row = mysqli_fetch_assoc($result)) {
                        //Dehashinimas
                        $hashedPwdCheck = password_verify($pwd, $row['password']);
                        if ($hashedPwdCheck == false) {
                            header("Location: ../index.php?login=error");
                            exit();
                        } elseif ($hashedPwdCheck == true) {
                            //Prijungia vartotoja
                            $_SESSION['u_id'] = $row['id'];
                            $_SESSION['u_first'] = $row['firstname'];
                            $_SESSION['u_last'] = $row['lastname'];
                            $_SESSION['u_email'] = $row['email'];
                            $_SESSION['u_country'] = $row['country'];
                            $_SESSION['u_city'] = $row['city'];
                            $_SESSION['u_age'] = $row['age'];
                            header("Location: ../index.php?login=success");
                            exit();
                        }
                    }
                }
            }
        }
    }

} else{
    header("Location: ../index.php?login=error");
    exit();
}