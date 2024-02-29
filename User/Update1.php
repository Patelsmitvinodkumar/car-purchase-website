<?php
    $con=mysqli_connect("localhost","root","","project");
    
    $id=$_GET['x'];

    $qry=mysqli_query($con,"update tbl_drive set u_drive=1 where u_id=$id");
    if($qry)
    {
        echo"<script>alert 'Drive Comapeted'</script>";
        header("location:Index.php");
    }
    else
    {
        echo"Drive not compaleted";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>