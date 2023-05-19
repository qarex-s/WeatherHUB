<?php
session_start();
if(!isset($_SESSION['userToken'])){
    $_SESSION['Message'] = "Треба увійти в аккаунт";
    header('Location: /View/auth/Login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Моя сторінка</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .avatar {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    }

    .card-wrapper {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      margin-top: 20px;
    }

    .card-wrapper .card {
      width: 200px;
      margin: 10px;
    }
  </style>
</head>
<body>
<?= include_once '../../predownload/header.php' ?>
  <div class="container">
    <div class="text-center">
      <img src="https://www.bmw.com.br/content/dam/bmw/marketBR/bmw_com_br/vendas-corporativas/vendascorporativas_teaser.jpg" alt="Avatar" class="avatar">
      <h4 class="mt-3">@<?=$_SESSION['userToken']['UserName']?></h4>
      <h4 class="mt-3"><?=$_SESSION['userToken']['Name']?></h4>
    </div>
    <hr class="md-5">
    <div class="card-wrapper col-md-15 d-flex justify-content-center  md-5 md-5">
      <div class="card col-md-4 text-center img-fluid mx-auto d-block ">
        <img src="https://play-lh.googleusercontent.com/ItgvmfRg1po4nK925wRrEDrjFl2b8zGwiKCT9E6unaDgbga8yJIviFgtTLc1YJueGs4" style="width: 300px; height: 250px; object-fit: contain;" alt="Photo 1" class="card-img-top ">
        <div class="card-body">
          <p class="card-text">Опис фото 1</p>
        </div>
      </div>
      <div class="card col-md-4  text-center img-fluid mx-auto d-block">
        <img src="https://motor.ru/imgs/2022/09/28/02/5602932/18f509e7c1a7511c978e090d30974f1825123bd1.jpg" style="width: 300px; height: 250px; object-fit: contain;" alt="Photo 2" class="card-img-top ">
        <div class="card-body">
          <p class="card-text">Опис фото 2</p>
        </div>
      </div>
      <div class="card col-md-4 text-center img-fluid mx-auto d-block" >
        <img src="https://motor.ru/imgs/2022/09/28/02/5602932/18f509e7c1a7511c978e090d30974f1825123bd1.jpg" style="width: 300px; height: 250px; object-fit: contain; " alt="Photo 3" class="card-img-top">
        <div class="card-body">
          <p class="card-text">Опис фото 3</p>
        </div>
      </div>
    </div>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
