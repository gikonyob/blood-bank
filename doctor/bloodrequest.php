<?php
include_once 'db.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/images/logo.png" type="image/x-icon">
    <meta name="description" content="">
    <title>Blood Request</title>
    <link rel="stylesheet" href="../assets/css/material.css">
    <link rel="stylesheet" href="../assets/css/tether.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/socicon.min.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link rel="stylesheet" href="../assets/dropdown/css/style.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/add.css" type="text/css">
    <style type="text/css">
        #chart-container{
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<section id="ext_menu-s">

    <nav class="navbar navbar-dropdown navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="../index" class="navbar-logo"><img src="../assets/images/logo.png" alt="Bloodbank"></a>
                        <a class="navbar-caption" href="../index.html">BLOODBANK</a>
                    </div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                        <li class="nav-item"><a class="nav-link link" href="../index">HOME</a></li>
                        <li class="nav-item"><a class="nav-link link" href="account">ACCOUNT</a></li>
                        <li class="nav-item"><a class="nav-link link" href="../camps">CAMPS</a></li><li class="nav-item"><a class="nav-link link" href="../search">SEARCH</a></li>
                        <li class="nav-item"><a class="nav-link link" href="../about">ABOUT</a></li>
                        <li class="nav-item"><a class="nav-link link" href="../news">NEWS</a></li>
                    </ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>
<section class="mbr-section mbr-after-navbar" id="msg-box3-v" style="background-color: #dddddd; padding-top: 85px; padding-bottom: 10px;">

    <div class="container">

        <div class="blog-header">
            <h3 class="text-lg-center">Available Blood Units</h3>
        </div>

        <div class="row">

            <div class="col-sm-8 blog-main">

                <div id="chart-container">
                    <canvas id="mycanvas"></canvas>
                </div>


            </div><!-- /.blog-main -->

            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                <?php

                include_once 'db.php';
                include 'log.php';


                $query = "SELECT * FROM donarregister WHERE  id = '$_REQUEST[id]'";
                $account1 = mysqli_query($MySQLi_CON,$query) or die (mysqli_error());
                $account = mysqli_fetch_array($account1);
               

                if(isset($_POST['btn-request'])) {
                    $fname = $MySQLi_CON->real_escape_string(trim($_POST['fname']));
                    $lname = $MySQLi_CON->real_escape_string(trim($_POST['lname']));
                    $mobile = $MySQLi_CON->real_escape_string(trim($_POST['mobile']));
                    $email = $MySQLi_CON->real_escape_string(trim($_POST['email']));
                    $b_id = $MySQLi_CON->real_escape_string(trim($_POST['b_id']));
                    $reqdate = $MySQLi_CON->real_escape_string(trim($_POST['reqdate']));
                    $status = $MySQLi_CON->real_escape_string(trim($_POST['status']));
                    $units = $MySQLi_CON->real_escape_string(trim($_POST['units']));


                    $check_email = $MySQLi_CON->query("SELECT email FROM requests WHERE email='$email'");
                    $count = $check_email->num_rows;


                    if ($count == 0) {
                        $updateQuery1 = "INSERT INTO requests (fname,lname,email,mobile,b_id,reqdate,status,units)
	VALUES('$fname','$lname','$email','$mobile','$b_id','$reqdate','$status','$units')";

                        if ($MySQLi_CON->query($updateQuery1)) {
                            $msg1 = "<div class='alert bg-succeed'>
					<button class='close' data-dismiss='alert'>&times;</button>
					Request Sent Successfully please wait a few seconds to be redirected to your Account
			  	</div>";
                            header("refresh:8;member.php");
                        } else {
                            $msg1 = "<div class='alert bg-info'>
						<button class='close' data-dismiss='alert'>&times;</button> An Error occured while requesting. Please try again!!!
					</div>";
                        }
                    } else {


                        $msg1 = "<div class='alert bg-info'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong> you had requested earlier
			  </div>
			  ";

                    }

                }

                $MySQLi_CON->close();
                ?>


                <h3 class="mbr-section-title display-2"></h3>
                <div class="lead">
                    <?php
                    if(isset($msg1)){
                        echo $msg1;
                    }

                    ?>

                    <form method="post">
                        <table cellpadding="0" cellspacing="0" width="100%"  class="tableborder" style="margin:auto" >

                            <tr>
                                <td><input class="text-input"  type="hidden" name="fname" required="required" readonly value="<?php echo $account['fname']; ?>" /></td>
                            </tr>
                            <tr>
                                <td><input class="text-input" type="hidden"  name="lname"  value="<?php echo $account['lname']; ?>" readonly /></td>
                            </tr>
                            <tr>
                                <td><input class="text-input" type="hidden" name="email"  value="<?php echo $account['email']; ?>" readonly /></td>
                            </tr>
                            <tr>
                                <td><input class="text-input" type="hidden" name="mobile" required="required" value="<?php echo $account['mobile']; ?>" readonly /></td>
                            </tr>
                            <tr>
                                <td class="lefttd">Blood Group</td>
                            </tr>
                            <tr>
                                <td><input class="text-input" type="text" name="b_id" style="background-color: darkgray; color: red;"  value="<?php echo $account['b_id']; ?>" readonly /></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr><td class="lefttd">Till Required Date</td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="text-input"  name="reqdate" style="background-color: darkgray; color: red;" value="<?php echo date('Y/m/d', strtotime('+7 days')); ?>" readonly />
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="lefttd">Units Requesting</td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="units" required="required" style="color: red;" class="text-input">
                                        <option selected="selected" value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><input class="text-input" type="hidden" name="status" required="required" value="Waiting" readonly /></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>

                            <tr><td>&nbsp;</td><td><input type="submit" value="Send Request"   name="btn-request"
                                                          style="border:0px; border-radius: 10px;  width:150px; height:40px; margin-left: -230px;  box-shadow:1px 1px 5px black; color:white;
        font-weight:bold; font-size:14px; background-color:#D50000;  "/></td></tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </form>




                </div>

            </div><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </div><!-- /.container -->

</section>

<section class="mbr-section mbr-section-md-padding mbr-footer footer1" id="contacts1-r" style="background-color: rgb(190, 22, 22); padding-top: 60px; padding-bottom: 30px;">

    <div class="container">
        <div class="row">
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <div><img src="../assets/images/logo.png"></div>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p><strong>Address</strong><br>30300<br>Moi University, Eldoret</p>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p><strong>Contacts</strong><br>
                    Email: support@bloodbank.appslab.co.ke<br>
                    Phone: +245 710 301 320<br></p>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p></p><p><strong>Links</strong><br>
                    <a href="../user/viewrequests" class="text-white">View Request</a><br><a href="../camps" class="text-white">Camps</a><br><a href="../about" class="text-white">About</a><br><a href="../contact" class="text-white">Contact us</a></p><p></p>

        </div>

</section>

<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-5" style="background-color: rgb(190, 22, 22); padding-top: 1.75rem; padding-bottom: 1.75rem;">

    <div class="container">
        <p class="text-xs-center">&copy; <?php 
$copyYear = 2016; 
$curYear = date('Y'); 
echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : '');
?> | <a class="text-white" href="bloodbank.appslab.co.ke">BLOODBANK</a></p>
    </div>
    </div>
</footer>


<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/tether.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/SmoothScroll.js"></script>
<script src="../assets/js/jquery.viewportchecker.js"></script>
<script src="../assets/dropdown/js/script.min.js"></script>
<script src="../assets/js/jquery.touchSwipe.min.js"></script>
<script src="../assets/js/script.js"></script>
<script type="text/javascript" src="../assets/js/Chart.min.js"></script>
<script type="text/javascript" src="../assets/js/units.js">   </script>

<input name="animation" type="hidden">
<div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon"></i></a></div>
</body>
</html>
