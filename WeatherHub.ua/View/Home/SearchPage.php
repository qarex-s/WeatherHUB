<?php
session_start();

if (!isset($_SESSION['userToken'])) {
    header('Location: /View/Auth/Login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .rounded-circle {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <?= include_once '../../predownload/header.php' ?>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class=" col-md-12">
                <form class="input-group w-100 col-md-12" method="get" action="/controller/Home/SearchController.php">
                    <input type="text" class="form-control" name="userName" id="searchInput" placeholder=" Знайти користувача...">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Пошук</button>
                    </div>
                </form>
                <?php
                if (isset($_SESSION["Message"])) {
                    echo '<h5 class="text-center" >' . $_SESSION['Message'] . '</h5>';
                    unset($_SESSION["Message"]);
                } else {
                }
                if (isset($_SESSION["valUser"])) {
                    echo '<span> val: ' . $_SESSION['valUser'] . '</span>';
                    unset($_SESSION["valUser"]);
                } else {
                }
                ?>
            </div>
        </div>
        <div class="row justify-content-center mt-4" id="gettingUserData">
            <div class="col-md-8">
                <?php
                if (!isset($_SESSION['userInfo'])) {
                } else {
                    foreach ($_SESSION['userInfo'] as $key => $val) {

                        echo '
                            
                                <div class="d-flex align-items-center border p-3">
                                <div class="rounded-circle overflow-hidden" style="width: 100px; height: 100px;">
                                    <img src="https://www.ixbt.com/img/n1/news/2022/7/5/bmw-ix5-bei-winter-tests_large.png" class="img-fluid rounded-circle" alt="Profile Image">
                                </div>
                                <div class="ml-3">
                                <input type="hidden" name="searchUserId" value="' . $val['id_user'] . '"/> 
                                    <h5>' . $val['Name'] . '</h5>
                                    <p>' . $val['Email'] . '</p>
                                    <p>City</p>
                                </div>
                                <a href="/controller/Home/ViewProfileController.php?searchUserId=' . $val['id_user'] . '" type="button" class="btn btn-primary ml-auto">Перейти</a>
                                </div>
                                
                            ';
                    }
                    unset($_SESSION['userInfo']);
                }

                ?>


            </div>

        </div>
    </div>

    </div>



</body>

</html>