<?php
session_start();

if (!isset($_SESSION['WeatherDataToken']) || !isset($_SESSION['WeatherWeekToken'])) {
    header('Location: /View/Home/WeatherLite.php');
}
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
                    <img src="<?= $_SESSION['WeatherDataToken']['ImageWeather'] ?>" class="card-img-top" alt="Big Image">
                    <div class="card-body ">
                        <h2 class="card-title">Місце: <?= $_SESSION['WeatherDataToken']['City'] ?></h2>
                        <h3 class="card-title">Погода: <?= $_SESSION['WeatherDataToken']['Weather'] ?></h3>
                        <h5 class="card-text">Температура: <?= $_SESSION['WeatherDataToken']['Temperature'] ?>С</h5>
                        <h5 class="card-text">Хмарність: <?= $_SESSION['WeatherDataToken']['Cloud'] ?>%</h5>
                        <h5 class="card-text">Повітря: <?= $_SESSION['WeatherDataToken']['SpeedWind'] ?>м/с</h5>
                        <p class="card-text">Мінімальна температруа: <?= $_SESSION['WeatherDataToken']['TempMin'] ?>С</p>
                        <p class="card-text">Максимальна температруа: <?= $_SESSION['WeatherDataToken']['TempMax'] ?>С</p>
                        <p class="card-text">Рекомендований одяг: </p>
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




        <?php 
        
        foreach ($_SESSION['WeatherWeekToken'] as $datInfo) {
            echo '
            <div class="col-md-3">
                <div class="card mt-4">
                    <img src="' . $datInfo['imageWeather'] . '" class="card-img-top object-fit-cover" alt="Зображення 1">
                    <div class="card-body">
                        <h3 class="card-title">' . $datInfo["Day"] . '</h3>
                        <h4 class="card-title">Погода: ' . $datInfo["weather"][0]["main"] . '</h4>
                        <p class="card-text">Температура: ' . $datInfo["main"]["temp"] . 'C</p>
                        <p class="card-text">Середня температура:' . $datInfo["TempAvg"] . 'C</p>
                        <p class="card-text">Найнижча температура:' . $datInfo["TempMin"] . 'C</p>
                        <p class="card-text">Влажність:' . $datInfo['HumidityAvg'] . '%</p>
                        </div>
                </div>
            </div>
            <hr class="my-4">
            ';
        }
        
        
        ?>


            
                   
               
            





        </div>
        <hr class="my-5">
        <?php
        if (isset($_SESSION["Message"])) {
            echo '<span> message: ' . $_SESSION['Message'] . '</span>';
            unset($_SESSION["Message"]);
        } else {
        }
        ?>
    </div>
    </div>
    <?= include_once '../../predownload/footer.php' ?>
</body>

</html>