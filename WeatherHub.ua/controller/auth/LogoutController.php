<?php
session_start();
if(isset($_SESSION['userToken'])){
    unset($_SESSION['userToken']);
    header('Location: /View/auth/Login.php');
}