<?php
session_start();


if (!isset($_SESSION['userToken']) ||  $_SESSION['userToken']['roleId'] != '1') {
    header('Location: /View/auth/Login.php');
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
if($_SESSION['userToken']['id_user']==$userIdGet){
    $_SESSION['Message'] = "Адміністратору заборонено видаляти.";
    header('Location: /View/admin/AdminPage.php');
}
 mysqli_query($connect, "DELETE FROM `user` WHERE `id_user` = '$userIdGet' ");
 $_SESSION['Message'] = "Користувача було успішно видалено.";
 header('Location: /View/admin/AdminPage.php');