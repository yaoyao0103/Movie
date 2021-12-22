<?php
	header("Content-type: text/css");
?>

.movie-wrapper {
    position: relative;
    display: flex;
    justify-content: center;
    padding: 60px 40px;
    text-align: center;
}

.actor-wrapper {
    position: relative;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 10px;
    grid-auto-flow: dense;
    padding: 60px 40px;
    text-align: center;
}

.actor-form {
    border: solid #FFFFAB;
    border-width: 1px;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    padding: 25px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
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
}

.movie-group {
    margin-bottom: 20px;
}

.label {
    margin-right: 5px;
}

.input {
    border-radius: 5px;
    border: 1px white solid;
    background-color: rgb(35,35,35);
    color: white;
}

.insert-info {
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

.confirm-info-btn:hover {
    background-color: rgb(35,35,35);
    color: #FFFFAB;
    text-decoration: none;
}