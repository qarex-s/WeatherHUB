<?php

$connect = mysqli_connect('localhost', 'root', '', 'weatherdb');

if (!$connect) {
    die('Error connect');
}
