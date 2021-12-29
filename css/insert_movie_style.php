<?php
	header("Content-type: text/css");
?>

.movie-wrapper {
    position: relative;
    padding: 40px;
    padding-left: 140px;
    max-width: 1400px;
    text-align: center;
    display:flex;
    justify-content: center;
    align-items: center;
}

.actor-wrapper {
    position: relative;
    padding: 10px 40px;
    padding-left: 140px;
    max-width: 1400px;
    text-align: center;
    display:inline-flex;
}

.actor-label {
    text-align: center;
}

.movie-form {
    padding: 25px;
    border: solid #FFFFAB;
    border-width: 1px;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    margin-left: 30px;
    margin-bottom: 30px;
}

.actor-form {
    padding: 25px;
    border: solid #FFFFAB;
    border-width: 1px;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    margin-left: 30px;
    margin-bottom: 30px;
    float: left;
}

.director {
    margin-top: 50px;
}

.movie {
    font-weight: bold;
    font-size: 40px;
}

.movie-input-form {
    text-align: right;
}

.movie-group {
    margin-bottom: 20px;
}

.notice {
    text-align: center;
    color: #FFABAB;
    margin-bottom: 10px;
}

.label {
    
}

.input {
    border-radius: 5px;
    border: 1px white solid;
    background-color: rgb(35,35,35);
    color: white;
}

.insert-info {
    position: relative;
    display: flex;
    padding: 5px;
    justify-content: center;
}

.actor-insert-info {
    position: relative;
    display: flex;
    padding: 30px;
    width: 1200px;
    justify-content: center;
}

.delete-info {
    position: relative;
    display: flex;
    justify-content: center;
}

.insert-info-btn {
    margin: 10px;
    background-color: #FFFFDE;
    color: black;
    width: 50%;
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
    margin: 10px;
    background-color: #FFDEDE;
    color: black;
    width: 50%;
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

.edit-info-btn {
    margin: 10px;
    background-color: #DEFFDE;
    color: black;
    width: 50%;
    text-align: center;
    border-radius: 5px;
    font-weight: bold;
    font-size: 20px;
    border: solid #ABFFAB;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    padding: 5px;
    transition: all .35s;
}

.edit-info-btn:hover {
    background-color: rgb(35,35,35);
    color: #ABFFAB;
    text-decoration: none;
}

.confirm-info-btn {
    margin: 10px;
    background-color: #FFFFDE;
    color: black;
    width: 50%;
    text-align: center;
    border-radius: 5px;
    font-weight: bold;
    font-size: 20px;
    border: solid #FFFFAB;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    padding: 5px;
    transition: all .35s;
}

.confirm-info-btn:hover {
    background-color: rgb(35,35,35);
    color: #FFFFAB;
    text-decoration: none;
}
