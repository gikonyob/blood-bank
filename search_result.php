<?php
include("db.php");
if(isset($_GET['q']) && $_GET['q']!="") :
$data = mysqli_real_escape_string($MySQLi_CON,$_GET['q']);
$keyword =  trim(preg_replace('/\s+/',' ',$data));
$sql=$MySQLi_CON->query("SELECT distinct * FROM `donarregister` WHERE b_id LIKE '%$keyword%' OR b_id LIKE '%$keyword%' OR b_id LIKE '%$keyword%'");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
  <meta name="description" content="">
  <title>SEARCH RESULTS</title>
  
  

  <link rel="stylesheet" href="assets/css/material.css">
  <link rel="stylesheet" href=" assets/css/tether.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/socicon.min.css">
  <link rel="stylesheet" href="assets/css/animate.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/st.css">
  <link rel="stylesheet" href="assets/css/add.css" type="text/css">
  
  
  
</head>
<body>
<section id="ext_menu-s">

    <nav class="navbar navbar-dropdown navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="index" class="navbar-logo"><img src="assets/images/logo.png" alt="Mobirise"></a>
                        <a class="navbar-caption" href="index.html">BLOODBANK</a>
                    </div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar"><li class="nav-item"><a class="nav-link link" href="index.html">HOME</a></li><li class="nav-item"><a class="nav-link link" href="user/login">LOGIN</a></li>
                      <li class="nav-item"><a class="nav-link link" href="user/register">REGISTER</a></li><li class="nav-item"><a class="nav-link link" href="camps">CAMPS</a></li><li class="nav-item"><a class="nav-link link" href="search">SEARCH</a></li><li class="nav-item"><a class="nav-link link" href="about">ABOUT</a></li><li class="nav-item"><a class="nav-link link" href="news">NEWS</a></li><li class="nav-item dropdown"><a class="nav-link link dropdown-toggle" href="#" data-toggle="dropdown-submenu" aria-expanded="false">HELP</a><div class="dropdown-menu"><a class="dropdown-item" href="contact">CONTACT US</a><a class="dropdown-item" href="faqs">FAQS</a></div></li></ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>
<section class="mbr-section mbr-after-navbar" id="msg-box3-z" style="background-color: rgb(242, 242, 242); padding-top: 120px; padding-bottom: 20px;">

    
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-2">BLOODBANK</h3>
                <div class="lead">

                    <div>
                        <form action="search_result.php" id="search_form" method="GET">
                            <select name="q" autocomplete="off" id="list_search" type="search" required value="<?=@$keyword;?>" class="form-control">
                                <option >Choose blood group below</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                            <button type="submit" style="border:0px; margin-top: 10px;  width:150px; height:36px; border-radius: 10px;  box-shadow:1px 1px 5px black; color:white; font-weight: 600; font-size:18px; background-color:#D50000;">Search</button>
                        </form>
                    </div>
                    <div>
                        <?php if(isset($sql) && count($sql) && ($sql->num_rows)) : ?>
                            <div class="reslt_bar" style="text-align: left; padding-top: 20px;">
                                <?php foreach ($sql as $key => $search_data) : ?>

                                    <table class="table table-responsive bg-table" style="border-style: none; ">
                                        <tr><td>Email</td>
                                            <td>: <?=$search_data['email'] ?></td>
                                        </tr>
                                        <tr><td>Phone No.</td>
                                            <td>: <?=$search_data['mobile'] ?></td>
                                        </tr>
                                        <tr><td>Blood Group</td>
                                            <td>: <?=$dbContent = str_ireplace($keyword,'<b>'.$keyword.'</b>',$search_data['b_id']); ?></td>
                                        </tr>
                                    </table><br>

                                <?php endforeach; ?>
                            </div>
                        <?php else :?>
                            <p style="padding-top: 20px;">Your search for blood group <b><?=@$keyword;?></b> did not match any registered donor.</p>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
            </div>
        </div>
    </div>

</section>

<section class="mbr-section mbr-section-md-padding mbr-footer footer1" id="contacts1-r" style="background-color: rgb(190, 22, 22); padding-top: 60px; padding-bottom: 30px;">
    
    <div class="container">
        <div class="row">
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <div><img src="assets/images/logo.png"></div>
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
<a href="user/request" class="text-white">Send Request</a><br><a href="user/viewrequests" class="text-white">View Request</a><br><a href="camps" class="text-white">Camps</a><br><a href="about" class="text-white">About</a><br><a href="contact" class="text-white">Contact us</a><br></p><p></p>
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


  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/tether.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/SmoothScroll.js"></script>
  <script src="assets/js/jquery.viewportchecker.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/js/jquery.touchSwipe.min.js"></script>
  <script src="assets/js/script.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('keyup','#list_search',function(){
            var value = $(this).val();
            $.getJSON('ajax_search_list.php?q='+value, function (data) {
                var availableTags = data;
                $( "#list_search" ).autocomplete({
                    source: availableTags,
                    select: function(event, ui) {
                        $(event.target).val(ui.item.value);
                        $('#search_form').submit();
                        return false;
                    },
                });
            });

        });
    });
</script>

  
  
  <input name="animation" type="hidden">
   <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon"></i></a></div>
  </body>
</html>