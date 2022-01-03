<?php
    error_reporting(0);
    $errormsg = "";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
        <link rel="stylesheet" href="css/style.php">
        <link rel="stylesheet" href="css/login_style.php">
        
        <title>Member System - Register</title>
    </head>
    <body>
        <div>
             <?php include_once('navbar_no_search.php'); ?>
        </div>

        <?php
            if($_POST['registerBtn']){ // get form from activateBtn

                //get form info
                $username = $_POST['username'];
                $password = $_POST['password'];
                $retypePassword = $_POST['retypePassword'];

                //make sure info provided
                if($username){
                    if($password){
                        if($retypePassword){
                            if($password == $retypePassword){
                                $conn = mysqli_connect("localhost", "root", "root", "movie_db"); // connect to DB
                                $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'"); // query for matching username
                                $numrows = mysqli_num_rows($query); // number of result
                                if($numrows == 0){ // have no result: there is no exist the same username
                                    // query for insert user info
                                    mysqli_query($conn, "INSERT INTO users VALUES('$username', '$password', 0)");
                                    $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'"); // query for matching username
                                    $numrows = mysqli_num_rows($query); // number of result
                                    if($numrows == 1){ // have one result
                                        $errormsg = "Registration success";
                                    }
                                    else
                                        $errormsg = "An error has occurred. Your account was not created";
                                }
                                else
                                    $errormsg = "Their is already a user with that username";
                            }
                            else
                                $errormsg = "Your passwords did not match.";
                        }
                        else
                            $errormsg = "You must retype your password to register.";
                    }
                    else
                        $errormsg = "You must enter your password to register.";
                }  
                else
                    $errormsg = "You must enter your username to register.";
            }
            // echo "<form action='./register.php' method='post'>
            // <table>
            //     <tr>
            //         <td></td>
            //         <td style:'color:red'>$errormsg</td>
            //     </tr>
            //     <tr>
            //         <td>Username:</td>
            //         <td><input type='text' name='username' value='$username' /></td>
            //     </tr>
            //     <tr>
            //         <td>Password:</td>
            //         <td><input type='password' name='password' value='$password' /></td>
            //     </tr>
            //     <tr>
            //         <td>Retype:</td>
            //         <td><input type='password' name='retypePassword' value='$retypePassword' /></td>
            //     </tr>
            //     <tr>
            //         <td></td>
            //         <td><input type='submit' name='registerBtn' value='Sign up' /></td>
            //     </tr>
            // </table>
            // </form>";
            echo
            "<div class='userInfo-wrap'>
                <div class='userInfo-html-register'>
                    <label class='sign-in-label'>Sign Up</label>
                    <div class='userInfo-form'>
                        <form class='sign-in-html' method='post' action='./register.php'>
                            <div class='notice'>$errormsg</div>
                            <div class='group'>
                                <label for='user' class='label'>Username:</label>
                                <input id='user' type='text' class='login-input' name = 'username'>
                            </div>
                            <div class='group'>
                                <label for='pass' class='label'>Password :</label>
                                <input id='pass' type='password' class='login-input' data-type='password' name='password'>
                            </div>
                            <div class='group'>
                                <label for='pass' class='label'>Retype :</label>
                                <input id='pass' type='password' class='login-input' data-type='password' name='retypePassword'>
                            </div>
                            <div>
                                <input type='submit' class='button-register' value='Sign Up' name='registerBtn' >
                            </div>
                            <div class='hr'></div>
                        </form>
                    </div>
                </div>
            </div>";
        ?>
    </body>
</html>