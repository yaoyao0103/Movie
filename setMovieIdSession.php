<?php
    session_start();
    $movieId = $_GET['movieId'];
    $_SESSION['movieId'] = $movieId;

?>