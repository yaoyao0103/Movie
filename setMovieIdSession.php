<?php
    session_start();
    $movieId = $_POST['movieId'];
    $_SESSION['movieId'] = $movieId;

?>