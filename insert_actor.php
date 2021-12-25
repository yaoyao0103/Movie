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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jsFunctions.js"></script>

    <title>Insert Movie</title>
    <script>

        var num = 0;
        function start(){
            newActor();
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
            child.setAttribute("class", "movie-form");
            actorForm.appendChild(child);
        }

        function deleteActor(element){
            let temp = element.parentElement.parentElement;
            let tempParent = temp.parentElement;
            tempParent.removeChild(temp);

        }

        window.addEventListener("load", start, false);
    </script>
</head>
<body>
    <div>
        <?php include_once('navbar_no_search.php'); ?>
    </div>
    <div class='movie-wrapper'>
        <form method='post' action='./insert_actor_db.php' class='movie-input-form' id = 'actorForm'>
            <div class = 'insert-info'>
                <a href='./index.php' class='confirm-info-btn'>取消</a>
                <a href="#" class="confirm-info-btn" onclick="newActor()">新增演員</a>
                <a href="#" class="confirm-info-btn" onclick="document.getElementById('actorForm').submit();">下一步</a>
            </div>
        </form>
    </div>
    
</body>
</html>