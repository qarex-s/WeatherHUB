<?php
session_start();
if(!isset($_SESSION['userToken'])){
    $_SESSION['Message'] = "Треба увійти в аккаунт";
    header('Location: /View/auth/Login.php');
}
if(!isset($_SESSION['AllClothes'])){
    $_SESSION['Message'] = "Треба увійти в аккаунт";
    header('Location: /View/auth/Login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Фотокарточки</title>
</head>

<body>
<div class="container">
<?= include_once '../../predownload/header.php' ?>
    
<h1 class="text-center mt-5">Вибраний одяг</h1>
    <div class="row mt-4">
        <?php
        foreach ($_SESSION['AllClothes'] as $clothe) {
            
            if(isset($_SESSION['ChoosedClothe']) && $_SESSION['ChoosedClothe'] == $clothe['id_clothe'] ){
                echo '
                <div class="col-md-4 mb-4 ">
                    <div class="card ">
                        <img src="' . $clothe['pathClothe'] . '" class="card-img-top" alt="Зображення 1">
                        <div class="card-body">
                            <h5 class="card-title">' . $clothe['NameClothe'] . '</h5>
                            <a href="/controller/Home/FavoriteController.php?idClothe='.$clothe['id_clothe'].'" class="btn btn-success">Вибрано</a>
                        </div>
                    </div>
                </div>
                ';
            }else{
                echo '
                <div class="col-md-4 mb-4 ">
                    <div class="card ">
                        <img src="' . $clothe['pathClothe'] . '" class="card-img-top" alt="Зображення 1">
                        <div class="card-body">
                            <h5 class="card-title">' . $clothe['NameClothe'] . '</h5>
                            <a href="/controller/Home/FavoriteController.php?idClothe='.$clothe['id_clothe'].'" class="btn btn-primary">Вибрати</a>
                        </div>
                    </div>
                </div>
                ';
            }
         
        }
        ?>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>