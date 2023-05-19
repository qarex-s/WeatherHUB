<?php
session_start();

if (!isset($_SESSION['userToken'])) {
    $_SESSION['Message'] = "Треба увійти в аккаунт";
    header('Location: /View/auth/Login.php');
}
if (!isset($_SESSION['FindedUser'])) {
    $_SESSION['Message'] = "Ти не вибрав користувача";
    header('Location: /View/Home/SearchPage.php');
}
$MainUserId = $_SESSION['userToken']['id_user'];
$ChoosedUserId = $_SESSION['FindedUser']['id_user'];
require_once '../../dbphp/Connectiondb.php';
if (!$connect) {
  die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
}
$checkFriendShipUsers = mysqli_query($connect, "SELECT * FROM `friendship` WHERE `first_userId` = '$MainUserId' AND `second_userId` = '$ChoosedUserId' ");
$takeFriendShip =mysqli_fetch_assoc($checkFriendShipUsers);
if($takeFriendShip ){
    $isFriend = $takeFriendShip['isFriend'];
    if($isFriend == 1){
        mysqli_query($connect,"UPDATE `friendship` SET `isFriend`='0' WHERE (`first_userId` = '$MainUserId' AND `second_userId` = '$ChoosedUserId')");
    }else{
        mysqli_query($connect,"UPDATE `friendship` SET `isFriend`='1' WHERE (`first_userId` = '$MainUserId' AND `second_userId` = '$ChoosedUserId')");
    }
}else{
    mysqli_query($connect,"INSERT INTO `friendship` (`id_friend`, `first_userId`, `second_userId`, `isFriend`) 
    VALUES (NULL, '$MainUserId', '$ChoosedUserId', '1')");
}



mysqli_close($connect);

header('Location: /View/Home/ViewProfile.php');
