<?php 

    include'../config.php';

    session_start();

    $post_id = $_GET['post_id'];
    $user_id = $_SESSION['user_id'];
    $message = $_GET['message'];

    $sql = "INSERT INTO `comment`(`message`, `user_id`, `post_id`) VALUES ('$message','$user_id','$post_id')";
    $res = mysqli_query($conn, $sql);

    if ($res){
        header("Location: ../recipe.php?id=". $post_id);
    }else{
        echo "Coś poszło nie tak :(";
    }