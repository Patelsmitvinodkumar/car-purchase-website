<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW CARS</title>
    <link rel="icon" href="../Images/Logo.png">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    
</body>
</html>
<?php 
    $con=mysqli_connect("localhost","root","","project");

    $qry=mysqli_query($con,"select * from tbl_media");

    echo"<center><h2>Car Models</h2></center><br>";   
    echo "<table border=2 class='table table-hover table-light'>";
    echo "<tr>";
    echo "<th>Car Model Name</th>";
    echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Image</th>";
    echo "<th>Update</th>";
    echo "<th>Delete</th>";
    echo "</tr>";

    while($row=mysqli_fetch_array($qry))
    {
        echo "<tr>";
        echo"<td>"."$row[0] "."</td>";
        echo "<td>"."<image src='Images/$row[1]' width=150>"."</td>";
        echo "<td>";?><a href="Cupdate.php?name=<?php echo $row[0];?>" onClick="javascript: return confirm('do you want to Update ?');"><img src='../Images/edit.png' height=18 width=18 title='Update Car!!'></a><?php "</td>";
        echo "<td>";?><a href="Cdelete.php?name=<?php echo $row[0];?>" onClick="javascript: return confirm('do you want to delete ?');"><img src='../Images/delete.png' height=18 width=18 title='Delete Car!!'></a><?php "</td>";
        echo "</tr>";
    }
?>