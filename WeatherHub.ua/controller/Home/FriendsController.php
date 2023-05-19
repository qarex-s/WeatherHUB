<?php
session_start();
if (!isset($_SESSION['userToken'])) {
    $_SESSION['Message'] = "Треба увійти в аккаунт";
    header('Location: /View/auth/Login.php');
    exit;
}

require_once '../../dbphp/Connectiondb.php';
if (!$connect) {
    die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
}
$mainUserId = $_SESSION['userToken']['id_user'];

$takeFollowUsersId = mysqli_query($connect, "SELECT `second_userId` FROM `friendship` WHERE `first_userId` = '$mainUserId' AND `isFriend` = '1'");


$arrayFollowIdUser= array();
while($takingFollowUserId = mysqli_fetch_assoc($takeFollowUsersId)){
    array_push($arrayFollowIdUser,$takingFollowUserId['second_userId']);
}
if (empty($arrayFollowIdUser)) {

    $_SESSION['Message'] = "У вас немає друзів:( Додайте:)";
    header('Location: /View/Home/SearchPage.php');
}

$FollowUsersIdString = implode(',',$arrayFollowIdUser);

$takeFollowUsers = mysqli_query($connect, "SELECT * FROM `user` WHERE `id_user` IN ($FollowUsersIdString)");
$followUsersArray = array();

while ($takeUsers = mysqli_fetch_assoc($takeFollowUsers)) {
    array_push($followUsersArray, $takeUsers);
}

$_SESSION['FriendUser'] = $followUsersArray;

header('Location: /View/Home/Friends.php');