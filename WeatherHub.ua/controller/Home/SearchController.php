<?php
session_start();

if(isset($_SESSION['userToken'])){
    header('Location: /View/Home/SearchPage.php');
    if(!isset($_GET['userName'])){
        header('Location: /View/Home/SearchPage.php');
        exit;
    }
}else{
    header('Location: /View/Home/Profile.php');
    exit;
}


if(!isset($_GET['userName']) || trim($_GET['userName']) =="" ){
    $_SESSION['Message'] = "Введіть нікнейм користувача";
    header('Location: /View/Home/SearchPage.php');
    exit;
}

require_once '../../dbphp/Connectiondb.php';
if (!$connect) {
  die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
}
$userName = $_GET['userName'];

$isExistUser = mysqli_query($connect, "SELECT * FROM `user` WHERE `UserName` Like '%$userName%' ");


if(mysqli_fetch_row($isExistUser) > 0){

    

    $userValue = mysqli_query($connect, "SELECT * FROM `user` WHERE `UserName` Like '%$userName%' ");
    $arrUsers = array();
    $arrValUsers = array();
    while($rowData = mysqli_fetch_assoc($userValue)){
        array_push($arrUsers,$rowData);
    }

   /* $_SESSION['userInfo']=[


        "id_user"=>$userValue['id_user'],
        "Email"=>$userValue['Email'],
        "Name"=>$userValue['Name'],
        "UserName "=>$userValue['UserName'],
        "Age"=>$userValue['Age'],
        "genderId"=>$userValue['genderId']
    ];
    */
    $_SESSION['userInfo']=$arrUsers;
    $_SESSION['valUser'] = $userValue['Email'];
    header('Location: /View/Home/SearchPage.php');
    exit;
}else{
    $_SESSION['Message'] = "Користувача не знайдено.";
    header('Location: /View/Home/SearchPage.php');
    exit;
}


