<?php
include_once 'db.php';
include 'log.php';


if(!isset($_SESSION['userSessionDoctor']))
{
  header("Location: index");
}

$query = "SELECT * FROM doctorregister WHERE email='$_SESSION[userSessionDoctor]'";
$account1 = mysqli_query($MySQLi_CON,$query) or die (mysqli_error());
$account = mysqli_fetch_array($account1);

$MySQLi_CON->close();
if ($account['ppic']=="") {
	$msg4 = "<img src='../assets/images/profile.jpg' style='border-radius:6px; border:8px solid #fff; padding:0px;' height=150px />";
}//else {
	//$msg4 = "";
//}

?>
<!DOCTYPE html>
<html>
<head>
  <!-- Site made with Mobirise Website Builder v3.8.3, # -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Bloodbank">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../assets/images/logo.png" type="image/x-icon">
  <meta name="description" content="">
  <title>Account</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="../assets/et-line-font-plugin/style.css">
    <link rel="stylesheet" href="../assets/css/material.css">
  <link rel="stylesheet" href="../assets/css/tether.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/socicon.min.css">
  <link rel="stylesheet" href="../assets/css/animate.min.css">
  <link rel="stylesheet" href="../assets/dropdown/css/style.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/add.css" type="text/css">


</head>
<body>
<section id="ext_menu-s">

    <nav class="navbar navbar-dropdown navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="index" class="navbar-logo"><img src="../assets/images/logo.png" alt="Bloodbank Logo"></a>
                        <a class="navbar-caption" href="../index">BLOODBANK</a>
                    </div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                    <li class="nav-item"><a class="nav-link link" href="../index">HOME</a></li>
                    <li class="nav-item"><a class="nav-link link" href="account">ACCOUNT</a></li>
                    <li class="nav-item"><a class="nav-link link" href="../camps">CAMPS</a></li>
                    <li class="nav-item"><a class="nav-link link" href="../search">SEARCH</a></li>
                    <li class="nav-item"><a class="nav-link link" href="../about">ABOUT</a></li>
                        <li class="nav-item dropdown">
    					<a class="nav-link link dropdown-toggle" href="#"
    					data-toggle="dropdown-submenu" style="text-transform: uppercase;" aria-expanded="false"><?php echo $account['lname'];?></a>
    					<div class="dropdown-menu"><a class="dropdown-item" href="logout.php">LOGOUT</a>
    					<a class="dropdown-item" href="change-password">CHANGE PASSWORD</a></div>
    					</li>
                    </ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>

<section class="engine"><a rel="external" href="#">simple wysiwyg web design</a></section><section class="mbr-section mbr-section-hero mbr-section-full mbr-after-navbar" id="header2-7" style="background-color: rgb(239, 239, 239);">



    <div class="mbr-table mbr-table-full">
        <div class="mbr-table-cell">

            <div class="container">
                <div class="mbr-section row">
                    <div class="mbr-table-md-up">

                        <div class="mbr-table-cell mbr-left-padding-md-up col-md-6 text-xs-center text-md-left">

							<div class="mbr-figure col-lg-6">
							<table>
							<tr>
							<td  align="right">&nbsp;</td>
							<td>
							 <div class="user-img-div">
                             <?php
							if(isset($msg4)){
								echo $msg4;
							} else {
								?><img class="img-thumbnail" src="../assets/images/<?php echo $account['ppic']; ?>"  />
							<?php
						}?>
							</div>
							<div class="mbr-section-btn">
                              <a class="btn btn-primary" style="margin-left:20px; margin-top:10px" href="uploadpicture.php">Edit Profile Picture</a>
							</div>

							</td></tr>
							</table>
							</div>
                        </div>
                        <div class="mbr-table-cell mbr-valign-top col-md-6">

                           <h3 class="mbr-section-title display-2"><span style="font-weight: normal;text-transform: uppercase; color:#000; text-align: left;">
                            <b><?php echo $account['fname'];?>&nbsp; <?php echo $account['lname'];?></span></b></h3>

                            <div class="mbr-section-text lead" style=" color:#000; text-align: left;" ">
                                <p><strong>Email:</strong>  <?php echo $account['email'];?><br><strong>
                                </p>
                            </div>

                            <div class="mbr-section-btn"><a class="btn btn-primary" href="viewusers">Manage Users</a> <a class="btn btn-primary" href="member.php">Search User</a>    </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="mbr-arrow mbr-arrow-floating hidden-sm-down" aria-hidden="true"><a href="#features7-0"><i class="mbr-arrow-icon"></i></a></div>

</section>


</section>

<section class="mbr-section mbr-section-md-padding mbr-footer footer1" id="contacts1-1" style="background-color: rgb(190, 22, 22); padding-top: 60px; padding-bottom: 30px;">

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

        </div>
    </div>
</section>

<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-2" style="background-color: rgb(190, 22, 22); padding-top: 1.75rem; padding-bottom: 1.75rem;">

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

  <input name="animation" type="hidden">
   <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon"></i></a></div>
  </body>
</html>
