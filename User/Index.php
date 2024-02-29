<?php
$con = mysqli_connect("localhost", "root", "", "project");

if (isset($_POST['btnsubmit'])) {
    $title = $_POST['title'];
    $cname=$_POST['txtcname'];
    $fname = $_POST['txtfname'];
    $sname = $_POST['txtsname'];
    $mobile = $_POST['txtmob'];
    $email = $_POST['txtemail'];
    $address = $_POST['txtaddress'];
    $date = $_POST['txtdate'];

    $qry = mysqli_query($con, "insert into tbl_drive values('','$title','$cname','$fname','$sname','$mobile','$email','$address','$date',0,0)");
    if ($qry) {
        header("location:View.php");
        echo "<script>alert('Drive Booked....');</script>";
    } else {
        echo "<script>alert('Not Booked....');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Welcome to Volvo</title>
    <link rel="icon" href="../Images/Logo.png">
    <script src="jquery.min.js"></script>
    <link rel="stylesheet" href="Index.css">
    <link rel="stylesheet" href="Responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        .cover {
            float: left;
            display: flex;
        }

        .xc40text {
            padding-left: 22vh;
            color: black;
        }
    </style>
    <script>
        $(document).ready(function() {
            $("#btnsub").click(function() {

                title = $("#title").val();
                cname=$("#carname").val();
                fname = $("#firstname").val();
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

                if (title == "") {
                    $("#titlecheck").show();
                    $("#titlecheck").html("*Select your title");
                    $("#titlecheck").css({
                        "color": "red"
                    });
                    $("#title").focus();
                    return false;
                } else {
                    $("#titlecheck").hide();
                    $("#title").css({
                        "border-color": "green"
                    });
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
                    $("#namecheck").css({
                        "color": "red"
                    });
                    $("#firstname").focus();
                    return false;
                } else {
                    $("#snamecheck").hide();
                    $("#firstname").css({
                        "border-color": "green"
                    });
                }

                if (sname == "" || sname.length < 2 || sname.length >= 10) {
                    $("#snamecheck").show();
                    $("#snamecheck").html("*Enter Valid Surname");
                    $("#snamecheck").css({
                        "color": "red"
                    });
                    $("#surname").focus();
                    return false;
                } else {
                    $("#snamecheck").hide();
                    $("#surname").css({
                        "border-color": "green"
                    });
                }

                if (pnum == "" || pnum.length != 10) {
                    $("#numcheck").show();
                    $("#numcheck").html("*Enter Valid Number");
                    $("#numcheck").css({
                        "color": "red"
                    });
                    $("#mnumber").focus();
                    return false;
                } else {
                    $("#numcheck").hide();
                    $("#mnumber").css({
                        "border-color": "green"
                    })
                }

                if (email == "") {
                    $("#emailcheck").show();
                    $("#emailcheck").html("*Enter Valid Eamil");
                    $("#emailcheck").css({
                        "color": "red"
                    });
                    $("#email").focus();
                    return false;
                } else {
                    $("#emailcheck").hide();
                    $("#email").css({
                        "border-color": "green"
                    })
                }

                if (address == "" || address.length < 4 || address.length >= 30) {
                    $("#addresscheck").show();
                    $("#addresscheck").html("*Enter Valid Address");
                    $("#addresscheck").css({
                        "color": "red"
                    });
                    $("#address").focus();
                    return false;
                } else {
                    $("#addresscheck").hide();
                    $("#address").css({
                        "border-color": "green"
                    })
                }

                if (date == "") {
                    $("#datecheck").show();
                    $("#datecheck").html("*Select the Date");
                    $("#datecheck").css({
                        "color": "red"
                    });
                    $("#date").focus();
                    return false;
                } else {
                    $("#datecheck").hide();
                    $("#date").css({
                        "border-color": "green"
                    })
                }
            });
        });
    </script>

<body>
    <nav class="navbar">
        <ul>
            <h2>V O L V O</h2>
            <li class="homen"><a href="#home">Home</a></li>
            <li><a class="a" href="#model">Model</a></li>
            <li><a class="a" href="#book">Book Drive</a></li>
            <li><a class="a" href="#contact">Contact Us</a></li>
            <li><a class="a" href="View.php">View</a></li>
        </ul>
    </nav>

    <section id="home">
        <div class="main">
            <h1 class="heading">XC60 </h1>
            <p>A safe way to family around in style.</p>
        </div>
    </section>

    <section id="model">
        <div class="title">
            <h1>All Model</h1>
        </div>

        <?php
        $qry = mysqli_query($con, "select * from tbl_media");

        if ($qry) {
            while ($row = mysqli_fetch_array($qry)) {


                echo "<div class='cover'>";
                echo "<div class='box'>";
                echo "<img src='../Admin/Images/$row[1]' height=300px'>";
                echo "<h3 class='xc40text'>" . "$row[0]" . "</h3>";
                echo "</div>";
                echo "</div>";
            }
        }
        ?>
    </section>

    
    <center>
        <section id="book">
            <br>
           
            <table class="form" cellspacing="22">
                <tr>
                    <td colspan="2" style="text-align:center;"><label class="test">TEST DRIVE REQUEST</label></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2" style="font-size: 32px; text-align:center;">
                        <h1 class="auto">Volvo </h1>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;font-size: 17px;font-weight: 10;">
                        <h1 class="con">Contact Details</h1>
                    </td>
                    <td></td>
                </tr>
                <form action="" method="post">
                    <tr>
                        <td>
                            <h5>Title</h5>
                            <select id="title" name="title">
                                <option value="" selected hidden>Choose a title</option>
                                <option value="mr">Mr.</option>
                                <option value="mrs">Mrs</option>
                                <option value="miss">Miss</option>
                                <option value="ms">Ms</option>
                                <option value="dr">Dr</option>
                            </select>
                            <h5 id="titlecheck"> </h5>
                        </td>

                        <td>
                            <input type="text" name="txtcname" id="carname" placeholder=" Car Name *" required>
                            <h5 id="carcheck"> </h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="txtfname" id="firstname" placeholder=" First Name *" required>
                            <h5 id="namecheck"> </h5>
                        </td>

                        <td>
                            <input type="text" name="txtsname" id="surname" placeholder=" Surname *" required>
                            <h5 id="snamecheck"> </h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="txtmob" id="mnumber" placeholder=" Mobile Number *" required>
                            <h5 id="numcheck"> </h5>
                        </td>

                        <td>
                            <input type="email" name="txtemail" id="email" placeholder=" Eamil *" required>
                            <h5 id="emailcheck"> </h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="txtaddress" id="address" placeholder=" Address *" required>
                            <h5 id="addresscheck"> </h5>
                        </td>

                        <td>
                            <input type="date" name="txtdate" id="date" required>
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
                            <input type="submit" name="btnsubmit" Value="Submit" id="btnsub">

                        </td>
                    </tr>
                </form>
            </table><br>
    </center>
    </section>

    <section id="contact">
        <center>
            <h1 class="contacttext">Contact Us</h1>
            <table>
                <tr>
                    <td>
                        <h1 class="piplodm">Volvo Autobots</h1><br>
                        <p class="piplod">Piplod Plaza, <br>Bellow Shagun Party Plot,<br>
                            Opp Lancers Army School,<br>
                            Surat
                            395007<br>
                            Dumas Road.<br><br>
                            <i class="fa fa-phone" style="color: #000000;"></i>+91 9924615555
                        </p>
                    </td>
                    <td class="map1">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7441.593234358947!2d72.76514691978386!3d21.16049070000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04d904a6a8a81%3A0x86c58b5bda8a5c2!2sVOLVO%20AUTOBOTS!5e0!3m2!1sen!2sin!4v1693973625941!5m2!1sen!2sin" width="450" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </td>
                </tr>
            </table><br><br>
            <hr>
            <table>
                <tr>
                    <td>
                        <h1 class="interm">Volvo International</h1>
                        <p class="inter">2055, 2nd Fl,<br> Abahishek Market,<br> Ring Road, Surat,<br> Gujarat
                            395002.<br><br>
                            <i class="fa fa-phone" style="color: #000000;"></i></i>+91 9370048087
                        </p>
                    </td>
                    <td class="map2">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7440.145488518907!2d72.83603167770997!3d21.189269000000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e513aa9c71d%3A0x67ef03504a92c262!2sVolvo%20International!5e0!3m2!1sen!2sin!4v1693974434243!5m2!1sen!2sin" width="450" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </td>
                </tr>
            </table>
        </center>
    </section>

    <section id="footer">
        <div class="logof">
            <center><img src="../Images/Logo.png" alt=""></center>
        </div>
        <table>
            <tr>
                <td class="a1">
                    <h1 class="a1a">ADDRESS 1</h1>
                    <h1 class="a1m">Volvo Autobots</h1><br>
                    <p class="a1t">Piplod Plaza, <br>Bellow Shagun Party Plot,<br>
                        Opp Lancers Army School,<br>
                        Surat
                        395007<br>
                        Dumas Road.<br><br>
                        <i class="fa fa-phone" style="color: rgb(188, 188, 188);"></i>+91 9924615555
                    </p>
                </td>

                <td class="a2">
                    <h1 class="a2a">ADDRESS 2</h1>
                    <h1 class="a2m">Volvo International</h1>
                    <p class="a2t">2055, 2nd Fl,<br> Abahishek Market,<br> Ring Road, Surat,<br> Gujarat
                        395002.<br><br>
                        <i class="fa fa-phone" style="color: rgb(188, 188, 188);"></i>+91 9370048087
                    </p>
                </td>
                <td class="logo">
                    <a href="https://www.instagram.com/volvocars/?__coig_restricted=1" target="_blank"><i class="fa-brands fa-instagram" style="color: rgb(188, 188, 188) ;"></i></a>

                    <a href="https://www.youtube.com/user/VolvoCarsNews" target="_blank"><i class="fa-brands fa-youtube" style="color: rgb(188, 188, 188) ;"></i></a>

                    <a href="https://twitter.com/volvocarsin" target="_blank"><i class="fa-brands fa-x-twitter" style="color: rgb(188, 188, 188) ;"></i></a>

                    <a href="https://www.facebook.com/volvocarindia" target="_blank"><i class="fa-brands fa-facebook-f" style="color: rgb(188, 188, 188) ;"></i></a>
                </td>
            </tr>
        </table>
        </div>
        <div class="copy">
            <p>Copyright &copy; 2023 Volvo Car Corporation (or its affiliates or licensors).</p>
        </div>
    </section>
</body>

</html>