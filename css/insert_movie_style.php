<?php
	header("Content-type: text/css");
?>

.movie-wrapper {
    position: relative;
    display: grid;
    grid-template-columns: auto auto auto;
    grid-column-gap: 50px;
    padding: 60px 40px;
    text-align: center;
}

.movie-form {
    padding: 25px;
    border: solid #FFFFAB;
    border-width: 1px;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}

.movie {
    font-weight: bold;
    font-size: 40px;
}

.movie-input-form {
    text-align: right;
    margin-right: 60px;
}


.movie-group {
    margin-bottom: 20px;
}

.input {
    border-radius: 5px;
    border: none;
}

.insert-info {
    display: flex;
    justify-content: center;
}

.insert-info-btn {
    margin: 20px;
    background-color: #FFFFDE;
    color: black;
    width: 10%;
    text-align: center;
    border-radius: 5px;
    font-weight: bold;
    font-size: 20px;
    border: solid #FFFFAB;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    padding: 5px;
    transition: all .35s;
}

.insert-info-btn:hover {
    background-color: rgb(35,35,35);
    color: #FFFFAB;
    text-decoration: none;
}


.delete-info-btn {
    margin: 20px;
    background-color: #FFDEDE;
    color: black;
    width: 10%;
    text-align: center;
    border-radius: 5px;
    font-weight: bold;
    font-size: 20px;
    border: solid #FFABAB;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    padding: 5px;
    transition: all .35s;
}

.delete-info-btn:hover {
    background-color: rgb(35,35,35);
    color: #FFABAB;
    text-decoration: none;
}
