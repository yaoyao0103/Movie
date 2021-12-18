<?php
    error_reporting(0);
    require('functions.php');
    session_start();
    $username = $_SESSION['username'];
    $isAdmin = $_SESSION['isAdmin'];
?>

<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="css/style.php">
    <script type="text/javascript" src="js/jsFunctions.js"></script>
    <title>index.php</title>
</head>
<body>
    <?php
        if($username){
            if(!$isAdmin){
                header("Location: member.php");
            }
        }
        else{
                header("Location: index.php");
        }
    ?>
    <div id = "blur">
        <div>
            <?php include_once('navbar.php'); ?>
        </div>

        <?php
            if ($_GET['keyword']){
                $keyword = $_GET['keyword'];
                $category = $_GET['category'];
                if($category == "Name"){
                $sql = "SELECT * FROM movies WHERE movie_title like '%$keyword%'";
                }
                else if($category == "Director"){
                $sql = "SELECT M.* FROM movies as M, movies_directors as MD, directors as D WHERE M.movie_id = MD.movie_id and MD.director_id = D.director_id and (D.director_first_name like '%$keyword%' or D.director_last_name like '%$keyword%')";
                }
                else if($category == "Cast"){
                $sql = "SELECT M.* FROM movies as M, movies_cast as MC, actors as A WHERE M.movie_id = MC.movie_id and MC.actor_id = A.actor_id and (A.actor_first_name like '%$keyword%' or A.actor_last_name like '%$keyword%')";
                }
                else if($category == "Year"){
                $year = intval($keyword);
                $sql = "SELECT * FROM movies WHERE movie_year = $year";
                }
                else{
                $sql = "SELECT * FROM movies";
                }
                generateCards($sql);
            }
            else{
                $sql = "SELECT * FROM movies";
                generateCards($sql);
            }
        ?>
    </div>
    <div id='popup'>  
        <div class = 'popup_img'>
                <img id = 'popup_img'>
        </div>
        <div class = 'popup_content'>
                <div id = 'popup_title'></div>
                <div id = 'popup_year'></div>
                <div id = 'popup_time'></div>
                <div id = 'popup_genres'></div>
                <div id = 'popup_directors'></div>
                <div id = 'popup_casts'></div>
                <div id = 'popup_btn'><a href='#' onclick = 'unToggle()'>Close</a></div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="js/tilt.js"></script>
</body>
</html>

