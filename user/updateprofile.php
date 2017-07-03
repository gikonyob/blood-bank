<?php

include_once 'db.php';
include 'log.php';

	if(!isset($_SESSION['userSession']))
{
	header("Location: account");
}

$query = "SELECT * FROM donarregister WHERE email='$_SESSION[userSession]'";
$account1 = mysqli_query($MySQLi_CON,$query) or die (mysqli_error());
$account = mysqli_fetch_array($account1);


if(isset($_POST['btn-update']))
{
	$fname = $MySQLi_CON->real_escape_string(trim($_POST['fname']));
	$lname = $MySQLi_CON->real_escape_string(trim($_POST['lname']));
	$mobile = $MySQLi_CON->real_escape_string(trim($_POST['mobile']));
	$email = $MySQLi_CON->real_escape_string(trim($_POST['email']));
	$county = $MySQLi_CON->real_escape_string(trim($_POST['county']));
	
	$query2 = $MySQLi_CON->query("SELECT  fname,lname,mobile,email,county FROM donarregister WHERE email='$_SESSION[userSession]'");
	$row=$query2->fetch_array();

	$updateQuery1 = "UPDATE donarregister SET fname='$fname', lname='$lname', mobile='$mobile', email='$email', county='$county' WHERE email='$_SESSION[userSession]'";
		mysqli_query($MySQLi_CON,$updateQuery1);

		if($MySQLi_CON->query($updateQuery1)){
				$successMSG =  "<div class='alert bg-succeed'>
					<button class='close' data-dismiss='alert'>&times;</button>
					Profile Updated Successfully
			  	</div>";
				header("refresh:3;account"); // redirects image view page after 5 seconds.
			}else{
				$errorMSG = "<div class='alert bg-info'>
						<button class='close' data-dismiss='alert'>&times;</button> An error occured while updating, Please try again
					</div>";
			
			}



}
$MySQLi_CON->close();


if ($account['ppic']=="") {
	$msg4 = "<img src='../assets/images/profile.jpg' style='border-radius:6px; border:8px solid #fff; padding:0px;' />";
}//else {
	//$msg4 = "";
//}



?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../assets/images/logo.png" type="image/x-icon">
  <meta name="description" content="">
  <title>Update Profile</title>
  
  

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
                        <a class="navbar-caption" href="index.html">BLOODBANK</a>
                    </div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
					<li class="nav-item"><a class="nav-link link" href="../index">HOME</a></li>
					<li class="nav-item"><a class="nav-link link" href="account">ACCOUNT</a></li>
                      
					  <li class="nav-item"><a class="nav-link link" href="../camps.html">CAMPS</a></li>
					  <li class="nav-item"><a class="nav-link link" href="../search.html">SEARCH</a></li>
					  <li class="nav-item"><a class="nav-link link" href="../about.html">ABOUT</a></li>
					  <li class="nav-item"><a class="nav-link link" href="logout">LOGOUT</a></li>
					  <li class="nav-item dropdown"><a class="nav-link link dropdown-toggle" href="#" data-toggle="dropdown-submenu" aria-expanded="false">HELP</a><div class="dropdown-menu"><a class="dropdown-item" href="../contact.html">CONTACT US</a><a class="dropdown-item" href="../faqs.html">FAQS</a></div></li></ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>

<section class="engine"><a rel="external" href="index">best offline web page maker</a></section><section class="mbr-section mbr-after-navbar" id="msg-box3-z" style="background-color: rgb(242, 242, 242); padding-top: 120px; padding-bottom: 120px;">

    
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-2">Update Profile</h3>
                <div class="lead">
                   <?php
					if(isset($successMSG)){
							?>
				            <div >
				            	<?php echo $successMSG; ?>
				            </div>
				            <?php
					}
					?>
					
				    <?php
					if(isset($errorMSG)){
							?>
				            <div >
				            	<?php echo $errorMSG; ?>
				            </div>
				            <?php
					}
					?>

                      <form method="post">
                       <table cellpadding="0" cellspacing="0" width="100%"  class="tableborder" style="margin:auto" >
                      <tr>
                        <td class="lefttd">First Name</td>
                        <td>: <input class="text-input" type="text" name="fname" required="required" value="<?php echo $account['fname']; ?>" /></td>
                      </tr>
            <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
     <tr>
                        <td class="lefttd">Last Name</td>
                        <td>: <input class="text-input" type="text" name="lname" required="required" value="<?php echo $account['lname']; ?>" /></td>
                      </tr>
            <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
     <tr>
                        <td class="lefttd">Email</td>
                        <td>: <input class="text-input" type="email" name="email" required="required" value="<?php echo $account['email']; ?>" /></td>
                      </tr>
            <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
     <tr>
                        <td class="lefttd">Mobile</td>
                        <td>: <input class="text-input" type="text" name="mobile" required="required" value="<?php echo $account['mobile']; ?>" /></td>
                      </tr>
            <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	<tr>
                        <td class="lefttd">County</td>
                        <td>: <input class="text-input" type="text" name="county" required="required" value="<?php echo $account['county']; ?>" /></td>
                      </tr>
            <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
                      
                <tr><td>&nbsp;</td><td><input type="submit" value="Update Profile"   name="btn-update" 
        style="border:0px; border-radius: 10px;  width:150px; height:40px;  box-shadow:1px 1px 5px black; color:white;
        font-weight:bold; font-size:14px; background-color:#D50000;  "/></td></tr>
                <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
        </table>
                </form>
                  



                </div>
                
            </div>
        </div>
    </div>

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
<a href="request" class="text-white">Send Request</a><br><a href="viewrequest" class="text-white">View Request</a><br><a href="../camps" class="text-white">Camps</a><br><a href="../about" class="text-white">About</a><br><a href="../contact" class="text-white">Contact us</a><br></p><p></p>
            </div>

        </div>
    
</section>

<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-9" style="background-color: rgb(190, 22, 22); padding-top: 1.75rem; padding-bottom: 1.75rem;">
    
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