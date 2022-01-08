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
    padding: 2%;
    border: solid #FFFFAB;
    border-width: 1px;
    border-radius: 10px;
    text-align: center;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}

.userInfo-html-register {
    padding: 2%;
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
.login-input {
    border-radius: 5px;
    border: 1px white solid;
    color: black;
    font-size:18px;
    width: 62%;
}
.button {
        margin-top: 20px;
        background-color: #FFFFDE;
        color: black;
        width: 80%;
        border-radius: 5px;
        font-weight: bold;
        font-size: 20px;
        border: solid #FFFFAB;
        padding:2%;
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
    width: 80%;
    border-radius: 5px;
    font-weight: bold;
    font-size: 20px;
    border: solid #ABFFAB;
    padding: 2%;
    transition: all .35s;

}

.button-register:hover {
    background-color: rgb(35,35,35);
    color: #ABFFAB;
}
@media screen and (max-width:600px) { 
    .userInfo-html {
        padding: 30px;
        border: solid #FFFFAB;
        border-width: 1px;
        border-radius: 10px;
        text-align: center;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
    .sign-in-label {
        font-weight: bold;
        font-size: 40px;
    }
    .sign-in-html {
        padding: 8px;
    }
  
    .login-input {
        border-radius: 5px;
        border: 1px white solid;
        color: black;
        font-size:12px;
        width: 57%;
    }
    .button-register {
        margin-top: 20px;
        background-color: #DEFFDE;
        color: black;
        width: 80%;
        border-radius: 5px;
        font-weight: bold;
        font-size: 15px;
        border: solid #ABFFAB;
        padding: 2%;
        transition: all .35s;
    }
    .button {
        margin-top: 20px;
        background-color: #FFFFDE;
        color: black;
        width: 80%;
        border-radius: 5px;
        font-weight: bold;
        font-size: 15px;
        border: solid #FFFFAB;
        padding:2%;
        transition: all .35s;
    }   
}
@media screen and (max-width:373px) { 
    .userInfo-html {
        padding: 30px;
        border: solid #FFFFAB;
        border-width: 1px;
        border-radius: 10px;
        text-align: center;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
    .sign-in-label {
        font-weight: bold;
        font-size: 30px;
    }
    .sign-in-html {
        padding: 7px;
    }
   
    .login-input {
        border-radius: 5px;
        border: 1px white solid;
        color:black;
        font-size:12px;
        width: 50%;
    }
    .button-register {
        margin-top: 20px;
        background-color: #DEFFDE;
        color: black;
        width: 80%;
        border-radius: 5px;
        font-weight: bold;
        font-size: 15px;
        border: solid #ABFFAB;
        padding: 2%;
        transition: all .35s;
    }
    .button {
        margin-top: 20px;
        background-color: #FFFFDE;
        color: black;
        width: 80%;
        border-radius: 5px;
        font-weight: bold;
        font-size: 15px;
        border: solid #FFFFAB;
        padding:2%;
        transition: all .35s;
    }   
}