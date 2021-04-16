<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./signUp.css">
</head>
<?php
    
    if(isset($_POST['submit'])){
        require_once("./config.php");
        // var_dump($_POST[]);
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $uid = uniqid($uname);
        $securepass = crypt($pass,$uname);
        
        $sql = "INSERT INTO `users` VALUES('$uid','$uname','$securepass')";
        if($con->query($sql) == true){
            echo "<h3 style='margin-left:400px;margin-top:20px;color:green' >You have successfully registered<a href='./login.php'>Go back to Login Page</a></h3>";
       }
       else{
           echo "ERROR: $con->error";
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
            <a href="./login.php" >Login</a>
        </li>
        <li>
            <a href="./signUp.php" class="active" >Signup</a>
        </li>
        <li>
            <a href="./index.php" >Home</a>
        </li>
    </div>
    <div class="signup center">
        <form  method="post">
        <div class="row">
            <label for="userName" class="label">Enter Username</label>
            <input type="text" placeholder="Enter your username" name="uname" required />
        </div>
        <div class="row">
            <label for="userName" class="label">Enter Password</label>
            <input type="password" placeholder="Enter your password" name="pass" required />
        </div>
        <div class="row">
            <button class="submitButton" name="submit">Sign Up</button>
        </div>
        </form>
    </div>
</body>
</html>