<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
    session_start();
    if(isset($_POST['submit'])){
        require_once("./config.php");
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $securepass = crypt($pass,$uname);
        $query = "SELECT * FROM `users` WHERE username='$uname'";
        $result = $con->query($query);
        $row= $result->fetch_array();
        if($row['username']!=$uname){
            echo "<p style='color:red'>No such user</p>";
        }
        else{
            if($row['password'] == $securepass){
                header('location: ./dashboard.php');
                $_SESSION['uid']=$row['userid'];
            }
            else{
                echo "Incorrect Password";
            }
        }
        $con->close();

    }

?>
<body>
<div id="header">
        <div style="float:left;">
                <p style="color:white;font-size:25px">Secure Files<i class="fa fa-file " style="padding-left: 5px;" aria-hidden="true"></i></p>
        </div>
        <li>
            <a href="./login.php" class="active">Login</a>
        </li>
        <li>
            <a href="./signUp.php" >Signup</a>
        </li>
        <li>
            <a href="./index.php" >Home</a>
        </li>
    </div>
    <div class="login center">
        <form  method="post">
        <div class="row">
            <label for="userName" class="label" >Enter Username</label>
            <input type="text" placeholder="Enter your username" name ="uname" required />
        </div>
        <div class="row">
            <label for="userName" class="label">Enter Password</label>
            <input type="password" placeholder="Enter your password" name="pass" required />
        </div>
        <div class="row">
            <button class="submitButton" name="submit">Login</button>
        </div>
        </form>
    </div>
    
</body>
</html>