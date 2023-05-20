<?php
session_start();
if(!isset($_SESSION['userToken'])){
    $_SESSION['Message'] = "Треба увійти в аккаунт";
    header('Location: /View/auth/Login.php');
}
if(!isset($_SESSION['FriendUser'])){
  $_SESSION['Message'] = "У тебе немає друзів";
    header('Location: /View/Home/SearchPage.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?= include_once '../../predownload/header.php' ?>
  <div class="container">
    <div class="row">
        <?php
            foreach($_SESSION['FriendUser'] as $key => $val){
                echo '
                
                <div class="col-md-3">
                    <div class="card mb-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/BMW_X6_M_Competition_%2851810371798%29.jpg/1200px-BMW_X6_M_Competition_%2851810371798%29.jpg" class="card-img-top" alt="Photo 1">
                            <div class="card-body text-start">
                                <h5 class="card-title">Name: '.$val['Name'].'</h5>
                                <p class="card-text">Nik: '.$val['UserName'].'</p>
                                <p class="card-text">Age: '.$val['Age'].'</p>
                                <a href="/controller/Home/ViewProfileController.php?searchUserId='.$val['id_user'].'" type="button" class="btn btn-primary mt-3 d-flex justify-content-center">Переглянути</a>
                            </div>
                    </div>
                </div>
                
                ';
            }
        ?>
    </div>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
