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
  <div class="container">
    <div class="row">
        <?php
            foreach($_SESSION['FriendUser'] as $key => $val){
                echo '
                
                <div class="col-md-3">
                    <div class="card mb-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/BMW_X6_M_Competition_%2851810371798%29.jpg/1200px-BMW_X6_M_Competition_%2851810371798%29.jpg" class="card-img-top" alt="Photo 1">
                            <div class="card-body">
                                <h5 class="card-title text-center">'.$val['Name'].'</h5>
                                <p class="card-text text-center">Name 1</p>
                                <p class="card-text text-center">City 1</p>
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
