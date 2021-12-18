<?php
    $star = intval($_POST['star']);
    $movie_id = intval($_POST['movie_id']);
    $conn = mysqli_connect("localhost", "yao", "1234", "movie_db"); // connect to DB
    mysqli_set_charset($conn,"utf8");
    $sql = "UPDATE ratings SET stars = ((stars*rating_num)+$star)/(rating_num+1) WHERE movie_id = $movie_id";
    mysqli_query($conn, $sql);
    $sql = "UPDATE ratings SET rating_num = rating_num +1 WHERE movie_id = $movie_id ";
    mysqli_query($conn, $sql);
?>