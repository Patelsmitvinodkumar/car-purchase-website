<?php
    $con=mysqli_connect("localhost","root","","project");
    
    $id=$_GET['x'];
    $qry=mysqli_query($con,"select * from tbl_drive where u_id=$id");

    $row=mysqli_fetch_array($qry);

    if(isset($_POST['btnsubmit']))
    {
        //$id=$_GET['x'];
        $title=$_POST['title'];
        $cname=$_POST['txtcname'];
        $fname=$_POST['txtfname'];
        $sname=$_POST['txtsname'];
        $mobile=$_POST['txtmob'];
        $email=$_POST['txtemail'];
        $address=$_POST['txtaddress'];
        $date=$_POST['txtdate'];

        $qry=mysqli_query($con,"update tbl_drive set u_title='$title',u_cname='$cname',u_fname='$fname',u_sname='$sname',u_mobile='$mobile',u_email='$email',u_address='$address',u_date='$date' where u_id='$id'");
        
        if($qry)
        {
            echo "<script>alert('Data Updated....');</script>";
            header("location:Index.php");
        }
        else
        {
            echo "<script>alert('Data Not Updated....');</script>";
        }
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="Update.css">
    <script src="jquery.min.js"></script>
</head>
<body>

<script>
        $(document).ready(function () {
            $("#btnsub").click(function () {

                title=$("#title").val();
                fname = $("#firstname").val();
                cname=$("#carname").val();
                sname = $("#surname").val();
                pnum = $("#mnumber").val();
                email = $("#email").val();
                address = $("#address").val();
                date = $("#date").val();

                $("#titlecheck").hide();
                $("#carcheck").hide();
                $("#namecheck").hide();
                $("#snamecheck").hide();
                $("#numcheck").hide();
                $("#emailcheck").hide();
                $("#addresscheck").hide();
                $("#datecheck").hide();

                if(title == "")
                {
                    $("#titlecheck").show();
                    $("#titlecheck").html("*Select your title");
                    $("#titlecheck").css({"color":"red"});
                    $("#title").focus();
                    return false;
                }
                else
                {
                    $("#titlecheck").hide();
                    $("#title").css({"border-color":"green"});
                }

                if (cname == "") {
                    $("#carcheck").show();
                    $("#carcheck").html("*Enter Car model");
                    $("#carcheck").css({
                        "color": "red"
                    });
                    $("#carname").focus();
                    return false;
                } else {
                    $("#carcheck").hide();
                    $("#carname").css({
                        "border-color": "green"
                    })
                }

                if (fname == "" || fname.length < 2 || fname.length >= 10) {
                    $("#namecheck").show();
                    $("#namecheck").html("*Enter Valid Name");
                    $("#namecheck").css({ "color": "red" });
                    $("#firstname").focus();
                    return false;
                }
                else {
                    $("#snamecheck").hide();
                    $("#firstname").css({ "border-color": "green" });
                }

                if (sname == "" || sname.length < 2 || sname.length >= 10) {
                    $("#snamecheck").show();
                    $("#snamecheck").html("*Enter Valid Surname");
                    $("#snamecheck").css({ "color": "red" });
                    $("#surname").focus();
                    return false;
                }
                else {
                    $("#snamecheck").hide();
                    $("#surname").css({ "border-color": "green" });
                }

                if (pnum == "" || pnum.length != 10) {
                    $("#numcheck").show();
                    $("#numcheck").html("*Enter Valid Number");
                    $("#numcheck").css({ "color": "red" });
                    $("#mnumber").focus();
                    return false;
                }
                else {
                    $("#numcheck").hide();
                    $("#mnumber").css({ "border-color": "green" })
                }

                if (email == "") {
                    $("#emailcheck").show();
                    $("#emailcheck").html("*Enter Valid Eamil");
                    $("#emailcheck").css({ "color": "red" });
                    $("#email").focus();
                    return false;
                }
                else {
                    $("#emailcheck").hide();
                    $("#email").css({ "border-color": "green" })
                }

                if (address == "" || address.length < 4 || address.length >= 30) {
                    $("#addresscheck").show();
                    $("#addresscheck").html("*Enter Valid Address");
                    $("#addresscheck").css({ "color": "red" });
                    $("#address").focus();
                    return false;
                }
                else {
                    $("#addresscheck").hide();
                    $("#address").css({ "border-color": "green" })
                }

                if (date == "") {
                    $("#datecheck").show();
                    $("#datecheck").html("*Select the Date");
                    $("#datecheck").css({ "color": "red" });
                    $("#date").focus();
                    return false;
                }
                else {
                    $("#datecheck").hide();
                    $("#date").css({ "border-color": "green" })
                }
            });
        });
    </script>

<label class="test">TEST DRIVE REQUEST</label><br><br>
        <h1 class="auto">Volvo </h1><br><br><br>
        <h1 class="con">Contact Details</h1>

        <center>
            <table class="form" cellspacing="22">
                <form action="" method="post">
                    <tr>
                        <td>
                            <h5>Title</h5>
                            <select id="title" name="title">
                                <?php echo "<option value='$row[1]' hidden>$row[1]</option>";?>
                                <option value="" hidden>Choose a title</option>
                                <option value="mr">Mr.</option>
                                <option value="mrs">Mrs</option>
                                <option value="miss">Miss</option>
                                <option value="ms">Ms</option>
                                <option value="dr">Dr</option>
                            </select>
                            <h5 id="titlecheck"> </h5>
                        </td>
                        
                        <td>
                            <input type="text" name="txtcname" id="carname" placeholder=" Car Name *" value="<?php echo $row[2]; ?>"required>
                            <h5 id="carcheck"> </h5>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="txtfname" id="firstname" placeholder=" First Name *" value="<?php echo $row[3]; ?>">
                            <h5 id="namecheck"> </h5>
                        </td>

                        <td>
                            <input type="text" name="txtsname" id="surname" placeholder=" Surname *" value="<?php echo $row[4]; ?>">
                            <h5 id="snamecheck"> </h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="txtmob" id="mnumber" placeholder=" Mobile Number *" value="<?php echo $row[5]; ?>">
                            <h5 id="numcheck"> </h5>
                        </td>

                        <td>
                            <input type="email" name="txtemail" id="email" placeholder=" Eamil *" value="<?php echo $row[6]; ?>">
                            <h5 id="emailcheck"> </h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="txtaddress" id="address" placeholder=" Address *" value="<?php echo $row[7]; ?>">
                            <h5 id="addresscheck"> </h5>
                        </td>

                        <td>
                            <input type="date" name="txtdate" id="date" value="<?php echo $row[8]; ?>">
                            <h5 id="datecheck"> </h5>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <h3 class="privacy">Privacy</h3>
                            <p class="ptext"> Volvo Auto India Pvt Ltd will also share your personal data with your
                                selected <br>retailer in order to process
                                and follow up on your request.<br>
                                By selecting one or several communication channels below, I consent to having<br> my
                                personal data processed in
                                order to receive future news and offers from Volvo<br> Auto India Pvt Ltd and my
                                appointed retailer in the
                                chosen channels.<br>By submitting this request you consent to the processing.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="btnsubmit" Value="Update" id="btnsub">
                            
                        </td>
                    </tr>
                </form>
            </table><br>
        </center>
</body>
</html>