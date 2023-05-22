<?php
session_start();
if(!isset($_SESSION['userToken'])){
    $_SESSION['Message'] = "Треба увійти в аккаунт";
    header('Location: /View/auth/Login.php');
}
require_once '../../dbphp/Connectiondb.php';
if (!$connect) {
  die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
}

$userId = $_SESSION['userToken']['id_user'];
$clothes = array();
$dataClothes = mysqli_query($connect,"SELECT * FROM `clothe` ");
while($clothe = mysqli_fetch_assoc($dataClothes)){
    $clothes[]=$clothe;
}
$_SESSION['AllClothes'] = $clothes;
if(!isset($_GET['idClothe'])){
    $_SESSION['Message'] = "Вибери одяг";
    header('Location: /View/Home/FavoritePage.php');
    exit;
}

$clotheId = $_GET['idClothe'];


if(!mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `fav_clothe` WHERE `userId` = '$userId'"))){
mysqli_query($connect,"INSERT INTO `fav_clothe` (`id_favClothe`, `userId`, `clotheId`) VALUES (NULL, '$userId', '$clotheId')");
}else{
    mysqli_query($connect,"UPDATE `fav_clothe` SET `clotheId`='$clotheId' WHERE `userId` = '$userId'");
}
$_SESSION['ChoosedClothe']=$clotheId;
$_SESSION['Message'] = "Одяг успішно змінений";
header('Location: /View/Home/FavoritePage.php');