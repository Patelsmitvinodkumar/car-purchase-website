<?php

$con = mysqli_connect("localhost", "root", "", "project");

$id=$_GET['x'];

$qry=mysqli_query($con,"delete from tbl_drive where u_id=$id");
if($qry)
{
    header("location:Admin.php");
    echo "<script>alert('Deleted....');</script>";
}
else
{
    echo "<script>alert('Not Deleted....');</script>";
}

?>