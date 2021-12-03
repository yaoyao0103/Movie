<?php
    error_reporting(0);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Member System - Register</title>
    </head>
    <body>
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
                                $conn = mysqli_connect("localhost", "yao", "1234", "movie_db"); // connect to DB
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
            echo "<form action='./register.php' method='post'>
            <table>
                <tr>
                    <td></td>
                    <td style:'color:red'>$errormsg</td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type='text' name='username' value='$username' /></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type='password' name='password' value='$password' /></td>
                </tr>
                <tr>
                    <td>Retype:</td>
                    <td><input type='password' name='retypePassword' value='$retypePassword' /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type='submit' name='registerBtn' value='Sign up' /></td>
                </tr>
            </table>
            </form>";
            
        ?>
    </body>
</html>