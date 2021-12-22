<?php
   error_reporting(0);
   require('functions.php');
   session_start();
   $username = $_SESSION['username'];
   $isAdmin = $_SESSION['isAdmin'];
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
    <div class='movie-wrapper'>
        <div class='movie-form'>
            <label class='movie'>導演</label>
            <form method='post' action='./insert_director.php' class='movie-input-form'>
                <!-- <div class='notice'>$errormsg</div>  -->
                <div class='movie-group'>
                    <label for='user' class='label'>電影名稱:</label>
                    <input id='user' type='text' class='input' name = 'username'>
                </div>
                <div class='movie-group'>
                    <label for='user' class='label'>First Name:</label>
                    <input id='user' type='text' class='input' name = 'username'>
                </div>
                <div class='movie-group'>
                    <label for='user' class='label'>Last Name:</label>
                    <input id='user' type='text' class='input' name = 'username'>
                </div>
                
                <div class = 'insert-info'>
                    <a href='./index.php' class='delete-info-btn'>取消</a>
                    <input type='submit' class='insert-info-btn' value='下一步' name='insertDirectorBtn'>
                </div>

                <div class='hr'></div>
            </form>
        </div>
    </div>
</body>
</html>