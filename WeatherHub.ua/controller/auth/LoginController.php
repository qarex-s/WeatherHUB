<?php
session_start();
require_once '../../dbphp/Connectiondb.php';
if (!$connect) {
  die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
}
$login = $_POST['login'];
$password = md5($_POST['password']);


if (trim($login) == "" || trim($password) == "") {
  $_SESSION['Message'] = "Заповніть поля";
  header('Location: /View/auth/Login.php');
}


$checkUserDataAuth = mysqli_query($connect, "SELECT * FROM `auth` WHERE `Login` = '$login' ");
if(mysqli_fetch_row($checkUserDataAuth) > 0){
  $takeUserAuthValArray = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `auth` WHERE `Login` = '$login' "));
  if($takeUserAuthValArray['passValue'] == $password){
    $takeUserData = mysqli_query($connect, "SELECT * FROM `user` WHERE `Email` = '$login' ");
    $takeUserDataArray = mysqli_fetch_assoc($takeUserData);
    $_SESSION['userToken'] = [
     "id_user"=>$takeUserDataArray['id_user'],
     "Email"=>$takeUserDataArray['Email'],
     "Name"=>$takeUserDataArray['Name'],
     "UserName"=>$takeUserDataArray['UserName'],
     "Age"=>$takeUserDataArray['Age'],
     "genderId"=>$takeUserDataArray['genderId']
    ];
    header('Location: /controller/Home/WeatherController.php');
  }
}else{
  $_SESSION['Message'] = "Не правильний пароль";
  header('Location: /View/auth/Login.php');
}