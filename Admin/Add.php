<?php 
    $con=mysqli_connect("localhost","root","","project");

    if(isset($_POST['submit']))
    {
        $cname=$_POST['c_name'];

        $pic=$_FILES['pic']['name'];
        $dst="Images/".$pic;

        $qry=mysqli_query($con,"insert into tbl_media values('$cname','$pic')");

        if($qry)
        {
            move_uploaded_file($_FILES['pic']['tmp_name'],$dst);
            header("location:Cview.php");
            echo "<script>alert('Dar added....');</script>";
        }
        else
        {
            echo "<script>alert('Dar not added....');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Images/Logo.png">
    <title>Add Cars</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        form{
            margin-top:10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-group">
    
            <form action="" method="POST" enctype="multipart/form-data">
                <center><b><h2>ADD CARS</h2></b></center><hr><br><br>
    
                <b>Car Model Name : </b>
                <input type="text" name="c_name" class="form-control"><br>

                <b>Upload Photo :</b>
                <input type="file" name="pic"><br><br>

                <center>
                    <input type="submit" value="Submit" name="submit" class="btn btn-success">
                </center>   
            </form>
        </div>
    </div>
    

</body>
</html>