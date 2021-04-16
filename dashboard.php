<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./dashboard.css">
</head>
<?php
    session_start();
    require_once("./config.php");
    $uid = $_SESSION['uid'];
    $sql = "SELECT * from `users` WHERE userid='$uid' ";
    $res = $con->query($sql);
    $row = $res->fetch_array();
    $uname = $row['username'];
?>
<body>
<div id="header">
        <div style="float:left;">
                <p style="color:white;font-size:25px">Secure Files<i class="fa fa-file " style="padding-left: 5px;" aria-hidden="true"></i></p>
        </div>
        <li>
            <a href="./view.php" >All uploads</a>
        </li>
        <li>
            <a href="./upload.php"  >Upload</a>
        </li>
        <li>
            <a href="./dashboard.php" class="active">Dasboard</a>
        </li>
    </div>
    <h1>Holaaa <?php echo $uname?></h1>
</body>
</html>