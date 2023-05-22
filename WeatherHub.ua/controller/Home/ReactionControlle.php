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

$getReaction = $_GET['Reaction'];
$userId = $_SESSION['userToken']['id_user'];

$nameWeather = $_SESSION['WeatherDataToken']['Weather'];
$tempWeather = $_SESSION['WeatherDataToken']['TempMax'];
$cloudWeather = $_SESSION['WeatherDataToken']['Cloud'];
$windWeather = $_SESSION['WeatherDataToken']['SpeedWind'];
$cityWeather = $_SESSION['WeatherDataToken']['City'];
$dateTimeDay = $_SESSION['WeatherDataToken']['dateTime'];
$imageWeather = $_SESSION['WeatherDataToken']['ImageWeather'];
$setWeather = mysqli_query($connect,"INSERT INTO `weather` (`id_weather`,
`Name_weather`, `Temperature`, `City`,
`Cloud`, `Wind`, `Date`, `userId`, `ImageWeather`) VALUES (NULL,
'$nameWeather', '$tempWeather', '$cityWeather',
'$cloudWeather', '$windWeather', '$dateTimeDay', '$userId', '$imageWeather')");


$getWeather = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * 
FROM `weather` WHERE `userId` = '$userId' && `Date` = '$dateTimeDay' "));
$getWeatherId = $getWeather['id_weather'];
if(mysqli_fetch_row(mysqli_query($connect,"SELECT * FROM `reactionUser` WHERE `userId` = '$userId'"))>0){
    mysqli_query($connect,"UPDATE `reactionUser` SET 
   `weatherId`='$getWeatherId',`reactionId`='$getReaction' WHERE `userId` = '$userId'");
}else{
    mysqli_query($connect,"INSERT INTO `reactionUser` (`id_reactionUser`, 
    `userId`, `weatherId`, `reactionId`) VALUES (NULL, '$userId', '$getWeatherId', '$getReaction')");
}

header('Location: /View/Home/Weather.php');