
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        #btn1
        {
            border: 2px solid black;
            margin-left: 90vh;
            margin-top: 2vh;
            margin-bottom: 2vh;
        }
        #btn{
            border: 2px solid black;
            margin-left: 3vh;
        }
    </style>
</head>
<body>
    <a href="Add.php"><input type="button" name="Add" value="ADD CARS" id="btn1" class="btn btn-info"></a>
    <a href="Cview.php"><input type="button" name="Add" value="VIEW CARS" id="btn" class="btn btn-info"></a>
</body>
</html>
<?php
    $con=mysqli_connect("localhost","root","","project");

    $qry=mysqli_query($con,"select * from tbl_drive");

    echo"<center><h2>Book Drive Information</h2></center><br>";
    echo"<table border=2 class='table table-hover table-light'>";
    
    echo"<th>User Drive Status</th>";
    echo"<th>Delete</th>";
    echo"<th>Id</th>";
    echo"<th>Title</th>";
    echo "<th>Car Model</th>";
    echo"<th>First Name</th>";
    echo"<th>Sure Name</th>";
    echo"<th>Mobile Number</th>";
    echo"<th>Email</th>";
    echo"<th>Address</th>";
    echo"<th>Date</th>";
    echo"<th>Status</th>";
    echo"<th>Approval</th>";
    echo"<th>Not Approval</th>";

    while($row=mysqli_fetch_array($qry))
    {
        echo"<tr>";
        
        $sd=$row[10];
        if($sd==0) 
        {
            echo "<td>Drive Not Compalet</a>";
        }
        else
        {
            echo "<td>Drive Compaletd</a>";
        }
        echo "<td>";?><a href="Delete.php?x=<?php echo $row[0];?>" onClick="javascript: return confirm('do you want to delete ?');"><img src='../Images/delete.png' height=18 width=18 title='Delete Drive!!'></a><?php "</td>";
        echo"<td>".$row[0]."</td>";
        echo"<td>".$row[1]."</td>";
        echo"<td>".$row[2]."</td>";
        echo"<td>".$row[3]."</td>";
        echo"<td>".$row[4]."</td>";
        echo"<td>".$row[5]."</td>";
        echo"<td>".$row[6]."</td>";
        echo"<td>".$row[7]."</td>";
        echo"<td>".$row[8]."</td>";
        $status=$row[9];
        if($status==0)
        {
            echo "<td>Not Approved</td>";
            echo "<td title='Drive Accept'><a href='update.php?x=$row[0]'>Approval</td></a>";
            echo "<td>Not approval</td>";
        }
        else
        {
            echo "<td>Approved</td>";
            echo "<td>Approved</td>";
        }
        $status=$row[9];
        if($status==1 && $sd==1)
        {
            
            echo "<td><p title='So Drive Compaleted'>Not Approved</p></td>";
            //echo "<td title='Not drive accept'><a href='Update1.php?x=$row[0]'>Not Approval</td></a>";
        }
        elseif($status==1)
        {
            echo "<td title='Not drive accept'><a href='Update1.php?x=$row[0]'>Not Approval</td></a>";
        }

    }
    echo "</table>";
?>
