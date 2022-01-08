<?php

    session_start();
    $username = $_SESSION['username'];
    $star = intval($_POST['stars']);
    $movie_id = intval($_POST['movieId']);
    $conn = mysqli_connect("localhost", "yao", "1234", "movie_db"); // connect to DB
    mysqli_set_charset($conn,"utf8");
    $sql = "CREATE trigger check_rating_bound after insert on ratings
        referencing new row as nrow
        for each row
        when nrow.star > 5 or nrow.star < 1
        begin
            rollback
        end;";
    mysqli_query($conn, $sql);
    $sql = "INSERT INTO ratings VALUES('$movie_id', '$star', '$username')";
    mysqli_query($conn, $sql);
    echo $username . " " .  $star . " " . $movie_id;
?>