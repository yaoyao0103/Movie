<?php
   error_reporting(0);
   require('functions.php');
   session_start();
   $username = $_SESSION['username'];
   $movieid = $_SESSION['movieId'];
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
    <?php
        if($_POST['insertBtn']){
            // $moviename= $_POST['movieName'];
            // $moviedate =$_POST['year'];
            // $movietime =$_POST['duration'];
            // $moviegenres =$_POST['genre'];
            // $movieurl =$_POST['photo'];

            // $actorFname =$_POST['actorFname'];
            // $actorLname =$_POST['actorLname'];
            // $role =$_POST['role'];

            $directorFname =$_POST['directorFname'];
            $directorLname =$_POST['directorLname'];
            if($directorFname){
                if($directorLname){
                    $conn = mysqli_connect("localhost", "yao", "1234", "movie_db"); // connect to DB
                    $query = mysqli_query($conn, "SELECT * FROM directors WHERE director_first_name='$directorFname' and director_last_name='$directorLname' "); // query for matching directorname
                    $numrows = mysqli_num_rows($query); // number of result
                    $numofid=0;
                    $directorid=0;
                    if($numrows==0){
                        while($numofid==0){
                            $directorid=mt_rand(0,1000);
                            $query = mysqli_query($conn, "SELECT * FROM directors WHERE director_id=$directorid"); // query for matching directorid
                            $numrows = mysqli_num_rows($query);
                            if($numrows == 0)//判斷id是否存在
                                $numofid=1;
                        }
                        mysqli_query($conn, "INSERT INTO directors VALUES($directorid,'$directorFname', '$directorLname')");// query for creating director
                        $query = mysqli_query($conn,"SELECT * FROM directors WHERE director_id=$directorid");
                        $numrows = mysqli_num_rows($query); // number of result'
                        if($numrows == 1){ // have one result
                            $errormsg = "Create director success";
                        }else
                            $errormsg = "An error has occurred. Your director was not created";
                            
                    }
                    mysqli_query($conn, "INSERT INTO movie_directors VALUES($directorid,'$movieid')");// query for creating director
                    $query = mysqli_query($conn,"SELECT * FROM movie_directors WHERE director_id=$directorid and movie_id=$movieid");
                    $numrows = mysqli_num_rows($query); // number of result'
                    if($numrows == 1){ // have one result
                        header('Location:index.php');
                    }else
                        $errormsg = "An error has occurred. Your movie direcotr was not created";          
                }else
                     $errormsg ="You must enter director Lastname .";
            }else
                $errormsg ="You must enter director Firstname .";
         }
    echo"
    <div class='movie-wrapper'>
            
            
            <form method='post' action='./insert_director.php' class='movie-input-form'>
                <div class = 'insert-info'>
                    <a href='./index.php' class='confirm-info-btn'>取消</a>
                    <input class='confirm-info-btn' type='submit' name = 'insertBtn' value = '儲存'>
                </div>
                <div class = 'movie-form'>
                    <label class='movie'>導演</label>
                    <div class='notice'>$errormsg</div>
                    <div class='movie-group'>
                        <label for='user' class='label'>First Name:</label>
                        <input id='user' type='text' class='input' name = 'directorFname'>
                    </div>
                    <div class='movie-group'>
                        <label for='user' class='label'>Last Name:</label>
                        <input id='user' type='text' class='input' name = 'directorLname'>
                    </div>
                    <div class='hr'></div>
                </div>
            </form>
    </div>";
    
    
    
    ?>
    
    
</body>
</html>