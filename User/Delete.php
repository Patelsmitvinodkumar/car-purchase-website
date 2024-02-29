<?php

$con = mysqli_connect("localhost", "root", "", "project");

$id=$_GET['x'];

$qry=mysqli_query($con,"delete from tbl_drive where u_id=$id");
if($qry)
{
    echo "<script>alert('Deleted....');</script>";
    header("location:Index.php");
}
else
{
    echo "<script>alert('Not Deleted....');</script>";
}

?>