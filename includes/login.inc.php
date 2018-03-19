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
        else
        {
            $uid = mysqli_real_escape_string($conn, $_POST['uid']);
            $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

            if(empty($uid) || empty($pwd)){
                header("Location: ../index.php?login=userNotFound");
                exit();
            } else{
                $sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck < 1){
                    header("Location: ../index.php?login=error");
                    exit();
                } else{
                    if($row = mysqli_fetch_assoc($result)){
                        //Dehashinimas
                        $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                        if($hashedPwdCheck == false){
                            header("Location: ../index.php?login=error");
                            exit();
                        } elseif($hashedPwdCheck == true){
                            //Prijungia vartotoja
                            $_SESSION['u_id'] = $row['user_id'];
                            $_SESSION['u_first'] = $row['user_first'];
                            $_SESSION['u_last'] = $row['user_last'];
                            $_SESSION['u_email'] = $row['user_email'];
                            $_SESSION['u_uid'] = $row['user_uid'];
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