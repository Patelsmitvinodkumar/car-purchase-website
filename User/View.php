<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive Demo View</title>
    <link rel="icon" href="../Images/Logo.png">
    <link rel="stylesheet" href="View.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <center>
        <h1>Drive Demo View</h1>

        <form action="" method="post">
            <table>
                <tr>
                    <td>
                        <input type="email" name="txtemail" id="email" placeholder=" Eamil *" required>
                        <h5 id="emailcheck"> </h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="txtmob" id="mnumber" placeholder=" Mobile Number *" required>
                        <h5 id="numcheck"> </h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="btnsubmit" Value="Submit" id="btnsub">

                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>
<?php
$con = mysqli_connect("localhost", "root", "", "project");

if (isset($_POST['btnsubmit'])) 
{

    $email = $_POST['txtemail'];
    $mobile = $_POST['txtmob'];


    $qry = mysqli_query($con, "select * from tbl_drive where u_email='$email' and u_mobile='$mobile'");

    if($qry)    
    {
        echo"<table border=2 class='table table-hover table-light'>";
        
        //echo"<th>Drive Compalet</th>";
        echo"<th>Delete</th>";
        echo "<th>Title</th>";
        echo "<th>Car Model</th>";
        echo "<th>First Name</th>";
        echo "<th>Sure Name</th>";
        echo "<th>Mobile Number</th>";
        echo "<th>Email</th>";
        echo "<th>Address</th>";
        echo "<th>Date</th>";
        echo "<th>Status</th>";
        echo "<th>Edit</th>";
        echo"<th>Drive Compalet</th>";

        while ($row = mysqli_fetch_array($qry)) {
            echo "<tr>";

            //$sd=$row[9];

            // if($sd==0)
            // {
            //     echo "<td><a href='Update1.php?x=$row[0]'>Conform</td></a>";
            // }
            // else
            // {
            //     echo "<td>Drive compaleted</td></a>";
            // }
            echo "<td>";?><a href="Delete.php?x=<?php echo $row[0];?>" onClick="javascript: return confirm('do you want to delete ?');"><img src='../Images/delete.png' height=18 width=18 title='Delete Drive!!'></a><?php "</td>";
            echo "<td>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . "</td>";
            echo "<td>" . $row[3] . "</td>";
            echo "<td>" . $row[4] . "</td>";
            echo "<td>" . $row[5] . "</td>";
            echo "<td>" . $row[6] . "</td>";
            echo "<td>" . $row[7] . "</td>";
            echo "<td>" . $row[8] . "</td>";

            $sd=$row[10];
            $status = $row[9];
            if ($status == 0) {
            echo "<td>Your Drive Not Accept</td>";
            echo "<td>" . "<a href='Update.php?x=$row[0]'><image src='../Images/edit.png' height=20 width=20 title='Update Drive!!'></a>" . "</td>";
            // echo "<td>"."<a href='Update1.php?x=$row[0]'>Conform</a>"."</td>";
            echo "<td>Drive Not compaleted</td></a>";
            } elseif($sd==0 && $status==1 ) {
            echo "<td>Your Drive Accepted</td>";
            echo "<td>You can't edit data</td>";
            echo "<td>";?><a href="Update1.php?x=<?php echo $row[0];?>" onClick="javascript: return confirm('Your Drive Compateled?');"><img src='../Images/right.webp' height=18 width=18 title="Drive Compaleted!"></a><?php "</td>";
            }
            elseif(($sd==1 && $status==1) )
            {
                echo "<td>Your Drive Accepted</td>";
                echo "<td>You can't edit data</td>";
                echo "<td>Drive compaleted</td></a>";
            }
        }
        echo "</table>";
    }
    else
    {
        echo "<script> Not Match userid and password </script>";
    }
    
} 
?>