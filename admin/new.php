
<?php

include_once 'db.php';

if(isset($_POST['btnnews']))
{
    $title = $MySQLi_CON->real_escape_string(trim($_POST['title']));
    $body = $MySQLi_CON->real_escape_string(trim($_POST['body']));
    $author = $MySQLi_CON->real_escape_string(trim($_POST['author']));
    $brief = $MySQLi_CON->real_escape_string(trim($_POST['brief']));
    $imagedesc = $MySQLi_CON->real_escape_string(trim($_POST['imagedesc']));
    $post_date = $MySQLi_CON->real_escape_string(trim($_POST['post_date']));

    $imgFile = $_FILES['news_photo']['name'];
    $tmp_dir = $_FILES['news_photo']['tmp_name'];
    $imgSize = $_FILES['news_photo']['size'];

    if(empty($imgFile)){
        $msg1 ="<div class='alert bg-info'>
						<button class='close' data-dismiss='alert'>&times;</button>
						 Please Select Image File. !
					</div>";
    }
    else
    {
        $upload_dir = '../assets/images/news/'; // upload directory

        $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

        // rename uploading image
        $newsphoto = rand(1000,1000000).".".$imgExt;

        // allow valid image file formats
        if(in_array($imgExt, $valid_extensions)){
            // Check file size '5MB'
            if($imgSize < 5000000)    {
                move_uploaded_file($tmp_dir,$upload_dir.$newsphoto);
            }
            else{
                $errMSG = "Sorry, your file is too large.";
            }
        }
        else{
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    }

    $query = "INSERT INTO bloodnews(title,body,brief,author,newsphoto,imagedesc,post_date) VALUES('$title','$body','$brief','$author','$newsphoto','$imagedesc','$post_date')";

    if($MySQLi_CON->query($query))
    {
        $msg1 = "<div class='alert bg-succeed'>
					<button class='close' data-dismiss='alert'>&times;</button>
					Successfully updated news you will be redirected to your account in 5 seconds.
			  	</div>";
       header("refresh:5;account");

    }
    else
    {
        $msg1 = "<div class='alert bg-info'>
						<button class='close' data-dismiss='alert'>&times;</button> Error while updating news !!!
					</div>";
    }





}

$MySQLi_CON->close();

?>


