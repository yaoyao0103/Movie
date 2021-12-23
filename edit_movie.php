<?php
   error_reporting(0);
   require('functions.php');
   session_start();
   $username = $_SESSION['username'];
   $isAdmin = $_SESSION['isAdmin'];
   $movieid=$_SESSION['movieId'];
   $errormsg='';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="css/style.php">
    <link rel="stylesheet" href="css/insert_movie_style.php">
    <script type="text/javascript" src="js/jsFunctions.js"></script>

    <title>Insert Movie</title>
</head>
<body>
    <div>
         <?php include_once('navbar_no_search.php'); ?>
    </div>
    <?php
        $conn = mysqli_connect("localhost", "root", "root", "movie_db"); // connect to DB
        if($_POST['editMovieBtn']){
            $moviename= $_POST['movieName'];
            $moviedate =$_POST['year'];
            $movietime =$_POST['duration'];
            $moviegenres =$_POST['genre'];
            $movieurl =$_POST['photo'];

            // $actorFname =$_POST['actorFname'];
            // $actorLname =$_POST['actorLname'];
            // $actorgender =$_POST['actorgender'];
            // $role =$_POST['role'];

            // $directorFname =$_POST['directorFname'];
            // $directorFname =$_POST['directorLname'];
            if($moviename){
                if($moviedate){
                    if($movietime){
                        if($moviegenres){
                            if($movieurl){
                                $query = mysqli_query($conn, "UPDATE movies SET movie_title='$moviename',movie_year=$moviedate,
                                                        movie_time=$movietime,movie_genres='$moviegenres',photoURL='$movieURL' WHERE movie_id=$movieid"); // query for update movie
                                if(!$query){ // have no result: there is no exist the same moviename
                                    // query for insert movie info
                                    $errormsg='Can not save';
                                }else
                                    $errormsg = "Save success";
                            
                            }else
                                $errormsg ="You must enter your movieurl";

                        }else
                            $errormsg ="You must enter your movietime .";
                    }else
                        $errormsg ="You must enter your movietime .";
                }else
                     $errormsg ="You must enter your moviedate .";
            }else
                $errormsg ="You must enter your moviename .";
         }
    
        $movie_result=mysqli_query($conn, "SELECT * FROM movies WHERE movie_id='$movieid'");
        $numrows = mysqli_num_rows($movie_result); // number of result
        if($numrows >=1){
            $movie = mysqli_fetch_array($movie_result, MYSQLI_ASSOC);
            $movie_title = $movie['movie_title'];
            $movie_year = $movie['movie_year'];
            $movie_time = $movie['movie_time'];
            $movie_genres = $movie['movie_genres'];
            $photoURL = $movie['photoURL'];
            
        }else{  
            $errormsg='Movie does not exist';
        }
        echo
        "<div class='movie-wrapper'>
         <div class='movie-form'>
             <label class='movie'>電影</label>
             <form method='post' action='' class='movie-input-form'>
                 <div class='notice'>$errormsg</div>
                 <div class='movie-group'>
                     <label for='user' class='label'>電影名稱:</label>
                     <input id='movieName' type='text' class='input' name = 'movieName' value='$movie_title'>
                 </div>
                 <div class='movie-group'>
                     <label for='user' class='label'>上映年(西元):</label>
                     <input id='year' type='text' class='input' name = 'year' value='$movie_year'>
                 </div>
                 <div class='movie-group'>
                     <label for='user' class='label'>播放時間(分鐘):</label>
                     <input id='duration' type='text' class='input' name = 'duration' value='$movie_time'>
                 </div>
                 <div class='movie-group'>
                     <label for='user' class='label'>電影分類:</label>
                     <input id='genre' type='text' class='input' name = 'genre' value='$movie_genres'>
                 </div>
                 <div class='movie-group'>
                     <label for='user' class='label'>圖片:</label>
                     <input id='photo' type='text' class='input' name = 'photo' value='$photoURL'>
                 </div>
                    <a href='./index.php' class='delete-info-btn'>取消</a>
                    <input type='submit' class='edit-info-btn' value='儲存' name='editMovieBtn'>
                    <a href='./edit_director.php' class='insert-info-btn'>下一步</a>
                 <div class='hr'></div>
             </form>
         </div>
     </div>
     <form class = 'insert-info' method='post' action='./insert_movie.php'>
     </form>";
    ?>
    <?php
       
    
    ?>

    <!-- <div class="movie-wrapper">
        <div class="movie-form">
            <label class="movie">電影</label>
            <form method="post" action="" class="movie-input-form">
                <div class='notice'>$errormsg</div>
                <div class='movie-group'>
                    <label for='user' class='label'>電影名稱:</label>
                    <input id='movieName' type='text' class='input' name = 'movieName' >
                </div>
                <div class='movie-group'>
                    <label for='user' class='label'>上映年(西元):</label>
                    <input id='year' type='text' class='input' name = 'year'>
                </div>
                <div class='movie-group'>
                    <label for='user' class='label'>播放時間(分鐘):</label>
                    <input id='duration' type='text' class='input' name = 'duration'>
                </div>
                <div class='movie-group'>
                    <label for='user' class='label'>電影分類:</label>
                    <input id='genre' type='text' class='input' name = 'genre'>
                </div>
                <div class='movie-group'>
                    <label for='user' class='label'>圖片:</label>
                    <input id='photo' type='text' class='input' name = 'photo'>
                </div>

                <div class = 'insert-info'>
                    <input type='button' class='delete-info-btn' value='刪除' name='deleteActorBtn'>
                    <input type='submit' class='edit-info-btn' value='儲存' name='insertActorBtn'>
                </div>
                <div class='hr'></div>
            </form>
        </div>
    </div>
    <form class = 'insert-info' method='post' action='./edit_movie.php'>
        <a href="./index.php" class="delete-info-btn">取消</a>
        <input type='submit' class="edit-info-btn" value='儲存' name='editMovieBtn'>
        <a href="./edit_director.php" class="insert-info-btn">下一步</a>
    </form> -->
</body>
</html>