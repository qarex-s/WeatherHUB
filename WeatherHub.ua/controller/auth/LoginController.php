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
    $user_id = $takeUserDataArray['id_user'];
    $image = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `image` WHERE `userId` = '$user_id'"));
    $takeScaleClothe = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `fav_clothe` WHERE `userId` = '$user_id' "));
    $_SESSION['userToken'] = [
     "id_user"=> $user_id,
     "Email"=>$takeUserDataArray['Email'],
     "Name"=>$takeUserDataArray['Name'],
     "UserName"=>$takeUserDataArray['UserName'],
     "Age"=>$takeUserDataArray['Age'],
     "genderId"=>$takeUserDataArray['genderId'],
     "roleId"=>$takeUserDataArray['roleId'],
     "image"=>$image['title_image']

    ];
    if($_SESSION['userToken']['roleId'] == 1){
      header('Location: /controller/area/admin/AdminController.php');
    }else{
      header('Location: /controller/Home/WeatherController.php');
    }
  }
}else{
  $_SESSION['Message'] = "Не правильний пароль";
  header('Location: /View/auth/Login.php');
}