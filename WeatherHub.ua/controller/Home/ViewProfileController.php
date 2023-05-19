<?php
session_start();

if(!isset($_GET['searchUserId'])){
    $_SESSION['Message'] = "Введіть нікнейм користувача";
    header('Location: /View/Home/SearchPage.php');
    exit;
}
require_once '../../dbphp/Connectiondb.php';
if (!$connect) {
    die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
  }
$userId = $_GET['searchUserId'];
$takeUserValArray = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE `id_user` = '$userId' "));

$_SESSION['FindedUser'] = [
    "id_user"=>$takeUserValArray['id_user'],
    "Email"=>$takeUserValArray['Email'],
    "Name"=>$takeUserValArray['Name'],
    "UserName"=>$takeUserValArray['UserName'],
    "Age"=>$takeUserValArray['Age'],
    "genderId"=>$takeUserValArray['genderId']  

];

header('Location: /View/Home/ViewProfile.php');
