<?php
if(!isset($_SESSION['userToken'])){
    $_SESSION['Message'] = "Треба увійти в аккаунт";
    header('Location: /View/auth/Login.php');
}
require_once 'TranslateWord.php';

function RecomendedStat($Weather, $Temperature)
{
    global $WeatherInfo;
    $scale = $WeatherInfo[$Weather];

   

    if($Temperature > 35){
        $scale -= 2;
    }else if ($Temperature >= 25 && $Temperature <= 35) {
        $scale += 0;
    } else if ($Temperature >= 15 && $Temperature < 25) {
        $scale += 2;
    } else if ($Temperature >= 5 && $Temperature < 15) {
        $scale += 7;
    } else if ($Temperature >= -5 && $Temperature < 5) {
        $scale += 9;
    } else if ($Temperature >= -30 && $Temperature < -5) {
        $scale += 10;
    } else if ($Temperature >= -60 && $Temperature < -30) {
        $scale += 11;
    }

    if($scale<0){
        $scale=1;
    }
     if($scale>10){
        $scale = 10;
    }
    return $scale;

}


function RecomendedImg($someSkale,$ClothesScale)
{

    global $clothesImage;
    $resultScale = ($someSkale)+($ClothesScale);
    if($resultScale<1) $resultScale = 1;
    if($resultScale>10)$resultScale = 10;
    if($someSkale==11 && $ClothesScale==0){
        $resultScale = 11;
    }
    return $clothesImage[$resultScale];
}

function RecomendedText($someSkale)
{
    global $GeneralScale;
    global $GeneratorEntries;
    $numForEntires = rand(1, 9);
    $Entry = $GeneratorEntries[$numForEntires];
    $WeatherInfoText = $GeneralScale[$someSkale];
    return $Entry.$WeatherInfoText;
}


function ClothesScaleFunc($nameFavClothe){
    global $ClothesScale;
    return $ClothesScale[$nameFavClothe];
}