<?php 

    include'config.php';

    $id = $_GET['id'];

    if(isset($_GET['accept'])){
        $sql = "UPDATE `post` SET `status` = '0' WHERE `post`.`id` = $id;";    
    }else if(isset($_GET['refusal'])){
        $sql = "DELETE FROM `post` WHERE id = $id";
    }

    $res = mysqli_query($conn, $sql);
    header("Location: index.php");