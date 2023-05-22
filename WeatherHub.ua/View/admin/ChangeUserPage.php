<?php
session_start();
if(!isset($_SESSION['userToken'])){
    $_SESSION['Message'] = "Треба увійти в аккаунт";
    header('Location: /View/auth/Login.php');
}
if (!isset($_SESSION['UserDataForChange'])) {
    $_SESSION['Message'] = "Вибери користувача UserDataForChange.";
    header('Location: /View/admin/AdminPage.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профіль</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="text-center mt-5">
            <img src="../../<?=$_SESSION['UserDataForChange']['image']?>" class="rounded-circle" alt="Avatar" style="width: 150px; height: 150px;">
        </div>
        <div class="row mt-3">
            <div class="col-md-6 offset-md-3">
                <form method="post" action="/controller/area/admin/ChangeUser.php">
                    <div class="form-group">
                        <label for="email">Пошта</label>
                        <input type="email" name="Email" value="<?=$_SESSION['UserDataForChange']['Email']?>" class="form-control" id="email" placeholder="Введи пошту">
                    </div>
                    <div class="form-group">
                        <label for="name">Ім'я</label>
                        <input type="text" name="Name" value="<?=$_SESSION['UserDataForChange']['Name']?>" class="form-control" id="name" placeholder="Введи ім'я">
                    </div>
                    <div class="form-group">
                        <label for="username">Нік</label>
                        <input type="text" name="UserName" value="<?=$_SESSION['UserDataForChange']['UserName']?>" class="form-control" id="username" placeholder="Введи нік">
                    </div>
                    <div class="form-group">
                        <label for="age">Вік</label>
                        <input type="number" name="Age" value="<?=$_SESSION['UserDataForChange']['Age']?>" class="form-control" id="age" placeholder="Введи вік">
                    </div>
                    <div class="form-group">
                        <label for="gender">Стать</label>
                        <select name="genderId" class="form-control" id="gender">
                            <option <?php if($_SESSION['UserDataForChange']['genderId'] == 1)echo 'selected';?>  value="1">Чоловік</option>
                            <option <?php if($_SESSION['UserDataForChange']['genderId'] == 2)echo 'selected';?>  value="2">Жінка</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role">Роль</label>
                        <select name="roleId" class="form-control" id="role">
                            <option <?php if($_SESSION['UserDataForChange']['roleId'] == 1)echo 'selected';?> value="1">Адмін</option>
                            <option <?php if($_SESSION['UserDataForChange']['roleId'] == 2)echo 'selected';?> value="2">Користувач</option>
                        </select>
                    </div>
                    <input type="hidden" value="<?=$_SESSION['UserDataForChange']['id_user']?>" name="searchUserId">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Зберегти</button>
                        <a href="/View/admin/AdminPage.php" class="btn btn-secondary">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
