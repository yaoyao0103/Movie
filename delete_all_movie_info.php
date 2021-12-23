<?php
    error_reporting(0);
    session_start();
    $username = $_SESSION['username'];
    $isAdmin = $_SESSION['isAdmin'];
    $movieId = $_SESSION['movieId'];
    
    $conn = mysqli_connect("localhost", "root", "root", "movie_db"); // connect to DB
    
    $delete_movie_cast_sql = "DELETE FROM movies_cast WHERE movie_id=$movieId";
    $delete_movies_director_sql = "DELETE FROM movies_directors WHERE movie_id=$movieId";
    $delete_movies_sql = "DELETE FROM movies WHERE movie_id=$movieId";

    if ($conn->query($delete_movie_cast_sql) === TRUE) {
        if ($conn->query($delete_movies_director_sql) === TRUE) {
            if ($conn->query($delete_movies_sql) === TRUE) {
                header("Location: index.php");
            } else {
                echo "Error deleting movies: " . $conn->error;
            }
        } else {
            echo "Error deleting movies_directors: " . $conn->error;
        }
    } else {
        echo "Error deleting movies_cast: " . $conn->error;
    }

?>