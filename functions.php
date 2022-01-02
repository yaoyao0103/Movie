<?php 
    function generateCards($sql){
        $conn = mysqli_connect("localhost", "root", "root", "movie_db"); // connect to DB
        mysqli_set_charset($conn,"utf8");

        $movie_result = mysqli_query($conn, $sql); // get result
        //$query = mysqli_query($conn, "SELECT * FROM liquors as L, tag as T WHERE L.id = T.liquor_id and T.tag_name = 'Highball'");
        $numrows = mysqli_num_rows($movie_result); // number of result
        if($numrows >=1){
            $result = "<div class=\"wrapper\" id = \"all_card\">";;
            while ($movie = mysqli_fetch_array($movie_result, MYSQLI_ASSOC)) {
                // todo: card info
                $movie_id = $movie['movie_id'];
                $movie_title = $movie['movie_title'];
                $movie_year = $movie['movie_year'];
                $movie_time = $movie['movie_time'];
                $movie_genres = $movie['movie_genres'];
                $photoURL = $movie['photoURL'];

                $castSql = "SELECT A.* from movie_casts as MC natural join actors as A where movie_id = $movie_id";
                $casts = mysqli_query($conn, $castSql);
                $tempCast = [];
                while($row = mysqli_fetch_assoc($casts))
                    $tempCast[] = $row; 
                $castsJSON = json_encode($tempCast);
                //get tags
                $directorSql = "SELECT D.* from movie_directors as MD  natural join directors as D where movie_id = $movie_id";
                $directors = mysqli_query($conn, $directorSql);
                $tempDirector = [];
                while($row = mysqli_fetch_assoc($directors))
                    $tempDirector[] = $row; 
                $directorsJSON = json_encode($tempDirector);
                
                $movieJSON = json_encode($movie);
                $ratingSql = "SELECT avg(Cast(stars as Float)) FROM ratings WHERE movie_id = '$movie_id'";
                $ratingResult = mysqli_query($conn, $ratingSql); // get result
                $ratingResult = $ratingResult->fetch_array();
                $movie_rating = floatval($ratingResult[0]);
                $content = "<div class=\"card\" data-tilt data-tilt-max=\"10\" style=\"background-image: url($photoURL)\" onclick='toggle($movieJSON, $castsJSON, $directorsJSON)'> 
                    <div class=\"card_content\"> 
                        <div class=\"movie_title\"> $movie_title</div> 
                        <div class=\"movie_year\"> Year: {$movie_year}年</div> 
                        <div class=\"movie_time\"> Time: {$movie_time}分鐘</div> 
                        <div class=\"movie_genres\"> Genres: $movie_genres</div> 
                        <div class=\"movie_ratings\"> Rating: $movie_rating</div> 
                    </div>
                </div>";

                $result .= $content;
            }

            $result .= "</div>";
        }
        else{
            $result = "<div class = 'notfind'>No result!</div>";
        }
        echo $result;
    }

    function setMovieIdSeesion(){
        session_start();
        $movieId = $_GET['movieId'];
        $_SESSION['movieId'] = $movieId;
    }
?>

