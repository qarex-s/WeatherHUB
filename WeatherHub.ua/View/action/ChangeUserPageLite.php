<?php
session_start();
if(!isset($_SESSION['userToken'])){
    $_SESSION['Message'] = "Треба увійти в аккаунт";
    header('Location: /View/auth/Login.php');
}
if(!isset($_SESSION['AuthUserForEditLite'])){
    $_SESSION['Message'] = "Щось пішло не так...";
    header('Location: /View/Home/Profile.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="text-center mt-5">
            <img src="../../<?=$_SESSION['userToken']['image']?>" class="rounded-circle" alt="Avatar" style="width: 150px; height: 150px;">
        </div>
        <div class="row mt-3">
            <div class="col-md-6 offset-md-3">
                <form action="/controller/Action/ChangeUserLite.php" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="Email" value="<?=$_SESSION['AuthUserForEditLite']['Login']?>" class="form-control" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="Name" value="<?=$_SESSION['userToken']['Name']?>" class="form-control" id="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="UserName" value="<?=$_SESSION['userToken']['UserName']?>" class="form-control" id="username" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" name="Age" value="<?=$_SESSION['userToken']['Age']?>" class="form-control" id="age" placeholder="Enter age">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="genderId" class="form-control" id="gender">
                            <option <?php if($_SESSION['userToken']['genderId'] == 1)echo 'selected';?> value="1">Чоловік</option>
                            <option <?php if($_SESSION['userToken']['genderId'] == 2)echo 'selected';?> value="2">Жінка</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Минулий пароль</label>
                        <input type="password" name="oldPassword" class="form-control" id="oldPassword" placeholder="Старий пароль">
                    </div>
                    <div class="form-group">
                        <label>Новий пароль</label>
                        <input type="password" name="newPassword" class="form-control" id="newPassword" placeholder="Новий пароль">
                    </div>
                    <div class="form-group">
                        <label >Підтвердити пароль</label>
                        <input type="password" name="ConPassword" class="form-control" id="conPassword" placeholder="Підтвердити пароль">
                    </div>
                    <input type="hidden" name="id_auth" class="form-control" value="<?=$_SESSION['AuthUserForEditLite']['id_auth']?>">

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Зберегти</button>
                        <a href="/View/Home/Profile.php" class="btn btn-secondary">Назад</a>
                    </div>
                    <?php
                    if (isset($_SESSION["Message"])) {
                        echo '<span> message: ' . $_SESSION['Message'] . '</span>';
                        unset($_SESSION["Message"]);
                    } else {
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
