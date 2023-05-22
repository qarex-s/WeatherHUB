<?php
session_start();

if(!isset($_GET['searchUserId'])){
    $_SESSION['Message'] = "Введіть нікнейм користувача";
    header('Location: /View/Home/SearchPage.php');
    exit;
}
if(isset($_SESSION['infoReactionWeatherInProfile'])){
    unset($_SESSION['infoReactionWeatherInProfile']);
}
if(isset($_SESSION['infoReactionInProfile'])){
unset($_SESSION['infoReactionInProfile']);
}
require_once '../../Repository/TranslateWord.php';
require_once '../../dbphp/Connectiondb.php';
if (!$connect) {
    die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
  }
$userId = $_GET['searchUserId'];
$takeUserValArray = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE `id_user` = '$userId' "));
$isFollow = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `friendship` WHERE `second_userId` = '$userId'"));
    $_SESSION['isFollowed'] = $isFollow['isFriend'];


$takeReactionUser = mysqli_fetch_assoc(mysqli_query($connect,
"SELECT * FROM `reactionUser` WHERE `userId` = '$userId'"));
if($takeReactionUser != null){
    $WeatherId = $takeReactionUser['weatherId'];

    $takeWeatherUser = mysqli_fetch_assoc(mysqli_query($connect,
    "SELECT * FROM `weather` WHERE `id_weather` = $WeatherId"));
    $_SESSION['infoReactionWeatherInProfile'] = $takeWeatherUser;
    $_SESSION['infoReactionInProfile'] = $ReactionDictionary[$takeReactionUser['reactionId']];
}


$image = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `image` WHERE `userId` = '$userId'"));

if(isset($_SESSION['FindedUser'])){
    unset($_SESSION['FindedUser']);
}

$_SESSION['FindedUser'] = [
    "id_user"=>$takeUserValArray['id_user'],
    "Email"=>$takeUserValArray['Email'],
    "Name"=>$takeUserValArray['Name'],
    "UserName"=>$takeUserValArray['UserName'],
    "Age"=>$takeUserValArray['Age'],
    "genderId"=>$takeUserValArray['genderId'],
    "image"=>$image['title_image']

];

header('Location: /View/Home/ViewProfile.php');
