<?php
   error_reporting(0);
   require('functions.php');
   session_start();
   $username = $_SESSION['username'];
   $isAdmin = $_SESSION['isAdmin'];
   $movieid=$_SESSION['movieId'];
   $errormsg='';
   $createrrormsg='';
   $deleteErrormsg='';
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jsFunctions.js"></script>
    <title>Insert Movie</title>
</head>
<body>
    <div>
        <?php include_once('navbar_no_search.php'); ?>
    </div>
     <?php
        $conn = mysqli_connect("localhost", "yao", "1234", "movie_db"); // connect to DB
        ////////儲存/////////
        if($_POST['editActorBtn']){
            $lastNamet =$_POST['lastName2'];
            for($i = 1; $i <= 30; $i++){
                $lastName =$_POST['lastName' . strval($i)];
                $firstName =$_POST['firstName' . strval($i)];
                $role = $_POST['role' . strval($i)];
                if($lastName){
                    if($firstName){
                        if($role){
                            $actor_result=mysqli_query($conn, "SELECT * FROM actors WHERE actor_first_name='$firstName' and actor_last_name='$lastName'");
                            $actornum = mysqli_num_rows($actor_result); // number of result
                            if($actornum>=1){//原本就有的actor
                                $actor = mysqli_fetch_array($actor_result, MYSQLI_ASSOC);
                                $actorid=$actor['actor_id'];
                                $query = mysqli_query($conn, "INSERT into movie_casts VALUES( $movieid, $actorid, '$role')"); // query for update cast
                                if(!$query){ 
                                    $errormsg='Can not save';
                                }else
                                    $errormsg='Save success';
                            }
                            if($actornum==0){//新增的actor
                                $numOfId=0;
                                while($numOfId == 0){
                                    $randactorid = mt_rand(0,1000);
                                    $query = mysqli_query($conn, "SELECT * FROM actors WHERE actor_id = $randactorid"); // query for matching actorid
                                    $numrows = mysqli_num_rows($query); 
                                    if($numrows == 0)//判斷id是否存在
                                        $numOfId=1;
                                }

                                mysqli_query($conn, "INSERT INTO actors VALUES($randactorid, '$firstName', '$lastName')");// query for creating actor
                                $query = mysqli_query($conn,"SELECT * FROM actors WHERE actor_id = $randactorid");
                                $numrows = mysqli_num_rows($query); // number of result'
                                if($numrows == 1){ // have one result
                                    mysqli_query($conn, "INSERT INTO movie_casts VALUES($movieid, $randactorid, '$role')");// query for creating actor
                                    $query = mysqli_query($conn,"SELECT * FROM movie_casts WHERE movie_id = $movieid and actor_id = $randactorid");
                                    $numrows = mysqli_num_rows($query); // number of result'
                                    if($numrows == 1){ // have one result
                                        $createrrormsg= "Create actor " . $firstName . $lastName . " success";
                                    }else
                                        $createrrormsg= "An error has occurred. Your actor ". $firstName . $lastName . " was not created";    
                                    
                                }else
                                    $createrrormsg= "An error has occurred. Your actor ". $firstName . $lastName . " was not created";
                                
                            } 
                        }else
                            $errormsg='You must enter role';
                    }
                }
            }
        }

        ////////刪除/////////
        for($i = 1; $i <= 30; $i++){
            if($_POST['deleteActorBtn'.$i]){
                $lastName =$_POST['lastName' . strval($i)];
                $firstName =$_POST['firstName' . strval($i)];
                $role = $_POST['role' . strval($i)];
                $actor_result=mysqli_query($conn, "SELECT * FROM actors WHERE actor_first_name='$firstName' and actor_last_name='$lastName'");
                $actornum = mysqli_num_rows($actor_result); // number of result
                if($actornum>=1){
                    $actor = mysqli_fetch_array($actor_result, MYSQLI_ASSOC);
                    $actorid=$actor['actor_id'];
                    $query=mysqli_query($conn,"DELETE FROM movie_casts WHERE movie_id=$movieid and actor_id=$actorid");
                    if(!$query){ 
                        $deleteErrormsg='Can not delete actor' . $firstName . $lastName;
                    }else
                        $deleteErrormsg='Delete success';
                }else{
                    $deleteErrormsg='Can not delete actor' . $firstName . $lastName;
                }
            }

        }

        ////////HTML最外圈的code/////////
        echo
        "<div class='actor-wrapper'>
            <form method='post' action='' class='movie-input-form' id = 'actorForm'>
                <div class = 'actor-insert-info'>
                    <a href='./index.php' class='delete-info-btn'>取消</a>
                    <a href='#' class='confirm-info-btn' onclick='newActor()'>新增演員</a>
                    <input type='submit' class='edit-info-btn' value='儲存' name='editActorBtn'>
                </div>
                <div class='notice'>$deleteErrormsg</div>
                <div class='notice'>$createrrormsg</div>
                <div class='notice'>$errormsg</div>";
        

         $conn = mysqli_connect("localhost", "yao", "1234", "movie_db"); // connect to DB
         $cast_result=mysqli_query($conn, "SELECT * FROM movie_casts WHERE movie_id=$movieid");
         $castnum = mysqli_num_rows($cast_result); // number of result
         //setcookie(,$castnum);
        if($castnum >=1){
            ////////有幾個actor建幾個/////////
            for($i = 1; $i <= $castnum; $i++){
                
                    $cast = mysqli_fetch_array($cast_result, MYSQLI_ASSOC);
                    //$actor_id=array(),$actor_role=array(),$actor_role=array(),$actorFname=array(),$actorLname=array();
                    $actor_id= $cast['actor_id'];
                    $actor_role = $cast['role'];
                    $actor_result=mysqli_query($conn, "SELECT * FROM actors WHERE actor_id=$actor_id");
                    $numactor = mysqli_num_rows($actor_result); // number of result
                    if($numactor >=1){
                        $actor = mysqli_fetch_array($actor_result, MYSQLI_ASSOC);
                        $actorFname=$actor['actor_first_name'];
                        $actorLname=$actor['actor_last_name'];
                    }else
                        $errormsg='There are no actors in this movie';

                    ////////HTML演員卡/////////
                    echo
                            "<div class='actor-form'>
                                <div class='actor-label'><label class='movie'>演員</label></div>
                                
                                <div class='movie-group'>
                                    <label for='user' class='label'>First Name:</label>
                                    <input id='user' type='text' class='input' name = 'firstName$i' value='$actorFname'  readonly='readonly''>
                                </div>
                                <div class='movie-group'>
                                    <label for='user' class='label'>Last Name:</label>
                                    <input id='user' type='text' class='input' name = 'lastName$i' value='$actorLname' readonly='readonly''>
                                </div>
                                <div class='movie-group'>
                                    <label for='user' class='label'>角色:</label>
                                    <input id='user' type='text' class='input' name = 'role$i' value='$actor_role''>
                                </div>
                                <div class = 'delete-info'>
                                    <input type='submit' class='delete-info-btn' value='刪除'  name='deleteActorBtn$i'>
                                </div>
                            </div>
                        ";
            }

            ////////HTML尾巴/////////
            echo"</div>
            </form>
    </div>";     
        }else{  
            $errormsg='Movie does not exist';
        }

    ?>
    <script>
        var num =0;
        function start(){
            <?php echo "var jsvar ='$castnum';"?>
            num=jsvar;     
        }

        function newActor(){
            num++;
            let content = "<div class='actor-label'><label class='movie'>演員</label></div>\
                    <div class='movie-group'>\
                        <label for='user' class='label'>First Name:</label>\
                        <input id='user' type='text' class='input' name = 'firstName" + num + "'>\
                    </div>\
                    <div class='movie-group'>\
                        <label for='user' class='label'>Last Name:</label>\
                        <input id='user' type='text' class='input' name = 'lastName" + num + "'>\
                    </div>\
                    <div class='movie-group'>\
                        <label for='user' class='label'>角色:</label>\
                        <input id='user' type='text' class='input' name = 'role" + num + "'>\
                    </div>\
                    <div class = 'delete-info'>\
                    <a href='#' class='delete-info-btn' onclick = 'deleteActor(this)'>刪除</a>\
                    </div>\
                <div class='hr'></div>\
            </div>";
            let child = document.createElement("div");
            child.innerHTML = content;
            child.setAttribute("class", "actor-form");
            actorForm.appendChild(child);
        }
        function deleteActor(element){
            let temp = element.parentElement.parentElement;
            let tempParent = temp.parentElement;
            tempParent.removeChild(temp);

        }
        window.addEventListener("load", start, false);
    </script>
</body>
</html>