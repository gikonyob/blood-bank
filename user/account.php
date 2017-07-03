<?php include_once 'db.php'; include 'log.php';


if(!isset($_SESSION['userSession']))
{
  header("Location: login");
}

$query = "SELECT * FROM donarregister WHERE email='$_SESSION[userSession]'";
$account1 = mysqli_query($MySQLi_CON,$query) or die (mysqli_error());
$account = mysqli_fetch_array($account1);

if ($account['ppic']=="") {
  $msg4 = "<img src='../assets/images/profile.jpg' style='border-radius:6px; border:8px solid #fff; padding:0px;' height=150px />";
}
$MySQLi_CON->close();

?>
<!DOCTYPE html>
<html>
<head>
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
                        <a href="http://bloodbank.appslab.co.ke" class="navbar-logo"><img src="../assets/images/logo.png" alt="Bloodbank"></a>
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
                        <li class="nav-item dropdown"><a class="nav-link link dropdown-toggle" href="#" data-toggle="dropdown-submenu" aria-expanded="false">HELP</a>
                            <div class="dropdown-menu"><a class="dropdown-item" href="../contact">CONTACT US</a><a class="dropdown-item" href="../faqs">FAQS</a></div></li>
                    <li class="nav-item dropdown">
					<a class="nav-link link dropdown-toggle" href="#"
					data-toggle="dropdown-submenu" style="text-transform: uppercase;" aria-expanded="false"><?php echo $account['fname'];?></a>
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
<section class="mbr-section mbr-section-hero mbr-section-full mbr-after-navbar" id="header2-7" style="background-color: rgb(239, 239, 239);">



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
								?><img class="img-responsive img-thumbnail" src="../assets/images/<?php echo $account['ppic']; ?>" />
							<?php
						}?>
							</div>
							<div class="mbr-section-btn">
                              <a class="btn btn-primary btn-loading" style="margin-left:20px; margin-top:10px" href="uploadpicture">Edit Profile Picture</a>
							</div>

							</td></tr>
							</table>
							</div>
                        </div>
                        <div class="mbr-table-cell mbr-valign-top col-md-6">

                            <h3 class="mbr-section-title display-2"><span style="font-weight: normal;text-transform: uppercase; color:#000; text-align: left;">
                             <?php echo $account['fname'];?>&nbsp; <?php echo $account['lname'];?></span></h3>

                            <div class="mbr-section-btn">
							  <a class="btn btn-primary" href="#features7-0" style="width:200px; padding-left:-10px;"> View Profile</a>
                              <a class="btn btn-primary" href="updateprofile.php" style="width:200px; padding-left:-10px;">Update Info</a> </div>
							<div class="mbr-section-btn">
							  <a class="btn btn-primary" href="bloodrequest" style="width:200px; padding-left:-10px;">Send Request</a>
							  <a class="btn btn-primary" href="viewrequests" style="width:200px; padding-left:-10px;">View Requests</a>
							  </div>
                <div class="mbr-section-btn">
  							  <a class="btn btn-primary" href="bloodavailable" style="width:200px; padding-left:-10px;">Blood Units</a>
                </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="mbr-arrow mbr-arrow-floating hidden-sm-down" aria-hidden="true"><a href="#features7-0"><i class="mbr-arrow-icon"></i></a></div>

</section>

<section class="mbr-cards mbr-section mbr-section-nopadding" id="features7-0" style="background-color: rgb(239, 239, 239);">



    <div class="mbr-cards-row row">
        <div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 20px; padding-bottom: 20px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img iconbox"><a href="#" class="etl-icon icon-lightbulb mbr-iconfont mbr-iconfont-features7" style="color: rgb(255, 255, 255);"></a></div>
                    <div class="card-block">
                        <h4 class="card-title">Personal Info</h4>


                        <p class="card-text"><strong>Name:</strong>  <?php echo $account['fname'];?> &nbsp; <?php echo $account['lname'];?> <br><br>

						<strong>Email:</strong>  <?php echo $account['email'];?><br><br>
                        <strong>Phone No:</strong>  <?php echo $account['mobile'];?><br><br>
                        <strong>County:</strong>  <?php echo $account['county'];?>&nbsp;<br><br>
                        <strong>Age:</strong> <?php $year=date('Y'); $age= $year- $account['year'];  echo $age; ?> Years</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 20px; padding-bottom: 20px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img iconbox"><a href="#" class="etl-icon icon-clock mbr-iconfont mbr-iconfont-features7" style="color: rgb(255, 255, 255);"></a></div>
                    <div class="card-block">
                        <h4 class="card-title">Status Record</h4>

                        <p class="card-text">

                            <strong>Blood Group:</strong>  <?php echo $account['b_id'];?><br><br>
						<strong>Last Donation Date:</strong><?php echo $account['last_donation_date'];?><br><br>
						<strong>Next Time Possible Donation:</strong>After 4 Months<br><br>
						<strong>Number of Donations:</strong><?php echo $account['number_of_donations'];?><br><br>
						<strong>Last Donation Camp:</strong><?php echo $account['last_donation_camp'];?><br><br>

						</p>

                    </div>
                </div>
          </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 20px; padding-bottom: 20px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img iconbox"><a href="#" class="etl-icon icon-shield mbr-iconfont mbr-iconfont-features7" style="color: rgb(255, 255, 255);"></a></div>
                    <div class="card-block">
                        <h4 class="card-title">Current Requests</h4>

                        <p class="card-text"><strong>Existing Request:</strong> Bloood Group B+<br><br><strong>Respond to Request:</strong> Otieno Sam/N/A<br><br><strong>Confirmation By Doctor:</strong> Pending<br><br><strong>Date Responded:</strong> 22/3/2014<br><br><strong>Date Confirmed:</strong> 22/12/2013</p>

                    </div>
                </div>
            </div>
        </div>



    </div>
</section>

<section class="mbr-section mbr-section-md-padding mbr-footer footer1" id="contacts1-1" style="background-color: rgb(190, 22, 22); padding-top: 20px; padding-bottom: 20px;">

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
<a href="../user/viewrequest" class="text-white">View Requests</a><br><a href="../camps" class="text-white">Camps</a><br><a href="../about" class="text-white">About</a><br><a href="../contact" class="text-white">Contact us</a><br></p><p></p>
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
