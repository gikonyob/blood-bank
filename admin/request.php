<?php
	require_once 'session.php';
	require_once 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../assets/images/logo.png" type="image/x-icon">
  <meta name="description" content="">
  <title>Manage Requests</title>
  <link rel="stylesheet" href="../assets/css/material.css">
  <link rel="stylesheet" href="../assets/css/tether.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/socicon.min.css">
  <link rel="stylesheet" href="../assets/css/animate.min.css">
  <link rel="stylesheet" href="../assets/dropdown/css/style.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/add.css" type="text/css">
		<link rel = "stylesheet" type = "text/css" href = "../inc/css/jquery.dataTables.css" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
</head>
<body>
<section id="ext_menu-s">

    <nav class="navbar navbar-dropdown navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="index" class="navbar-logo"><img src="../assets/images/logo.png" alt="Bloodbank Logo"></a>
                        <a class="navbar-caption" href="../index.html">BLOODBANK</a>
                    </div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
					             <li class="nav-item"><a class="nav-link link" href="../index.html">HOME</a></li>
                       <li class="nav-item"><a class="nav-link link" href="account.php">ACCOUNT</a></li>
					             <li class="nav-item"><a class="nav-link link" href="../camps">CAMPS</a></li>
                       <li class="nav-item"><a class="nav-link link" href="../search">SEARCH</a></li>
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
<section class="mbr-section mbr-after-navbar" id="msg-box3-v" style="background-color: rgb(242, 242, 242); padding-top: 120px; padding-bottom: 120px;">

<div class = "container-fluid">
		
		<div class = "col-md-12 well">
			<div class="mbr-section-btn"><a class="btn btn-primary" href="#">Add Request</a></div>
			<br/>
			<br/>
			<div class = "alert bg-table">
				<table id = "table" class = "table-bordered table-responsive">
					<thead>
						<tr>
							<th>Name</th>
							<th>Blood Group</th>
                            <th>Pints Required</th>
                            <th>Last Required Date</th>
                            <th>Pints Awarded</th>
                            <th>Awarded Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $MySQLi_CON->query("SELECT * FROM `requests`");
							//$query = $MySQLi_CON->query("SELECT * FROM `donarregister`");
							while($f_query = $query->fetch_array()){
						?>
						<tr>
							<td><?php echo $f_query['fname']?> <?php echo $f_query['lname']?></td>
							<td><?php echo $f_query['b_id']?></td>
							<td><?php echo $f_query['units']?></td>
                            <td><?php echo $f_query['reqdate']?></td>
                            <td><?php echo $f_query['issuedunits']?></td>
                            <td><?php echo $f_query['issueddate']?></td>
							<td><center><a href = "request_edit.php?id=<?php echo $f_query['id']?>" class = "btn bg-warning"><span class = "glyphicon glyphicon-edit"></span>Update </a> |<a  href = "delete_request.php?id=<?php echo $f_query['id']?>" class="btn btn-primary"><span class = "glyphicon glyphicon-trash"></span>Delete</a></center></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
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
<a href="../user/request" class="text-white">Send Request</a><br><a href="../user/viewrequest" class="text-white">View Request</a><br><a href="camps" class="text-white">Camps</a><br><a href="about" class="text-white">About</a><br><a href="contact" class="text-white">Contact us</a><br></p><p></p>
            </div>

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
  
  <script src="../assets/js/SmoothScroll.js"></script>
  <script src="../assets/js/jquery.viewportchecker.js"></script>
  <script src="../assets/dropdown/js/script.min.js"></script>
  <script src="../assets/js/jquery.touchSwipe.min.js"></script>
<script src = "../inc/js/jquery-3.1.1.js"></script>
<script src = "../inc/js/bootstrap.js"></script>
<script src = "../inc/js/script.js"></script>
<script src = "../inc/js/jquery.dataTables.min.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	})
</script>
  
  
  <input name="animation" type="hidden">
   <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon"></i></a></div>
  </body>
</html>