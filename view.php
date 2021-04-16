<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All docs</title>
    <link rel="stylesheet" href="./view.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
    require_once("./config.php");
?>
<body>
<div id="header">
        <div style="float:left;">
                <p style="color:white;font-size:25px">Secure Files<i class="fa fa-file " style="padding-left: 5px;" aria-hidden="true"></i></p>
        </div>
        <li>
            <a href="./view.php" class="active" >All uploads</a>
        </li>
        <li>
            <a href="./upload.php" >Upload</a>
        </li>
        <li>
            <a href="./dashbaord.php" >Dashboard</a>
        </li>
    </div>
<table id="table">
    <tr>
    <td>Title</td>
    <td>File Type</td>
    <td>File Size(KB)</td>
    <td>View</td>
    </tr>
    <?php
 $sql="SELECT * FROM `files`";
 $res = $con->query($sql);
 while($row=$res->fetch_array())
 {
  ?>
        <tr>
        <td><?php echo $row['title'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
 }
 ?>
</table>
</body>
</html>