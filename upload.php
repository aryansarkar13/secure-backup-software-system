<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload files</title>
    <link rel="stylesheet" href="./upload.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
    require_once("./config.php");
    if(isset($_POST['save'])){
        session_start();
        $uid = $_SESSION['uid'];
        $title=$_POST['title'];
        $title= $_POST['title'];
        $file = rand(1000,10000)."-".$_FILES['file']['name'];
        //creating a temporary name so that two files with similar name do not get mixed up
        $file_loc=$_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_type= $_FILES['file']['type'];
        $folder= "uploads/";
        //moving file to destination folder
        move_uploaded_file($file_loc,$folder.$file);
        $fid = uniqid($uid);
        $sql = "INSERT INTO `files` VALUES('$fid','$uid','$title','$file_type','$file_size')";
        if($con->query($sql) == true){
            echo "<h3 style='margin-left:400px;margin-top:20px;color:green' >File uploaded successfully</h3>";
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
            <a href="./upload.php" class="active" >Upload</a>
        </li>
        <li>
            <a href="./view.php" >All uploads</a>
        </li>
        <li>
            <a href="./dashboard.php" >Dashboard</a>
        </li>
    </div>
    <div class="container">
      <div class="row">
        <form  method="post" enctype="multipart/form-data" >
          <h3>Upload File</h3>
          <input type="text" name="title" placeholder="write title" class="input"><br>
          <input type="file" name="file"> <br>
          <button type="submit" name="save">upload</button>
        </form>
      </div>
    </div>
</body>
</html>