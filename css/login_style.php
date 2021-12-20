<?php
	header("Content-type: text/css");
?>

.userInfo-wrap {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    padding-top : 100px;
    padding-bottom : 100px;
}

.userInfo-html {
    padding: 30px;
    border: solid #FFFFAB;
    border-width: 1px;
    border-radius: 10px;
    text-align: center;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}

.userInfo-html-register {
    padding: 30px;
    border: solid #ABFFAB;
    border-width: 1px;
    border-radius: 10px;
    text-align: center;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}

.notice {
    margin: 5px;
    padding: 5px;
    color: #FFABAB;
}

.sign-in-label {
    font-weight: bold;
    font-size: 50px;
}

.sign-in-html {
    padding: 10px;
}

.group {
    text-align: right;
    margin-bottom: 20px;
}

.input {
    border-radius: 5px;
    border: none;
}

.button {
    margin-top: 20px;
    background-color: #FFFFDE;
    color: black;
    width: 100%;
    border-radius: 5px;
    font-weight: bold;
    font-size: 20px;
    border: solid #FFFFAB;
    padding: 5px;
    transition: all .35s;
}

.button:hover {
    background-color: rgb(35,35,35);
    color: #FFFFAB;
}

.button-register {
    margin-top: 20px;
    background-color: #DEFFDE;
    color: black;
    width: 100%;
    border-radius: 5px;
    font-weight: bold;
    font-size: 20px;
    border: solid #ABFFAB;
    padding: 5px;
    transition: all .35s;
}

.button-register:hover {
    background-color: rgb(35,35,35);
    color: #ABFFAB;
}