<?php
   error_reporting(0);
   require('functions.php');
   session_start();
   $username = $_SESSION['username'];
   $isAdmin = $_SESSION['isAdmin'];
   $movieId = $_SESSION['movieId'];
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
    <!-- <script type="text/javascript" src="js/jsFunctions.js"></script> -->
</head>
<body>
    <?php 
        $conn = mysqli_connect("localhost", "yao", "1234", "movie_db"); // connect to DB
        if($_POST['editDirectorBtn']){
            $director_id = $_POST['director_id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            if($first_name){
                if($last_name){
                    $sql = "SELECT * FROM movies_directors WHERE movie_id = $movieId";
                    $director_result = mysqli_query($conn, $sql);
                    $numrows = mysqli_num_rows($director_result); // number of result
                    if($numrows == 0){  // insert
                        $numofid=0;
                        $directorid=0;
                        while($numofid==0){
                            $directorid=mt_rand(0,1000);
                            $query = mysqli_query($conn, "SELECT * FROM directors WHERE director_id=$directorid"); // query for matching directorid
                            $numrows = mysqli_num_rows($query);
                            if($numrows == 0)//判斷id是否存在
                                $numofid=1;
                        }
                        $sql = "INSERT INTO directors VALUES($directorid, '$first_name', '$last_name')";
                        mysqli_query($conn, $sql);
                        $insert_result = mysqli_query($conn, "SELECT * FROM directors WHERE director_id=$directorid");
                        $numrows = mysqli_num_rows($insert_result); // number of result
                        if($numrows == 1){
                            $errormsg = "success";
                        }
                       
                        else{
                            $errormsg = "error";
                        }
                        $sql = "INSERT INTO movies_directors VALUES($directorid, $movieId)";
                        mysqli_query($conn, $sql);
                        $insert_result = mysqli_query($conn, "SELECT * FROM movies_directors WHERE director_id=$directorid");
                        $numrows = mysqli_num_rows($insert_result); // number of result
                        if($numrows == 1){
                            $errormsg .= "-success";
                        }
                        else{
                            $errormsg .= "-error";
                        }
                    }
                }
                else{
                    $errormsg = "Please enter the last name of director!";
                }
            }
            else{
                $errormsg = "Please enter the first name of director!";
            }
        }
        else if($_POST['deleteDirectorBtn']){
            $director_id = $_SESSION['director_id'];
            $conn = mysqli_connect("localhost", "yao", "1234", "movie_db"); // connect to DB
            $sql = "DELETE FROM directors WHERE director_id = $director_id";
            $query = mysqli_query($conn, $sql);
            $sql = "SELECT * FROM directors WHERE director_id = $director_id";
            $query = mysqli_query($conn, $sql);
            $numrows = mysqli_num_rows($query); // number of result
            if($numrows == 0){
                $errormsg = "success";
            }
            else{
                $errormsg = "error";
            }
            $_SESSION['director_id'] = "";  
        }
    ?>
    <div>
         <?php include_once('navbar_no_search.php'); ?>
    </div>
    <?php

        $sql = "SELECT * FROM movies_directors WHERE movie_id = $movieId";
        $director_result = mysqli_query($conn, $sql);
        $numrows = mysqli_num_rows($director_result); // number of result
        $content = "<form method='post' action='./edit_director.php' class='movie-input-form' id = 'directorForm'>
                
                <div class = 'insert-info'>
                    <a href='./index.php' class='confirm-info-btn'>取消</a>
                    <input class='confirm-info-btn' type='submit' name = 'editDirectorBtn' value = '儲存'>
                    <a href='./edit_actor.php' class='confirm-info-btn'>下一步</a>
                </div>";
            
        if($numrows >= 1){
            $director = mysqli_fetch_array($director_result, MYSQLI_ASSOC);
            $director_id = $director['director_id'];
            $sql = "SELECT * FROM directors WHERE director_id = $director_id";
            $director_info_result = mysqli_query($conn, $sql);
            $numrows = mysqli_num_rows($director_info_result); // number of result
            if($numrows >= 1){
                $director_info = mysqli_fetch_array($director_info_result, MYSQLI_ASSOC);
                $director_id = $director_info['director_id'];
                $first_name = $director_info['director_first_name'];
                $last_name = $director_info['director_last_name'];
                $_SESSION['director_id'] = $director_id;
                $content .= "<div class = 'movie-form'>
                    <label class='movie'>導演</label>
                    <div class='notice'>$errormsg</div>
                    <input id='director_id' type='text' class='input' name = 'director_id' value = '$director_id' hidden>
                    <div class='movie-group'>
                        <label for='user' class='label'>First Name:</label>
                        <input id='first_name' type='text' class='input' name = 'first_name' value = '$first_name' readonly='readonly'>
                    </div>
                    <div class='movie-group'>
                        <label for='user' class='label'>Last Name:</label>
                        <input id='last_name' type='text' class='input' name = 'last_name' value = '$last_name' readonly='readonly'>
                    </div>
                        <div class = 'delete-info'>
                        <input class='delete-info-btn' type='submit' name = 'deleteDirectorBtn' value = '刪除'>
                    </div>
                <div class='hr'></div>
            </div>
        </form>";
            }
            else{
                $content .= "<div class = 'movie-form'>
                    <label class='movie'>導演</label>
                    <div class='notice'>$errormsg</div>
                    <input id='director_id' type='text' class='input' name = 'director_id' value = '$director_id' hidden>
                    <div class='movie-group'>
                        <label for='user' class='label'>First Name:</label>
                        <input id='first_name' type='text' class='input' name = 'first_name'>
                    </div>
                    <div class='movie-group'>
                        <label for='user' class='label'>Last Name:</label>
                        <input id='last_name' type='text' class='input' name = 'last_name'>
                    </div>
                        <div class = 'delete-info'>
                        <input class='delete-info-btn' type='submit' name = 'deleteDirectorBtn' value = '刪除'>
                    </div>
                <div class='hr'></div>
            </div>
        </form>";
            }
        }
        else{
            $content .= "<div class = 'movie-form'>
                    <label class='movie'>導演</label>
                    <div class='notice'>$errormsg</div>
                    <input id='director_id' type='text' class='input' name = 'director_id' value = '$director_id' hidden>
                    <div class='movie-group'>
                        <label for='user' class='label'>First Name:</label>
                        <input id='first_name' type='text' class='input' name = 'first_name'>
                    </div>
                    <div class='movie-group'>
                        <label for='user' class='label'>Last Name:</label>
                        <input id='last_name' type='text' class='input' name = 'last_name'>
                    </div>
                        <div class = 'delete-info'>
                        <input class='delete-info-btn' type='submit' name = 'deleteDirectorBtn' value = '刪除'>
                    </div>
                <div class='hr'></div>
            </div>
        </form>";
        }
        

        echo $content;
    ?>

</body>
</html>