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
    <title>User Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="text-center mt-5">
            <img src="avatar.jpg" class="rounded-circle" alt="Avatar" style="width: 150px; height: 150px;">
        </div>
        <div class="row mt-3">
            <div class="col-md-6 offset-md-3">
                <form method="post" action="/controller/area/admin/ChangeUser.php">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="Email" value="<?=$_SESSION['UserDataForChange']['Email']?>" class="form-control" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="Name" value="<?=$_SESSION['UserDataForChange']['Name']?>" class="form-control" id="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="UserName" value="<?=$_SESSION['UserDataForChange']['UserName']?>" class="form-control" id="username" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" name="Age" value="<?=$_SESSION['UserDataForChange']['Age']?>" class="form-control" id="age" placeholder="Enter age">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="genderId" class="form-control" id="gender">
                            <option <?php if($_SESSION['UserDataForChange']['genderId'] == 1)echo 'selected';?>  value="1">Male</option>
                            <option <?php if($_SESSION['UserDataForChange']['genderId'] == 2)echo 'selected';?>  value="2">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="roleId" class="form-control" id="role">
                            <option <?php if($_SESSION['UserDataForChange']['roleId'] == 1)echo 'selected';?> value="1">Admin</option>
                            <option <?php if($_SESSION['UserDataForChange']['roleId'] == 2)echo 'selected';?> value="2">User</option>
                        </select>
                    </div>
                    <input type="hidden" value="<?=$_SESSION['UserDataForChange']['id_user']?>" name="searchUserId">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="/View/admin/AdminPage.php" class="btn btn-secondary">Go Back</a>
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
