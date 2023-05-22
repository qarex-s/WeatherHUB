<?php
session_start();
if (!isset($_SESSION['userToken'])) {
    $_SESSION['Message'] = "Треба увійти в аккаунт";
    header('Location: /View/auth/Login.php');
} 
require_once '../../Repository/TranslateWord.php';

require_once '../../dbphp/Connectiondb.php';
if (!$connect) {
    die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
}
$getUserId = $_SESSION['userToken']['id_user'];
$takeReactionUser = mysqli_fetch_assoc(mysqli_query($connect,
"SELECT * FROM `reactionUser` WHERE `userId` = '$getUserId'"));
if($takeReactionUser==null){
    header('Location: /View/Home/Profile.php');
}
$WeatherId = $takeReactionUser['weatherId'];

$takeWeatherUser = mysqli_fetch_assoc(mysqli_query($connect,
"SELECT * FROM `weather` WHERE `id_weather` = $WeatherId"));
$_SESSION['infoReactionWeatherInProfile'] = $takeWeatherUser;
$_SESSION['infoReactionInProfile'] = $ReactionDictionary[$takeReactionUser['reactionId']];

    header('Location: /View/Home/Profile.php');
