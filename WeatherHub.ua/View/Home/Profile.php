<?php
session_start();
if(!isset($_SESSION['userToken']) ||!isset($_SESSION['infoReactionWeatherInProfile'])){
    $_SESSION['Message'] = "Треба увійти в аккаунт";
    header('Location: /View/Home/Weather.php');
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
      <img src="../../<?=$_SESSION['userToken']['image']?>" alt="Avatar" class="avatar">
      <h2 class="mt-3">@<?=$_SESSION['userToken']['UserName']?></h2>
      <h5 class="mt-3">Ім'я: <?=$_SESSION['userToken']['Name']?></h5>
      <h6 class="mt-3">Пошта: <?=$_SESSION['userToken']['Email']?></h6>
        <a href="/controller/Action/ChangeUserLite.php" type="button" class="btn btn-secondary" >Редагувати</a>
    </div>
    <hr class="md-5">
    <div class="card-wrapper col-md-15 d-flex justify-content-center  md-5 md-5">
      <div class="card col-md-5 text-center img-fluid mx-auto d-block ">
        <img src="<?=$_SESSION['infoReactionWeatherInProfile']['ImageWeather']?>" style="width: 300px; height: 250px; object-fit: contain;" alt="Photo 1" class="card-img-top ">
        <div class="card-body">
        <h5 class="card-text ">Погода: <?=$_SESSION['infoReactionWeatherInProfile']['Name_weather']?></h5>
        <h6 class="card-text ">Місто: <?=$_SESSION['infoReactionWeatherInProfile']['City']?></h6>
        <h6 class="card-text "><?=$_SESSION['infoReactionWeatherInProfile']['Date']?></h6>
        <h6 class="card-text ">Температура: <?=$_SESSION['infoReactionWeatherInProfile']['Temperature']?>C</h6>
        <p class="card-text ">Хмарність: <?=$_SESSION['infoReactionWeatherInProfile']['Cloud']?>%</p>
        <p class="card-text ">Вітер: <?=$_SESSION['infoReactionWeatherInProfile']['Wind']?>м/с</p>
          <h4>Реакція:</h4>
          <h5><?=$_SESSION['infoReactionInProfile']?></h5>
        </div>
      </div>
    </div>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
