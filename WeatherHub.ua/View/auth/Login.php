<?php
session_start();
if (isset($_SESSION['userToken'])) {
  header('Location: /View/Home/Profile.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Авторизация</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ">

  <style>
    .login-container {
      width: 300px;
      margin: 0 auto;
      margin-top: 300px;
    }

    .login-container h2 {
      text-align: center;
    }

    .login-container .form-group {
      margin-bottom: 20px;
    }

    .login-container .btn {
      width: 100%;
    }
  </style>
</head>

<body>
  <?= include_once '../../predownload/header.php' ?>

  <div class="container">
    <div class="login-container">
      <h2>Авторизация</h2>
      <form action="../../controller/auth/LoginController.php" method="post">
        <div class="form-group">
          <input type="text" name="login" class="form-control" placeholder="Логин">
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Пароль">
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
      </form>
      <form action="../../View/auth/Registration.php" method="post">
        <button type="submit" class="btn btn-secondary">Регистрация</button>
      </form>
      <?php
      if (isset($_SESSION["Message"])) {
        echo '<span> message: ' . $_SESSION['Message'] . '</span>';
        unset($_SESSION["Message"]);
      } else {
      }
      ?>
    </div>
  </div>
</body>

</html>