<?php
session_start();
if(isset($_SESSION['userToken'])){
    header('Location: /View/Home/Profile.php');
  }
require_once '../../dbphp/Connectiondb.php';
$email = $_POST['email'];
$name = $_POST['name'];
$userName = $_POST['userName'];
$age = $_POST['age'];
$password =md5($_POST['password']);
$confirmPassword = md5($_POST['confirmPassword']);
$roleId = 2;

if($password != $confirmPassword)
{
    $_SESSION['Message'] = "Password is not confirmed";
    header('Location: /View/auth/Registration.php');
}else if(trim($email) == "" || trim($email) == "" ||trim($name) == "" ||trim($userName) == "" ||trim($age) == "" ||trim($password) == "" )
{
    $_SESSION['Message'] = "Заповни всі поля";
    header('Location: /View/auth/Registration.php');
}else
{
    $checkSameUser = mysqli_query($connect, "SELECT * FROM `user` WHERE `Email` = '$email' or `UserName` = '$userName' ");
    if(mysqli_fetch_row($checkSameUser) > 0){
        $_SESSION['Message'] = "Пошта або нікнейм вже використовуються";
        header('Location: /View/auth/Registration.php'); 
        exit;
    }
    if($email=="Admin@gmail.com"){
        $roleId = 1;
    }
    mysqli_query($connect," INSERT INTO `user` (`id_user`, `Email`, `Name`, `UserName`, `Age`, `genderId`, `roleId`) VALUES (NULL, '$email', '$name', '$userName', '$age', '1','$roleId')");
    $takeUserVal = mysqli_query($connect, "SELECT * FROM `user` WHERE `email` = '$email' ");
    $takeUserValForArray = mysqli_fetch_assoc($takeUserVal);
    if ($takeUserValForArray) {
        $takeIdUser = $takeUserValForArray['id_user'];
        mysqli_query($connect, "INSERT INTO `auth` (`id_auth`, `userId`, `Login`, `passValue`) VALUES (NULL, '$takeIdUser', '$email', '$password')");
        $_SESSION['Message'] = "Register is successful";
        header('Location: /View/auth/Login.php');
    } else {
        $_SESSION['Message'] = "Data not found";
        header('Location: /View/auth/Registration.php');
    }
}


