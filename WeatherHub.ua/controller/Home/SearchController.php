<?php
session_start();

if (isset($_SESSION['userToken'])) {
    if (!isset($_GET['userName']) || trim($_GET['userName']) === "") {
        $_SESSION['Message'] = "Введіть нікнейм користувача";
        header('Location: /View/Home/SearchPage.php');
        exit;
    }
} else {
    header('Location: /View/Home/Profile.php');
    exit;
}

require_once '../../dbphp/Connectiondb.php';
if (!$connect) {
    die('Помилка підключення до бази даних: ' . mysqli_connect_error());
}

$userName = $_GET['userName'];

$isExistUser = mysqli_query($connect, "SELECT * FROM `user` WHERE `UserName` LIKE '%$userName%' ");

if (mysqli_num_rows($isExistUser) > 0) {
    $arrUsers = array();
    while ($rowData = mysqli_fetch_assoc($isExistUser)) {
        $idUser = $rowData['id_user'];
        $imageUser = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `image` WHERE `userId` = '$idUser'"));
        if ($imageUser != null) {
            $rowData['image'] = $imageUser['title_image'];
        } else {
            $rowData['image'] = 'nothing';
        }
        $arrUsers[] = $rowData;
    }

    $jsonResult = json_encode($arrUsers);

    header('Content-Type: application/json');
    echo $jsonResult;
    exit;
} else {
    $_SESSION['Message'] = "Користувача не знайдено.";
    header('Location: /View/Home/SearchPage.php');
    exit;
}
?>
