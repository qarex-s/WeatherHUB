<?php
session_start();


if (!isset($_SESSION['userToken']) ||  $_SESSION['userToken']['roleId'] != '1') {
    header('Location: /View/auth/Login.php');
}
if(!isset($_POST['searchUserId'])){
}

require_once '../../../dbphp/Connectiondb.php';
if (!$connect) {
    die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
}
if (trim($_GET['searchUserId']) == "" || !isset($_GET['searchUserId'])) {
    $_SESSION['Message'] = "Знайди користувача.";
    header('Location: /View/admin/AdminPage.php');
}
$userIdGet = $_GET['searchUserId'];
$userDataVal = mysqli_query($connect,"SELECT * FROM `user` WHERE `id_user` = '$userIdGet'");



 mysqli_query($connect, " UPDATE `user` SET `id_user`='[value-1]',
 `Email`='[value-2]',`Name`='[value-3]',`UserName`='[value-4]',
 `Age`='[value-5]',`genderId`='[value-6]',
 `roleId`='[value-7]' WHERE `id_user` = '$userIdGet'");

 $_SESSION['Message'] = "Дані користувача були успішно змінені.";
 header('Location: /View/admin/AdminPage.php');