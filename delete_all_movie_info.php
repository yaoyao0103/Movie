<?php
    error_reporting(0);
    session_start();
    $username = $_SESSION['username'];
    $isAdmin = $_SESSION['isAdmin'];
    $movieId = $_SESSION['movieId'];
    
    $conn = mysqli_connect("localhost", "root", "root", "movie_db"); // connect to DB
    
    $delete_movies_cast_sql = "DELETE FROM movie_casts WHERE movie_id=$movieId";
    $delete_movies_director_sql = "DELETE FROM movie_directors WHERE movie_id=$movieId";
    $delete_movies_rating_sql = "DELETE FROM ratings WHERE movie_id=$movieId";
    $delete_movies_sql = "DELETE FROM movies WHERE movie_id=$movieId";

    $movie_cast_result = mysqli_query($conn, "SELECT * FROM movie_casts WHERE movie_id='$movieId'");
    $numrows = mysqli_num_rows($movie_cast_result); // number of result
    if ($numrows > 0) {
        if ($conn->query($delete_movies_cast_sql) !== TRUE)
            echo "Error deleting movie_casts: " . $conn->error;
    }

    $movie_director_result = mysqli_query($conn, "SELECT * FROM movie_directors WHERE movie_id='$movieId'");
    $numrows = mysqli_num_rows($movie_director_result); // number of result
    echo $numrows;
    if ($numrows > 0) {
        if ($conn->query($delete_movies_director_sql) !== TRUE) 
            echo "Error deleting movie_directors: " . $conn->error;
    }

    $movie_rating_result = mysqli_query($conn, "SELECT * FROM ratings WHERE movie_id='$movieId'");
    $numrows = mysqli_num_rows($movie_rating_result); // number of result
    if ($numrows > 0) {
        if ($conn->query($delete_movies_rating_sql) !== TRUE) 
            echo "Error deleting ratings: " . $conn->error;
    }

    $movie_result = mysqli_query($conn, "SELECT * FROM movies WHERE movie_id='$movieId'");
    $numrows = mysqli_num_rows($movie_result); // number of result
    echo $numrows;
    if ($numrows > 0) {
        if ($conn->query($delete_movies_sql) !== TRUE) 
            echo "Error deleting movies: " . $conn->error;
        else
            header("Location: index.php");
    }

?>