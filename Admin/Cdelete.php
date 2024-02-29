<?php

$con = mysqli_connect("localhost", "root", "", "project");

$name=$_GET['name'];

$qry=mysqli_query($con,"delete from tbl_media where c_name='$name'");
if($qry)
{
    header('location:Cview.php');
    echo "<script>alert('Car Deleted....');</script>";
}
else
{
    echo "<script>alert('Car Not Deleted....');</script>";
}

?>