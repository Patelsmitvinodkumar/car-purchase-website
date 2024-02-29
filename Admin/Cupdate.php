<?php 
    $con=mysqli_connect("localhost","root","","project");

    $name=$_GET['name'];
    $qry=mysqli_query($con,"select * from tbl_media where c_name='$name'");

    $row=mysqli_fetch_array($qry);

    if(isset($_POST['submit']))
    {
        if($_FILES['pic']['name'] != "")
        {
            $pic=$_FILES['pic']['name'];
            $dst="Images/".$pic;
            move_uploaded_file($_FILES['pic']['tmp_name'],$dst);
        }
        else
		{
			$pic = $_POST['oldimage'];
		}
            $cname=$_POST['cname'];

        $qry=mysqli_query($con,"update tbl_media set c_name='$cname',c_photo='$pic' where c_name='$name'");

        if($qry)
        {
            
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
                <input type="text" name="cname" class="form-control" value="<?php echo $row[0]; ?>"><br>

                <b>Old Image</b>
				<img src="Images/<?php echo $row['1']; ?>" style="height: 100px;"><br><br>
                <input type="hidden" name="oldimage" value="<?php echo $row['1']; ?>">
                
                <b>Upload Photo :</b>
                <input type="file" name="pic" value="<?php echo $row['1']; ?>" style="height: 100px;"><br><br>

                <center>
                    <input type="submit" value="Update" name="submit" class="btn btn-success">
                </center>   
            </form>
        </div>
    </div>
    

</body>
</html>