<?php
session_start();
    if(!isset($_SESSION['userToken'])){
        $_SESSION['Message'] = "Треба увійти в аккаунт";
        header('Location: /View/auth/Login.php');
    }else{
        header('Location: /View/Home/Profile.php');
    }

?>