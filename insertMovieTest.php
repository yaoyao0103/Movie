<?php
    $conn = mysqli_connect("localhost", "plusxk2", "a147896325", "movie_db"); // connect to DB
    /*$sql = "INSERT INTO movies VALUES( 1, '阿凡達', 2009, 170, '科幻')";
    $result = mysqli_query($conn, $sql); 
    $sql = "INSERT INTO directors VALUES( 1, '詹姆斯', '卡麥隆')";
    $result = mysqli_query($conn, $sql); 
    $sql = "INSERT INTO movie_directors VALUES( 1, 1)";
    $result = mysqli_query($conn, $sql); */
    $sql = "INSERT INTO actors VALUES( 2, '山姆', '沃辛頓', 'm')";
    $result = mysqli_query($conn, $sql); 
    $sql = "INSERT INTO movie_cast VALUES( 1, 2, '傑克 薩利裡 托米')";
    $result = mysqli_query($conn, $sql); 
    $sql = "INSERT INTO actors VALUES( 3, '雪歌妮', '薇佛', 'f')";
    $result = mysqli_query($conn, $sql); 
    $sql = "INSERT INTO movie_cast VALUES( 1, 3, '葛莉絲')";
    $result = mysqli_query($conn, $sql); 
?>