<?php
	header("Content-type: text/css");
?>

.movie-wrapper {
    position: relative;
    padding: 5%;
    padding-left:auto;
    padding-right:auto;
    max-width: 92%;
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
    
    padding: 2%;
    border: solid #FFFFAB;
    border-width: 1px;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    margin-left: 30px;
    margin-bottom:  30px;
}
.director-form {
    
    padding: 2%;
    border: solid #FFFFAB;
    border-width: 1px;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    margin-left: 5px;
    margin-bottom:  30px;
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
    text-align:  center;
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
    font-size: 18px;
}

.input {
    border-radius: 5px;
    border: 1px white solid;
    background-color: rgb(35,35,35);
    color: white;
    font-size:18px;
    width: 62%;
}

.insert-info {
    position: relative;
    display: flex;
    padding: 15px;
    justify-content: center;
    margin-left: 4px;
}

.actor-insert-info {
    position: relative;
    display: flex;
    padding: 30px;
    width: 80vw;
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
    white-space: nowrap;
    display: flex;
    align-items: center;
    justify-content:center;
    
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
    white-space: nowrap;
    display: flex;
    align-items: center;
    justify-content:center;
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
    white-space: nowrap;
    display: flex;
    align-items: center;
    justify-content:center;

    
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
    white-space: nowrap;
    display: flex;
    align-items: center;
    justify-content:center;
}

.confirm-info-btn:hover {
    background-color: rgb(35,35,35);
    color: #FFFFAB;
    text-decoration: none;
}

@media screen and (max-width:600px) { 
    .actor-wrapper {
        position: relative;
        padding: 10px 40px;
        text-align: center;
        display:flex;
        justify-content: center;
        align-items: center;
    }
    .actor-form {
        padding: 10px;
        border: solid #FFFFAB;
        border-width: 1px;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        margin: 20px;
    }
    .movie {
        font-weight: bold;
        font-size: 30px;
    }
    .label {
        font-size: 12px;
    }
    .input {
        border-radius: 5px;
        border: 1px white solid;
        background-color: rgb(35,35,35);
        color: white;
        font-size:12px;
        width: 57%;
    }
    .director-form {
        padding: 2%;
        border: solid #FFFFAB;
        border-width: 1px;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        margin-left: 10px;
        margin-bottom:  30px;
    }
    .insert-info {
        position: relative;
        display: flex;
        padding: 15px;
        justify-content: center;
        margin-left: 8px;
    }
    .actor-insert-info {
        position: relative;
        display: flex;
        flex-direction: column;
        padding: 10px;
        justify-content: center;
        align-items: center;
    }
}
@media screen and (max-width:300px) { 
    .actor-wrapper {
        position: relative;
        padding: 10px 40px;
        text-align: center;
        display:flex;
    }
    .actor-form {
        padding: 3px;
        border: solid #FFFFAB;
        border-width: 1px;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        margin: 15px;
    }
    .movie {
        font-weight: bold;
        font-size:25px;
    }
    .label {
        font-size: 12px;
    }
    .input {
        border-radius: 5px;
        border: 1px white solid;
        background-color: rgb(35,35,35);
        color: white;
        font-size:12px;
        width: 50%;
    }
    .director-form {
        padding: 2%;
        border: solid #FFFFAB;
        border-width: 1px;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        margin-left: 20px;
        margin-bottom:  30px;
    }
    .insert-info {
        position: relative;
        display: flex;
        padding: 15px;
        justify-content: center;
        margin-left: 12px;
    }
    .actor-insert-info {
        position: relative;
        display: flex;
        flex-direction: column;
        padding: 3px;
        justify-content: center;
        align-items: center;
    }
    
}