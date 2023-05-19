<?php
session_start();
if(isset($_SESSION['userToken'])){
    header('Location: /View/Home/Weather.php');
}else{
    header('Location: /View/Home/WeatherLite.php');
}