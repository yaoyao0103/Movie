<?php 
    function generateCards($sql){
        $conn = mysqli_connect("localhost", "yao", "1234", "movie_db"); // connect to DB
        mysqli_set_charset($conn,"utf8");

        $num_per_page = 12; // total item per page

        if(isset($_GET['page'])) // already set the page
        {
            $page = $_GET['page'];
        }
        else{
            $page = 1; // default page = 1
        }

        $start_form = ($page-1)*$num_per_page; // the start row of liquors table

        $limitedSql = $sql." limit $start_form, $num_per_page"; // sql
        $movie_result = mysqli_query($conn, $limitedSql); // get result
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

                $castSql = "select A.* from movies_cast as MC, actors as A where movie_id = $movie_id and MC.actor_id = A.actor_id";
                $casts = mysqli_query($conn, $castSql);
                $tempCast = [];
                while($row = mysqli_fetch_assoc($casts))
                    $tempCast[] = $row; 
                $castsJSON = json_encode($tempCast);
                //get tags
                $directorSql = "select D.* from movies_directors as MD, directors as D where movie_id = $movie_id and MD.director_id = D.director_id";
                $directors = mysqli_query($conn, $directorSql);
                $tempDirector = [];
                while($row = mysqli_fetch_assoc($directors))
                    $tempDirector[] = $row; 
                $directorsJSON = json_encode($tempDirector);
                
                $movieJSON = json_encode($movie);
                $content = "<div class=\"card\" data-tilt data-tilt-max=\"10\" style=\"background-image: url($photoURL)\" onclick='toggle($movieJSON, $castsJSON, $directorsJSON)'> 
                <div class=\"card_content\"> 
                    <div class=\"movie_title\"> $movie_title</div> 
                    <div class=\"movie_year\"> Year: {$movie_year}年</div> 
                    <div class=\"movie_time\"> Time: {$movie_time}分鐘</div> 
                    <div class=\"movie_genres\"> Genres: $movie_genres</div> 
                </div>";

                $result .= $content;
            }
            $liquor_result = mysqli_query($conn, $sql);
            $total_records = mysqli_num_rows($liquor_result); // 總資料筆數
            $total_pages = ceil($total_records/$num_per_page); // 總頁數

            $result .= "</div>";
            $result .= "<div class = 'page_btn_div'>";
            if($tag==''){
            
                if($page != 1) $result .= "<button class = 'page_btn' onclick=\"location.href='index.php?page=".($page-1)."'\"><<</button>"; // not in page 1 then show pervious page button
                
                for($i = 1; $i <= $total_pages; $i++){
                    if($i!=$page){
                        $result .= "<button class = 'page_btn' onclick=\"location.href='index.php?page=$i'\">".$i."</button>" ; //切換頁數button
                    }
                    else{
                        $result .= "<button class = 'page_btn present_page' onclick=\"location.href='index.php?page=$i'\">".$i."</button>" ; //當下頁面
                    }
                }
                if($page != $total_pages) $result .= "<button class = 'page_btn' onclick=\"location.href='index.php?page=".($page+1)."'\">>></button>"; // not in the last page then show next page button
                
            }
            else{
                if($page != 1) $result .= "<button class = 'page_btn' onclick=\"location.href='index.php?tag=$tag&page=".($page-1)."'\"><<</button>"; // not in page 1 then show pervious page button
                
                for($i = 1; $i <= $total_pages; $i++){
                    if($i!=$page){
                        $result .= "<button class = 'page_btn' onclick=\"location.href='index.php?tag=$tag&page=$i'\">".$i."</button>" ; //切換頁數button
                    }
                    else{
                        $result .= "<button class = 'page_btn present_page' onclick=\"location.href='index.php?tag=$tag&page=$i'\">".$i."</button>" ; //當下頁面
                    }
                }
                if($page != $total_pages) $result .= "<button class = 'page_btn' onclick=\"location.href='index.php?tag=$tag&page=".($page+1)."'\">>></button>"; // not in the last page then show next page button
            }
            $result .= "</div>";
            $result .= "</div>";
        }
        else{
            $result = "no result";
        }
        echo $result;
    }
?>

