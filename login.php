<?php
    error_reporting(0);
    session_start();
    $username = $_SESSION['username'];
    $isAdmin = $_SESSION['isAdmin'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="css/style.php">
    <link rel="stylesheet" href="css/login_style.php">
    
    <title> Login page </title>
</head>

<body>
    <div>
         <?php include_once('navbar_no_search.php'); ?>
    </div>

    <?php
        if($username){ // already logged in
            if($isAdmin){ // is administrator
                header("Location: admin.php");
            }
            else{ // is not administrator
                header("Location: member.php");
            }
        }
        else{ // not logged in

            if($_POST['loginBtn']){ // get form from loginBtn 
                $username = $_POST['username']; // get username in form
                $password = $_POST['password']; // get password in form
                
                //make sure info provided
                if($username){ 
                    if($password){
                        $conn = mysqli_connect("localhost", "yao", "1234", "movie_db"); // connect to DB
                        $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'"); // query for matching username
                        $numrows = mysqli_num_rows($query); // number of result
                        if($numrows == 1){ // have one matching data
                            $row = mysqli_fetch_assoc($query); // get this row
                            // get some value of this row
                            $dbUsername = $row['username'];
                            $dbPassWord = $row['password'];
                            $dbIsAdmin = $row['isAdmin'];

                            if($password == $dbPassWord){ // check the password is correct
                                //set session info
                                $_SESSION['username'] = $dbUsername;
                                $_SESSION['isAdmin'] = $dbIsAdmin;

                                header("Location: index.php");                                    
                            }
                            else
                                $errormsg = "You didn't enter the correct password.";
                        }
                        else
                            $errormsg = "The username you entered was not found.";
                    }
                    else
                        $errormsg = "You must enter your password.";
                }
                else
                    $errormsg = "You must enter your username.";
            } 
            else
                $errormsg = "";

            // form
            echo
            "<div class='userInfo-wrap'>
                <div class='userInfo-html'>
                    <label class='sign-in-label'>Sign In</label>
                    <div class='userInfo-form'>
                        <form class='sign-in-html' method='post' action='./login.php'>
                            <div class='notice'>$errormsg</div>
                            <div class='group'>
                                <label for='user' class='label'>Username:</label>
                                <input id='user' type='text' class='login-input' name = 'username'>
                            </div>
                            <div class='group'>
                                <label for='pass' class='label'>Password :</label>
                                <input id='pass' type='password' class='login-input' data-type='password' name='password'>
                            </div>
                            <div>
                                <input type='submit' class='button' value='Sign In' name='loginBtn' >
                            </div>
                            <div class='hr'></div>
                        </form>
                    </div>
                </div>
            </div>";
        }
    ?>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>