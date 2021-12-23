
function setValue(str){
    let element = document.getElementById("search-btn");
    element.value = str;
    element.innerHTML = str;
    document.getElementById("search-category").value = str;
}

function toggle(movie, cast, director){
    console.log(movie.movie_id);
    // location.href="setMovieIdSession.php?movieId=" + movie.movie_id;
    let blur = document.getElementById('blur');
    blur.classList.toggle('active');
    let popup = document.getElementById('popup');
    popup.classList.toggle('active');
    document.getElementById('popup_img').setAttribute("src", movie.photoURL);
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