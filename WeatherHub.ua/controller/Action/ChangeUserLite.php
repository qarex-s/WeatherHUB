<?php
session_start();

if (!isset($_SESSION['userToken'])) {
    $_SESSION['Message'] = "Треба увійти.";
    header('Location: /View/auth/Login.php');
}
require_once '../../dbphp/Connectiondb.php';
if (!$connect) {
    die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
}
if (!isset($_POST['id_auth'])) {

    $userIdGet = $_SESSION['userToken']['id_user'];
    $authUserDataVal = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `auth` WHERE `userId` = '$userIdGet'"));
    $_SESSION['AuthUserForEditLite'] = $authUserDataVal;

    header('Location: /View/action/ChangeUserPageLite.php');
    exit;
} else {

    $idAuth = $_POST['id_auth'];
    //checking password
    $password = $_SESSION['AuthUserForEditLite']['passValue'];
    if($_POST['oldPassword'] =='' && $_POST['newPassword'] == '' && $_POST['ConPassword']==''){
        $password = $_SESSION['AuthUserForEditLite']['passValue'];
    }else if ($_POST['oldPassword'] != $_SESSION['AuthUserForEditLite']['passValue']) {
        $_SESSION['Message'] = "Старий пароль не вірний.";
        header('Location: /View/action/ChangeUserPageLite.php');
    } else if ($_POST['newPassword'] == "" && $_POST['ConPassword'] == "") {
        $_SESSION['Message'] = "Заповни всі дані";
        header('Location: /View/action/ChangeUserPageLite.php');
    } else if ($_POST['newPassword'] != $_POST['ConPassword']) {
        $_SESSION['Message'] = "Нові паролі не співпадають";
        header('Location: /View/action/ChangeUserPageLite.php');
    }  
    else {
        $password = $_POST['newPassword'];
    }
    $id_user = $_SESSION['userToken']['id_user'];
    $id_auth = $_POST['id_auth'];
    $Email = $_POST['Email'];
    $Name = $_POST['Name'];
    $UserName = $_POST['UserName'];
    $Age = $_POST['Age'];
    $genderId = $_POST['genderId'];

    mysqli_query($connect, " UPDATE `user` SET 
    `Email`='$Email',`Name`='$Name',`UserName`='$UserName',
    `Age`='$Age',`genderId`='$genderId' WHERE `id_user` = '$id_user'");
   $newUserData = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE `id_user` = '$id_user'"));

    mysqli_query($connect, " UPDATE `auth` SET `id_auth`='$id_auth',
    `userId`='$id_user',`Login`='$Email',`passValue`='$password' WHERE `id_auth` = '$id_auth'");
    unset( $_SESSION['AuthUserForEditLite']);
    $_SESSION['userToken'] = [
        "id_user"=>$newUserData['id_user'],
        "Email"=>$newUserData['Email'],
        "Name"=>$newUserData['Name'],
        "UserName"=>$newUserData['UserName'],
        "Age"=>$newUserData['Age'],
        "genderId"=>$newUserData['genderId'],
        "roleId"=>$newUserData['roleId']
       ];
    $_SESSION['Message'] = "Ваші дані були успішно змінені.";
    header('Location: /View/Home/Profile.php');
    }






