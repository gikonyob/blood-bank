<?php
session_start();
include_once 'db.php';
include 'reg.php';



if(isset($_SESSION['userSession']))
{
  header("Location: account");
}
?>


<!DOCTYPE html>


<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../assets/images/logo.png" type="image/x-icon">
  <meta name="description" content="">
  <title>Register</title>



  <link rel="stylesheet" href="../assets/css/material.css">
  <link rel="stylesheet" href="../assets/css/tether.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/socicon.min.css">
  <link rel="stylesheet" href="../assets/css/animate.min.css">
  <link rel="stylesheet" href="../assets/dropdown/css/style.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/add.css" type="text/css">

  <script type='text/javascript'>
      function refreshCaptcha(){
        var img = document.images['captchaimg'];
        img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
      }
    </script>



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
					<li class="nav-item"><a class="nav-link link" href="login">LOGIN</a></li>
					  <li class="nav-item"><a class="nav-link link" href="../camps">CAMPS</a></li>
					  <li class="nav-item"><a class="nav-link link" href="../search">SEARCH</a></li>
					  <li class="nav-item"><a class="nav-link link" href="../about">ABOUT</a></li>
					  <li class="nav-item"><a class="nav-link link" href="#">HELP</a></li>
					</ul>
					  <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>

<section class="engine"><a rel="external" href="#">html website development</a></section><section class="mbr-section mbr-after-navbar" id="msg-box3-x" style="background-color: rgb(242, 242, 242); padding-top: 120px; padding-bottom: 120px;">


  <div class="container">
    <div class="col-md-12">
      <div class="col-md-8 col-md-offset-2">
        <h2 class="h2 text-center">Register as a donor </h2>
      </div>
        <form method="post" id="register-form">

          <?php
            if(isset($msg1)){
              echo $msg1;
            }

            ?>


						<div class="col-md-8 col-md-offset-2 form-group">
                    <label>First Name :</label>
            <input type="text" class="form-control login-field" name="fname" placeholder="Enter First Name" id="login-name" required />
            <span class="help-block " id="error"></span>
          </div>

          <div class="col-md-8 col-md-offset-2 form-group">
                  <label>Last Name :</label>
          <input type="text" class="form-control login-field" name="lname" placeholder="Enter Last Name" id="login-name" required />
          <span class="help-block " id="error"></span>
        </div>
          <div class="col-md-8 col-md-offset-2 form-group">
            <label>Gender</label>
            <div class="col-md-12">
            <div class="col-md-6 col-sm-6 ">
            <input name="gender" type="radio" value="Male" checked="checked"/> Male
            <input name="gender" type="radio" value="Female" /> Female
              <span class="help-block" id="error"></span>
          </div>
        </div>

          </div>
          <div class="col-md-8 col-md-offset-2 form-group">
            <label>Date of Birth</label>
            <div class="col-md-12"
            <div class="col-md-4 col-sm-4 ">

          </div><div class="col-md-4 col-sm-4 ">
            <select class="form-control login-field" name="month" id="login-form" required >
            <option value="">Month</option>
            <option class="text-xs-center" value="January">JAN</option>
            <option class="text-xs-center" value="February">FEB</option>
            <option class="text-xs-center" value="March">MAR</option>
            <option class="text-xs-center" value="April">APR</option>
            <option class="text-xs-center" value="May">MAY</option>
            <option class="text-xs-center" value="June">JUNE</option>
            <option class="text-xs-center" value="July">JULY</option>
            <option class="text-xs-center" value="August">AUG</option>
            <option class="text-xs-center" value="September">SEPT</option>
            <option class="text-xs-center" value="October">OCT</option>
            <option class="text-xs-center" value="November">NOV</option>
            <option class="text-xs-center" value="December">DEC</option>
          </select>
          </div>
          <div class="col-md-4 col-sm-4 ">
            <select class="form-control login-field" name="day" id="login-stream" required >
            <option value="">Day</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
         </select>
        </div>
        <div class="col-md-4 col-sm-4 ">
          <input type="number" class="form-control login-field" name="year" placeholder="year" id="year" required />
          <span class="help-block " id="error"></span>
      </div>
        </div>


          <div class="col-md-8 col-md-offset-2 form-group">
                  <label>Mobile No :</label>
          <input type="text" class="form-control login-field" name="mobile" placeholder="Enter Mobile No" id="login-name" required  pattern="[0-9]{10,11}" title="please enter only numbers between 10 to 11 for mobile no."/>
          <span class="help-block " id="error"></span>
        </div>

        <div class="col-md-8 col-md-offset-2 form-group">
                <label>County :</label>
                <select name="county" class="form-control" required>
                   <option class="text-xs-center">Select County</option>
                   <option class="text-xs-center" value="Uasin Gishu">Uasin Gishu</option>
                   <option class="text-xs-center" value="Nairobi">Nairobi</option>
                   <option class="text-xs-center" value="Nakuru">Nakuru</option>
                   <option class="text-xs-center" value="Mombasa">Mombasa</option>
                   <option class="text-xs-center" value="Nyandarua">Nyandarua</option>
                   <option class="text-xs-center" value="Nyeri">Nyeri</option>
                   <option class="text-xs-center" value="Machakos">Machakos</option>
                   <option class="text-xs-center" value="Meru">Meru</option>
                   <option class="text-xs-center" value="Narok">Narok</option>
                   <option class="text-xs-center" value="Kiambu">Kiambu</option>
                   <option class="text-xs-center" value="Isiolo">Isiolo</option>
                   <option class="text-xs-center" value="Marsabit">Marsabit</option>
               </select>

      </div>

            <div class="col-md-8 col-md-offset-2 form-group">
                    <label> Email :</label>
            <input type="text" class="form-control login-field" name="email" placeholder="Enter Email" id="email" required />
            <span class="help-block " id="error"></span>
          </div>

          <div class="col-md-8 col-md-offset-2 form-group">
                  <label>Password :</label>
          <input type="password" class="form-control login-field" name="password" placeholder="Enter Password" id="password" required />
          <span class="help-block " id="error"></span>
        </div>

        <div class="col-md-8 col-md-offset-2 form-group">
                <label>Confirm Password :</label>
        <input type="password" class="form-control login-field" name="con_password" placeholder="Confirm Password" id="con_password" required />
        <span class="help-block " id="error"></span>
      </div>

      <div class="col-md-8 col-md-offset-2 form-group">
              <label>You're not a robot :</label>
               <img src='captcha.php?rand=<?php echo rand();?>' id='captchaimg'/>
               <span class="help-block " id="error"></span>
             </div>
             <div class="col-md-8 col-md-offset-2 form-group">
                     <label>Can't read the image? :</label>
                     Click <a href='javascript: refreshCaptcha();'>here</a> to refresh the captcha code.
                      <span class="help-block " id="error"></span>
                   </div>


                     <div class="col-md-8 col-md-offset-2 form-group">
                             <label>Enter the code here :</label>
                     <input type="text" class="form-control login-field" name="captcha_code" placeholder="Enter the code here" id="captcha_code" required />
                     <span class="help-block " id="error"></span>
                   </div>
                   <div class="col-md-8 col-md-offset-2 form-group">
                     <input type="submit" value="Sign Up"  name="btn-register"
                     style="border:0px;  width:150px; height:40px; border-radius: 10px;  box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; background-color:#D50000; "/>
                     <span class="help-block" id="error"></span>
                   </div>


      <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
      </table>
      </form>
                 <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                    <span>Already Registered ? <a style=" color:red;" href="login"> &nbsp; Sign In</a></span>
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
      <a href="../user/viewrequest" class="text-white">View Requests</a><br><a href="../camps" class="text-white">Camps</a><br><a href="../about" class="text-white">About</a><br><a href="../contact" class="text-white">Contact us</a><br></p><p></p>
                  </div>


              </div>
          </div>
      </section>

      <footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-3" style="background-color: rgb(190, 22, 22); padding-top: 1.75rem; padding-bottom: 1.75rem;">

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
