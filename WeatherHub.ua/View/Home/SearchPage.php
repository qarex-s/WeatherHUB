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
    <title>Результат пошуку</title>

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
    <?php include_once '../../predownload/header.php'; ?>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <form class="input-group w-100 col-md-12" method="get" action="/controller/Home/SearchController.php">
                    <input type="text" class="form-control" name="userName" id="searchInput" placeholder="Знайти користувача...">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary" id="buttonSearch">Пошук</button>
                    </div>
                </form>
                <?php
                if (isset($_SESSION["Message"])) {
                    echo '<h5 class="text-center">' . $_SESSION['Message'] . '</h5>';
                    unset($_SESSION["Message"]);
                }
                ?>
            </div>
        </div>
        <div class="row justify-content-center mt-4" id="gettingUserData">
            <div class="col-md-8">
            </div>
        </div>
    </div>

    <script>
        var form = document.querySelector('form');
        var searchButton = document.querySelector('#buttonSearch');

        searchButton.addEventListener('click', function(e) {
            e.preventDefault();
            var userName = document.querySelector('#searchInput').value;

            
            fetch(`/controller/Home/SearchController.php?userName=${userName}`)
                .then(function(response) {
                    return response.json(); 
                })
                .then(function(data) {
                    var userDataContainer = document.querySelector('#gettingUserData');
                    userDataContainer.innerHTML = ''; 

                    data.forEach(function(user) {
                        var userHtml = `
                            <div class="d-flex align-items-center border p-3">
                                <div class="rounded-circle overflow-hidden" style="width: 100px; height: 100px;">
                                    <img src="../../${user.image}" class="img-fluid rounded-circle" alt="Profile Image">
                                </div>
                                <div class="ml-3">
                                    <input type="hidden" name="searchUserId" value="${user.id_user}"/> 
                                    <h4>@${user.UserName}</h4>
                                    <p>Email: ${user.Email}</p>
                                    <p>Age: ${user.Age}</p>
                                </div>
                                <a href="/controller/Home/ViewProfileController.php?searchUserId=${user.id_user}" type="button" class="btn btn-primary ml-auto">Перейти</a>
                            </div>
                        `;
                        userDataContainer.insertAdjacentHTML('beforeend', userHtml);
                    });
                })
                .catch(function(error) {
                    console.error('Під час виконання запиту сталася якась помилка:', error);
                });
        });
    </script>
</body>

</html>
