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
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
   <link rel="stylesheet" href="css/style.php">
   <!-- <script type="text/javascript" src="js/jsFunctions.js"></script> -->
   <script>
      
      function setValue(str){
         let element = document.getElementById("search-btn");
         element.value = str;
         element.innerHTML = str;
         document.getElementById("search-category").value = str;
      }

      function toggle(movie, cast, director){
         //console.log(movie.movie_id);
         $.ajax({
            type: "POST",
            url: "setMovieIdSession.php",
            data:{
                  movieId: movie.movie_id
            },
            success: function(data){
                  //console.log(data);
            },
            error: function (error) {
                  console.log('error; ' + eval(error));
            }}
            );
         let blur = document.getElementById('blur');
         blur.classList.toggle('active');
         let popup = document.getElementById('popup');
         popup.classList.toggle('active');
         document.getElementById('popup_img').setAttribute("src", movie.photoURL);
         document.getElementById('popup_id').innerHTML = movie.movie_id;
         document.getElementById('popup_title').innerHTML = movie.movie_title;
         document.getElementById('popup_year').innerHTML = "年份: " + movie.movie_year + "年";
         document.getElementById('popup_time').innerHTML = "長度: " + movie.movie_time + "分";
         document.getElementById('popup_genres').innerHTML = "類型: " + movie.movie_genres;


         let castStr = "<ul>";
         for(let row of cast){
            castStr += "<li>"+ row.actor_first_name + " " + row.actor_last_name;
         }
         castStr += "</ul>";
         let directorStr = "<ul>";
         for(let row of director){
            directorStr += "<li>" + row.director_first_name + " " + row.director_last_name;
         }
         directorStr += "</ul>";
         document.getElementById('popup_casts').innerHTML = "<span>演員: </span>" + castStr;
         document.getElementById('popup_directors').innerHTML = "<span>導演: </span>" + directorStr;
         
      }


      function unToggle(){
         let blur = document.getElementById('blur');
         blur.classList.toggle('active');
         let popup = document.getElementById('popup');
         popup.classList.toggle('active');
      }

      function rating(star){
         let id = document.getElementById("popup_id").innerHTML;
         $.ajax({
            type: "POST", //傳送方式
            url: "updateRating.php", //傳送目的地
            //dataType: "json", //資料格式
            data: { 
               movieId: id,
               stars: star
            },
            success: function(data) {
               console.log(data)
            },
            error: function (error) {
                  console.log('error; ' + eval(error));
            }}
         );

      }
   </script>
   <title>index.php</title>
</head>
<body>

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
               $sql = "SELECT M.* FROM (movies as M natural join movie_directors as MD) join directors as D using(director_id) WHERE D.director_first_name like '%$keyword%' or D.director_last_name like '%$keyword%'";
            }
            else if($category == "Cast"){
               $sql = "SELECT M.* FROM (movies as M natural join movie_casts as MC) join actors as A using(actor_id) WHERE M.movie_id = MC.movie_id and MC.actor_id = A.actor_id and (A.actor_first_name like '%$keyword%' or A.actor_last_name like '%$keyword%')";
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
            <div id = 'popup_id' hidden></div>
            <div id = 'popup_title'></div>
            <div id = 'popup_year'></div>
            <div id = 'popup_time'></div>
            <div id = 'popup_genres'></div>
            <div id = 'popup_directors'></div>
            <div id = 'popup_casts'></div>
            <div class="stars" id = 'popup_stars'>
               <input class="star star-5" id="star-5" type="radio" name="star" onclick="rating(5)"/>
               <label class="star star-5" for="star-5"></label>
               <input class="star star-4" id="star-4" type="radio" name="star" onclick="rating(4)" />
               <label class="star star-4" for="star-4"></label>
               <input class="star star-3" id="star-3" type="radio" name="star" onclick="rating(3)" />
               <label class="star star-3" for="star-3"></label>
               <input class="star star-2" id="star-2" type="radio" name="star" onclick="rating(2)" />
               <label class="star star-2" for="star-2"></label>
               <input class="star star-1" id="star-1" type="radio" name="star" onclick="rating(1)" />
               <label class="star star-1" for="star-1"></label>
            </div>
            <?php 
               if($isAdmin) echo "
               <div id = 'popup_delete_btn' class = 'popup_btn'><a href='./delete_all_movie_info.php' onclick = ''>Delete</a></div>
               <div id = 'popup_edit_btn' class = 'popup_btn'><a href='./edit_movie.php' onclick = ''>Edit</a></div>"
               ?>
            <div id = 'popup_close_btn' class = 'popup_btn'><a href='#' onclick = 'unToggle()'>Close</a></div>
      </div>
   </div>
   <div>
      <?php
         if($isAdmin)
         echo 
         "<div class = 'insert-movie'><a class = 'insert-movie-btn' href='./insert_movie.php'>+</a></div>"
         ?>
   </div>

   
   
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="js/tilt.js"></script>
</body>
</html>

