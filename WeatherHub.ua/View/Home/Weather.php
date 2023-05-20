<?php
session_start();
?>
<!DOCTYPE html>

<html>
<head>
  <title>Weather</title>
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
<div class="row justify-content-start">
<div class="col-md-4  ">
        <div class="card mt-5 h-100">
            <img src="https://media.az/file/articles/2019/04/23/1556013206_d4317e4947e9887a3807b592e097b57d.jpg" class="card-img-top" alt="Big Image">
            <div class="card-body ">
                <h5 class="card-title">Погода</h5>
                <p class="card-text">Температура</p>
                <p class="card-text">Опади</p>
                <p class="card-text">Повітря</p>
                <p class="card-text">Вологість</p>
                <p class="card-text">Рекомендований одяг:</p>
                <p class="card-text">Верх: шапка</p>
                <p class="card-text">Кофта:</p>
                <p class="card-text">Кеди:</p>
            </div>
        </div>
    </div>
    <div class="col-md-8 ">
        <div class="card mt-5 h-100">
            <div class="card-body ">
                <h3 class="card-title text-center">Рекомендації</h3>
                <h5 class="card-text">Кофта</h5>
                <h5 class="card-text">Кросівки</h5>
            </div>
        </div>
    </div>
  
</div>

<hr class="my-5 mt-3">
<div class="row justify-content-center flex-wrap mt-4">
<div class="col-md-3">
        <div class="card mt-4">
            <img src="https://media.az/file/articles/2019/04/23/1556013206_d4317e4947e9887a3807b592e097b57d.jpg" class="card-img-top" alt="Image 1">
            <div class="card-body">
                <h4 class="card-title">Погода</h4>
                <h5 class="card-title">День</h5>

                <p class="card-text">Температура</p>
                <p class="card-text">Вологість</p>
            </div>
        </div>
    </div>
    <hr class="my-4">
    <div class="col-md-3">
        <div class="card mt-4">
            <img src="https://media.az/file/articles/2019/04/23/1556013206_d4317e4947e9887a3807b592e097b57d.jpg" class="card-img-top" alt="Image 2">
            <div class="card-body">
                <h4 class="card-title">Погода</h4>
                <h5 class="card-title">День</h5>
                <p class="card-text">Температура</p>
                <p class="card-text">Вологість</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mt-4">
            <img src="https://media.az/file/articles/2019/04/23/1556013206_d4317e4947e9887a3807b592e097b57d.jpg" class="card-img-top" alt="Image 2">
            <div class="card-body">
            <h4 class="card-title">Погода</h4>
                <h5 class="card-title">День</h5>
                <p class="card-text">Вологість</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mt-4">
            <img src="https://media.az/file/articles/2019/04/23/1556013206_d4317e4947e9887a3807b592e097b57d.jpg" class="card-img-top" alt="Image 2">
            <div class="card-body">
            <h4 class="card-title">Погода</h4>
                <h5 class="card-title">День</h5>
                <p class="card-text">Температура</p>
                <p class="card-text">Вологість</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mt-4">
            <img src="https://media.az/file/articles/2019/04/23/1556013206_d4317e4947e9887a3807b592e097b57d.jpg" class="card-img-top" alt="Image 2">
            <div class="card-body">
            <h4 class="card-title">Погода</h4>
                <h5 class="card-title">День</h5>
                <p class="card-text">Температура</p>
                <p class="card-text">Вологість</p>
            </div>
        </div>
</div>
<div class="col-md-3">
        <div class="card mt-4">
            <img src="https://media.az/file/articles/2019/04/23/1556013206_d4317e4947e9887a3807b592e097b57d.jpg" class="card-img-top" alt="Image 2">
            <div class="card-body">
            <h4 class="card-title">Погода</h4>
                <h5 class="card-title">День</h5>
                <p class="card-text">Температура</p>
                <p class="card-text">Вологість</p>
            </div>
        </div>
</div>
<div class="col-md-3">
        <div class="card mt-4">
            <img src="https://media.az/file/articles/2019/04/23/1556013206_d4317e4947e9887a3807b592e097b57d.jpg" class="card-img-top" alt="Image 2">
            <div class="card-body">
            <h4 class="card-title">Погода</h4>
                <h5 class="card-title">День</h5>
                <p class="card-text">Температура</p>
                <p class="card-text">Вологість</p>
            </div>
        </div>
</div>





</div>
<hr class="my-5">
      <?php
      if(isset($_SESSION["Message"])){
        echo '<span> message: ' . $_SESSION['Message'] . '</span>';
        unset($_SESSION["Message"]);
      }else{

      }
      ?>
    </div>
  </div>
  <?= include_once '../../predownload/footer.php' ?>
</body>
</html>
