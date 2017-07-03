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

$t=mysqli_query($MySQLi_CON,"select * from bloodnews");
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

$query=mysqli_query($MySQLi_CON,"select * from bloodnews limit $start,$limit");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/images/logo.png" type="image/x-icon">
    <meta name="description" content="">
    <title>Manage News</title>



    <link rel="stylesheet" href="../assets/css/material.css">
    <link rel="stylesheet" href="../assets/css/tether.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/socicon.min.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link rel="stylesheet" href="../assets/dropdown/css/style.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/add.css" type="text/css">
    <script src="jquery.js" type="text/javascript"></script>
    <script src="js-script.js" type="text/javascript"></script>



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
                        <li class="nav-item"><a class="nav-link link" href="../camps">CAMPS</a></li><li class="nav-item"><a class="nav-link link" href="../search">SEARCH</a></li><li class="nav-item"><a class="nav-link link" href="../about">ABOUT</a></li></ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>
    <section class="mbr-cards mbr-section mbr-section-nopadding" id="msg-box3-v" style="background-color: #94ada8; padding-top: 10px; padding-bottom: 10px;">
    <div class="mbr-cards-row row">
        <div class="mbr-cards-col col-lg-6"  >

    <div class="container">
        <div style="padding-top: 60px;" >
        <form method="post" name="frm">
            <table class='table table-bordered ' style="border-style: none; ">

                <?php
                $res = $MySQLi_CON->query("SELECT * FROM bloodnews");
                $count = $res->num_rows;
                if($count > 0) {
                    while ($ft = mysqli_fetch_array($query)) {
                        ?>
                        <tr >
                            <td style="border-style: none;">
                                <span><input type="checkbox" name="chk[]" class="chk-box" value="<?= $ft['0'] ?>"/>
                                    <h3  style="padding-left: 40px;"><?= $ft['1'] ?></h3></span>
                                <span style="padding-left: 30px;">Written by <span style="color: red;"><?= $ft['2'] ?></span> on <span style="font-style: oblique; color: red;"><?= $ft['3'] ?></span></span><br>
                                <span style="padding-left: 30px;"><img src="../assets/images/news/<?= $ft['4'] ?>" style="width: auto; height: 220px;"/></span><br>
                                <span style="font-style: oblique; padding-left: 40px; text-align: center;" ><?= $ft['5'] ?> </span><br>
                                <?= $ft['6'] ?> <div id="news" class="collapse">
                                    <?= $ft['7'] ?></div>
                                <a style="color: red;" data-toggle="collapse" data-target="#news">Read More</a>
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
                <?php

                if($count > 0)
                {
                    ?>
                    <tr>
                        <td colspan="3" style="border-style: none;">
                            <label><input type="checkbox" class="select-all" /> Check / Uncheck All</label>


                            <label style="margin-left:100px;">
                                <span style="word-spacing:normal;"> with selected :</span>
                                <button type="button" class="btn-primary" style="border-radius: 8px;" onClick="delete_news();">Delete News</button>
                            </label>


                        </td>
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
    </div>
    </div>
        </div>
        <div class="text-xl-left  col-lg-6" style="padding-top: 20px;" >
        <div >
            <h3  style="padding-left: 40px; display: table; ">Current and upcoming camp details</h3></span>
                    <form method="post" name="frm">
                        <table class='table table-bordered ' style="width: 100%; min-height: .01%; overflow-x: auto; margin-left: 20px; display: table;">
                            <tr>
                                <th>Camp Name</th>
                                <th>Camp Location</th>
                                <th>Camp Organizer</th>
                                <th>Opening Date</th>
                                <th>Closing Date</th>

                            </tr>
                            <?php
                            include_once 'db.php';
                            ?>
                            <?php
                            /* Pagination is a technique to divide content into several pages.
                             Here we can assign each page a separate URL. By Clicking that URL or Page Number,
                             user can view this Page. For every page we assign a incremental
                             Page number */
                            $startc=0;
                            $limitc=8;
                            // limit=1,2;
                            // limit=2,2;

                            $tc=mysqli_query($MySQLi_CON,"select * from camps");
                            $totalc=mysqli_num_rows($tc);



                            if(isset($_GET['idc']))
                            {
                                $idc=$_GET['idc'];
                                $startc=($idc-1)*$limitc;
                                //$start=2*1;
                                //$start=2;
                            }
                            else
                            {
                                $idc=1;
                            }
                            $pagec=ceil($totalc/$limitc);

                            $queryc=mysqli_query($MySQLi_CON,"select * from camps limit $startc,$limitc");
                            ?>


                            <?php
                            $resc = $MySQLi_CON->query("SELECT * FROM camps");
                            $countc = $resc->num_rows;
                            if($countc > 0) {
                                while ($ftc = mysqli_fetch_array($queryc)) {
                                    ?>
                                    <tr class="bg-table">
                                        <td><?= $ftc['1'] ?></td>
                                        <td><?= $ftc['2'] ?></td>
                                        <td><?= $ftc['3'] ?></td>
                                        <td><?= $ftc['4'] ?></td>
                                        <td><?= $ftc['5'] ?></td>
                                    </tr>
                                    <?php
                                }
                            }


                            else
                            {
                                ?>
                                <tr>
                                    <td colspan="3"> No Records Found ...</td>
                                </tr>
                                <?php
                            }
                            ?>

                        </table>

                    </form>
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
                    <a href="../user/viewrequests" class="text-white">View Requests</a><br><a href="../camps" class="text-white">Camps</a><br><a href="../about" class="text-white">About</a><br><a href="../contact" class="text-white">Contact us</a><p><p></p>

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


<input name="animation" type="hidden">
<div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon"></i></a></div>
</body>
</html>