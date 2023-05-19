<?php
session_start();
?>
<!DOCTYPE html>

<html>
<head>
  <title>Регистрация</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .register-container {
      width: 400px;
      margin: 0 auto;
      margin-top: 150px;
    }
    .register-container h2 {
      text-align: center;
    }
    .register-container .form-group {
      margin-bottom: 20px;
    }
    .register-container .btn {
      width: 100%;
    }
  </style>
</head>
<body>
<?= include_once '../../predownload/header.php' ?>
  <div class="container">
    <div class="register-container">
      <h2>Регистрация</h2>
      <form action="/controller/auth/RegistrationController.php" method="post">
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Почта">
        </div>
        <div class="form-group">
          <input type="text" name="name" class="form-control" placeholder="Имя">
        </div>
        <div class="form-group">
          <input type="text" name="userName" class="form-control" placeholder="Ник">
        </div>
        <div class="form-group">
          <input type="number" name="age" class="form-control" placeholder="Возраст">
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Пароль">
        </div>
        <div class="form-group">
          <input type="password" name="confirmPassword" class="form-control" placeholder="Подтвердите пароль">
        </div>
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
      </form>
      <form action="../../View/auth/Login.php" method="post">
        <button type="submit" class="btn btn-secondary">Регистрация</button>
      </form>
      <?php
      if(isset($_SESSION["Message"])){
        echo '<span> message: ' . $_SESSION['Message'] . '</span>';
        unset($_SESSION["Message"]);
      }else{

      }
      ?>
    </div>
  </div>
</body>
</html>
