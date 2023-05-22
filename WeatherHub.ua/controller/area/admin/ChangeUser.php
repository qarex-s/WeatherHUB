<?php
session_start();


if (!isset($_SESSION['userToken']) ||  $_SESSION['userToken']['roleId'] != '1') {
    header('Location: /View/auth/Login.php');
}
require_once '../../../dbphp/Connectiondb.php';
if (!$connect) {
    die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
}
if (!isset($_POST['searchUserId'])) {

    if (trim($_GET['searchUserId']) == "" || !isset($_GET['searchUserId'])) {
        $_SESSION['Message'] = "Знайди користувача.";
        header('Location: /View/admin/AdminPage.php');
        exit;
    }

    $userIdGet = $_GET['searchUserId'];
    $userFullDataVal = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE `id_user` = '$userIdGet'"));
    $image =  mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `image` 
    WHERE `userId` = '$userIdGet'"));
    if ($userFullDataVal === null) {
        $_SESSION['Message'] = "Не знайдено даних.";
        header('Location: /View/admin/AdminPage.php');
        exit;
    } else {
        if (isset($_SESSION['UserDataForChange'])) {
            unset($_SESSION['UserDataForChange']);
        }
        if (!isset($_SESSION['UserDataForChange'])) {
            $_SESSION['UserDataForChange'] = [

                "id_user" => $userFullDataVal['id_user'],
                "Email" => $userFullDataVal['Email'],
                "Name" => $userFullDataVal['Name'],
                "UserName" => $userFullDataVal['UserName'],
                "Age" => $userFullDataVal['Age'],
                "genderId" => $userFullDataVal['genderId'],
                "roleId" => $userFullDataVal['roleId'],
                "image"=>$image['title_image']

            ];
        }

        header('Location: /View/admin/ChangeUserPage.php');
        exit;
    }
}else
{

$userIdGet = $_POST['searchUserId'];
$userFullDataVal =  mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` 
WHERE `id_user` = '$userIdGet'"));

$id_user = $_POST['searchUserId'];
$Email = $_POST['Email'];
$Name = $_POST['Name'];
$UserName = $_POST['UserName'];
$Age = $_POST['Age'];
$genderId = $_POST['genderId'];
$roleId = $_POST['roleId'];
mysqli_query($connect,"UPDATE `user` SET 
`id_user`='$id_user',`Email`='$Email',
`Name`='$Name',`UserName`='$UserName',
`Age`='$Age',`genderId`='$genderId',
`roleId`='$roleId' 
WHERE `id_user` = '$id_user'");

$_SESSION['Message'] = "Дані користувача $UserName успішно змінені.";
header('Location: /View/admin/AdminPage.php');
}