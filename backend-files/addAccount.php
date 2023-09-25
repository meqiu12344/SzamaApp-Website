<?php

    include'../config.php';

    $username = $_GET['username'];
    $login = $_GET['login'];
    $password = $_GET['password'];

    $sql = "SELECT * FROM users";
    $res = mysqli_query($conn, $sql);

    while($user = mysqli_fetch_assoc($res)){
        if ($user["login"] == $login){
            header("Location: ../register.php?loginError");
        }else if ($user["username"] == $username){
            header("Location: ../register.php?usernameError");
        }
    }

    $ins = "INSERT INTO `users`(`login`, `password`, `username`) VALUES ('$login', '$password', '$username')";
    $ins_res = mysqli_query($conn, $ins);

    header("Location: ../login.php");