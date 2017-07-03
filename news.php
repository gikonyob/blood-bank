<?php
include_once 'db.php';
?>
<?php
/* Pagination is a technique to divide content into several pages.
 Here we can assign each page a separate URL. By Clicking that URL or Page Number,
 user can view this Page. For every page we assign a incremental
 Page number */



$start=0;
$limit=2;
// limit=1,2;
// limit=2,2;

$t=mysqli_query($MySQLi_CON,"select * from bloodnews ORDER BY posttime  DESC ");
$total=mysqli_num_rows($t);



if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $start=($id-1)*$limit;
    //$start=2*1;
    //$start=2;
}
else
{
    $id=1;
}
$page=ceil($total/$limit);

$query=mysqli_query($MySQLi_CON,"select * from bloodnews ORDER BY posttime DESC limit $start,$limit");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <meta name="description" content="">
    <title>News</title>
    <link rel="stylesheet" href="assets/css/material.css">
    <link rel="stylesheet" href="assets/css/tether.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/socicon.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/css/style.css">
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

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                        <li class="nav-item"><a class="nav-link link" href="index">HOME</a></li>
                        <li class="nav-item"><a class="nav-link link" href="user/login">LOGIN</a></li>
                        <li class="nav-item"><a class="nav-link link" href="user/register">REGISTER</a></li>
                        <li class="nav-item"><a class="nav-link link" href="camps">CAMPS</a></li><li class="nav-item"><a class="nav-link link" href="search">SEARCH</a></li>
                        <li class="nav-item"><a class="nav-link link" href="about">ABOUT</a></li>
                        <li class="nav-item"><a class="nav-link link" href="news">NEWS</a></li>
                    </ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>
<section class="mbr-section mbr-after-navbar" id="msg-box3-v" style="background-color: #dddddd; padding-top: 60px; padding-bottom: 10px;">

    <div class="container">

        <div class="blog-header">
            <h1 class="blog-title text-lg-center">The Bloodbank Blog </h1>
            <p class="lead blog-description text-lg-center" >The official blog of Bloodbank.</p>
        </div>

        <div class="row">

            <div class="col-sm-8 blog-main">

                <div class="blog-post">
                    <form method="post" name="frm">
                        <table class='table table-bordered ' style="border-style: none; ">

                            <?php
                            $res = $MySQLi_CON->query("SELECT * FROM bloodnews ORDER BY posttime DESC ");
                            $count2 = $res->num_rows;

                            if($count2 > 0)
                            {
                                while ($ft = mysqli_fetch_array($query))
                                {
                                    ?>
                                    <tr >
                                        <td style="border-style: none;">
                                            <span><h2 class="blog-post-title"><?= $ft['1'] ?></h2></span>
                                            <p class="blog-post-meta">Written by <a href="#" class="a-red"> <?= $ft['2'] ?> </a> on <span style="font-style: oblique;"><?= $ft['3'] ?></span></p>
                                            <span style="padding-left: 30px;"><img class="img-responsive" src="assets/images/news/<?= $ft['4'] ?>" style="width: auto; height: 220px;"/></span><br>
                                            <span style="font-style: oblique; padding-left: 40px; text-align: center;" ><?= $ft['5'] ?> </span><br>
                                            <?= $ft['6'] ?> <div class="collapse" id="news<?= $ft['0'] ?>">
                                                <?= $ft['7'] ?></div>
                                            <script type="text/javascript">
                                                function changeText(id){
                                                    if(id.innerHTML == "Read More"){
                                                        id.innerHTML = "Read Less";
                                                    }else{
                                                        id.innerHTML = "Read More";
                                                    }
                                                }
                                            </script>
                                            <a class="a-red" data-toggle="collapse"  href="#news<?= $ft['0'] ?>" onclick="changeText(this)">Read More</a>
                                            <hr>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }


                            else
                            {
                                ?>
                                <tr>
                                    <td colspan="3" style="border-style: none;" > No Records Found ...</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        <ul style="list-style-type: none; overflow: hidden; background-color: rgb(190, 22, 22)">
                            <?php if($id > 1) {?> <li style="float: left;"><a href="?id=<?php echo ($id-1) ?>" style="display: block; color: #94ada8; text-align: center; padding: 14px 16px;">Previous</a></li><?php }?>
                            <?php
                            for($i=1;$i <= $page;$i++){
                                ?>
                                <li style="float: left;"><a href="?id=<?php echo $i ?>" style="display: block; color: #94ada8; text-align: center; padding: 14px 16px;"><?php echo $i;?></a></li>
                                <?php
                            }
                            ?>
                            <?php if($id!=$page)
                                //3!=4
                            {?>
                                <li style="float: left;"><a href="?id=<?php echo ($id+1); ?>" style="display: block; color: #94ada8; text-align: center; padding: 14px 16px;">Next</a></li>
                            <?php }?>
                        </ul>
                    </form>


                </div><!-- /.blog-post -->


            </div><!-- /.blog-main -->

            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                <div class="sidebar-module sidebar-module-inset">
                    <h4>About</h4>
                    <p>Blood is universally recognized as the most precious element that sustains life. It saves innumerable lives across the world in a variety of conditions.
                        The need for blood is great - on any given day, approximately 39,000 units of Red Blood Cells are needed. More than 29 million units of blood components
                        are transfused every year. Donate Blood Despite the increase in the number of donors, blood remains in short supply during emergencies, mainly
                        attributed to the lack of information and accessibility. We positively believe this tool can overcome most of these challenges by effectively
                        connecting the blood donors with the blood recipients.</p>
                </div>
                <div class="sidebar-module">
                    <h4>Archives</h4>
                    <ol class="list-unstyled">
                        <li><a href="#" class="a-red">December 2017</a></li>
                        <li><a href="#" class="a-red">January 2017</a></li>
                        <li><a href="#" class="a-red">February 2017</a></li>
                        <li><a href="#" class="a-red">March 2017</a></li>
                        <li><a href="#" class="a-red">April 2017</a></li>
                    </ol>
                </div>
                <div class="sidebar-module">
                    <h4>Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="#" class="a-red">GitHub</a></li>
                        <li><a href="#" class="a-red">Twitter</a></li>
                        <li><a href="#" class="a-red">Facebook</a></li>
                        <li><a href="#" class="a-red">Telegram</a></li>
                        <li><a href="#" class="a-red">Linkedin</a></li>
                        <li><a href="#" class="a-red">Pininterest</a></li>
                        <li><a href="#" class="a-red">BitBucket</a></li>
                    </ol>
                </div>
            </div><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </div><!-- /.container -->

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
                    <a href="user/request" class="text-white">Send Request</a><br><a href="user/viewrequests" class="text-white">View Request</a><br><a href="camps" class="text-white">Camps</a><br><a href="about" class="text-white">About</a><br><a href="contact" class="text-white">Contact us</a></p><p></p>
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


<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/tether.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/SmoothScroll.js"></script>
<script src="assets/js/jquery.viewportchecker.js"></script>
<script src="assets/dropdown/js/script.min.js"></script>
<script src="assets/js/jquery.touchSwipe.min.js"></script>
<script src="assets/js/script.js"></script>
<input name="animation" type="hidden">
<div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon"></i></a></div>
</body>
</html>