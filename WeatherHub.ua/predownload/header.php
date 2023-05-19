<?php
session_start();
?>


<header class="p-3 text-bg-dark">
    <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-end">

            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <?php
            if (isset($_SESSION['userToken'])) {
                echo '
                            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                                <li><a href="/Controller/Home/WeatherController.php" class="nav-link px-2 text-secondary">Weather</a></li>
                                <li><a href="/Controller/Home/ProfileController.php" class="nav-link px-2 text-dark">Profile</a></li>
                                <li><a href="/Controller/Home/SearchController.php" class="nav-link px-2 text-dark">Search</a></li>
                                <li><a href="/Controller/Home/FriendsController.php" class="nav-link px-2 text-dark">Friends</a></li>
                                <li><a href="#" class="nav-link px-2 text-dark">About</a></li>
                            </ul>
                            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                                <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Введіть місто..." aria-label="Search">
                            </form>
                            <div class="text-end">
                                <form method="get" action="/controller/auth/LogoutController.php">
                                    <button type="submit" class="btn btn-dark">Log-out</button>
                                </form>
                            </div>
                            ';
            } else {
                echo '
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/Controller/Home/WeatherController.php" class="nav-link px-2 text-secondary">Weather</a></li>
                </ul>
                <div class="text-end">
                <div class="d-flex align-items-center ">
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                                <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Введіть місто..." aria-label="Search">
                            </form>
                    <form method="get" action="/View/auth/Login.php" class="d-inline mx-2">
                        <button type="submit" class="btn btn-outline-dark ">Login</button>
                    </form>
                    
                    <form method="get" action="/View/auth/Registration.php" class="d-inline mx-2">
                        <button type="submit" class="btn btn-dark ">Sign-up</button>
                    </form>
                    </div>
            </div>
                ';
            }
            ?>





        </div>
    </div>
</header>