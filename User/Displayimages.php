<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        .cover
        {
            float: left;
            display: flex;
        }
       
        .xc40text {
        padding-left: 22vh;
        color: black;
        }
        
    </style>
</head>

<body>

</body>

</html>
<?php
$con = mysqli_connect("localhost", "root", "", "project");

$qry = mysqli_query($con, "select * from tbl_media");

if ($qry) {
    while ($row = mysqli_fetch_array($qry)) {

        
        echo"<div class='cover'>";
        echo "<div class='box'>";
        echo "<img src='../Admin/Images/$row[1]' height=300px'>";
        echo "<h3 class='xc40text'>" . "$row[0]" . "</h3>";
        echo "</div>";
        echo "</div>";
        
    }
}
?>