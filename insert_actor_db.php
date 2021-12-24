<?php

    session_start();
    $movieId = $_SESSION['movieId'];

    for($i = 1; $i <= 30; $i++){
        $lastName =$_POST['lastName' . strval($i)];
        $firstName =$_POST['firstName' . strval($i)];
        $role = $_POST['role' . strval($i)];
        if($lastName){
            if($firstName){
                if($role){
                    $conn = mysqli_connect("localhost", "yao", "1234", "movie_db"); // connect to DB
                    $query = mysqli_query($conn, "SELECT * FROM actors WHERE actor_first_name='$firstName' and actor_last_name='$lastName' "); // query for matching directorname
                    $numrows = mysqli_num_rows($query); // number of result
                    $numOfId=0;
                    $actorId=0;
                    if($numrows==0){
                        while($numOfId == 0){
                            $actorId = mt_rand(0,1000);
                            $query = mysqli_query($conn, "SELECT * FROM actors WHERE actor_id = $actorId"); // query for matching directorid
                            $numrows = mysqli_num_rows($query); 
                            if($numrows == 0)//判斷id是否存在
                                $numOfId=1;
                        }
                        mysqli_query($conn, "INSERT INTO actors VALUES($actorId, '$firstName', '$lastName')");// query for creating director
                        $query = mysqli_query($conn,"SELECT * FROM actors WHERE actor_id = $actorId");
                        $numrows = mysqli_num_rows($query); // number of result'
                        if($numrows == 1){ // have one result
                            echo "Create actor " . $firstName . $lastName . " success";
                        }else
                            echo "An error has occurred. Your actor ". $firstName . $lastName . " was not created";
                            
                    }
                    mysqli_query($conn, "INSERT INTO movies_cast VALUES($movieId, $actorId, '$role')");// query for creating director
                    $query = mysqli_query($conn,"SELECT * FROM movies_cast WHERE movie_id = $movieId and actor_id = $actorId");
                    $numrows = mysqli_num_rows($query); // number of result'
                    if($numrows == 1){ // have one result
                        header("Location: insert_director.php");
                    }else
                        echo "An error has occurred. Your movie actor was not created";     
                }
            }
        }
    }
?>