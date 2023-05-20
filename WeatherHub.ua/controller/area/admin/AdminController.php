<?php
session_start();


if (!isset($_SESSION['userToken']) ||  $_SESSION['userToken']['roleId'] != '1') {
  header('Location: /View/auth/Login.php');
}
require_once '../../../dbphp/Connectiondb.php';
if (!$connect) {
  die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
}
if(trim($_GET['userName']) == "" || !isset($_GET['userName'])){
    $usersVal = mysqli_query($connect, "SELECT * FROM `user`");
}else{
    $userName = $_GET['userName'];
    $usersVal = mysqli_query($connect, "SELECT * FROM `user` WHERE `UserName` Like '%$userName%' ");

}

$arrUsers = array();
    while($rowData = mysqli_fetch_assoc($usersVal)){
        array_push($arrUsers,$rowData);
    }
    if(count($arrUsers)>0 ){
        $_SESSION['userInfo']=$arrUsers;
    }else{
        $_SESSION['userInfo']=$arrUsers;
        $_SESSION['Message'] = "Користувача не знайдено.";
        header('Location: /View/admin/AdminPage.php');
    }

header('Location: /View/admin/AdminPage.php');