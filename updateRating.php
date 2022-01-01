<?php

    session_start();
    $username = $_SESSION['username'];
    $star = intval($_POST['stars']);
    $movie_id = intval($_POST['movieId']);
    $conn = mysqli_connect("localhost", "plusxk2", "a147896325", "movie_db"); // connect to DB
    mysqli_set_charset($conn,"utf8");
    $sql = "INSERT INTO ratings VALUES('$movie_id', '$star', '$username')";
    mysqli_query($conn, $sql);
    echo $username . " " .  $star . " " . $movie_id;
?>