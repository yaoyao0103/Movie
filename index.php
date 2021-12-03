<?php
    error_reporting(0);
    session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.php">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="admin.php">Movies</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
        
            <ul class="navbar-nav mr-auto">

            </ul>
            
            <form class="form-inline mr-auto" target="_self">
                <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" name="search" id="search-field"></div>
            </form>
            <button class="login-btn" onclick="location.href='login.php'">Login</button>
            <button class="sign-up-btn" onclick="location.href='register.php'">Sign Up</button>
        </div>
        
    </nav>

    <div class="wrapper" id = "all-movie">
        <?php
            if ($_GET['search']){
                $keyword = $_GET['search'];
                $sql = "select M.* from movies as M, movie_case as MC, movie_directors as MD, directors as D, actors as A where M.movie_id = C.movie_id and M.movie_id = D.movie_id and MC.actor_id = A.actor_id and MD.director_id = D.director_id and (M.movie_title like '%$keyword%' or D.director_first_name like '%$keyword%' or D.director_last_name like '%$keyword%' or A.actor_last_name like '%$keyword%' or A.actor_last_name like '%$keyword%')";
                generateCard($sql);
            }
            else{
                $sql = "select * from movies";
                generateCard($sql);
            }
            
        ?>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>