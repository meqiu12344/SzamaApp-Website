<?php 

    include'../config.php';

    session_start();

    $login = $_GET['login'];
    $password = $_GET['password'];

    $sql = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
    $res = mysqli_query($conn, $sql);
    
    $many = mysqli_num_rows($res);

    if($many == 1){
        while($user = mysqli_fetch_assoc($res)){
            $_SESSION["login_status"] = true;
            $_SESSION["user_id"] = $user['id'];
            $_SESSION["username"] = $user['username'];

            header("Location: ../index.php");
        }
    }else{
        header("Location: ../login.php?error"); 
    }
?>