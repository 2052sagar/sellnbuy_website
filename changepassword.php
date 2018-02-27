<!DOCTYPE html>
<html>
<head>
    <title>user_page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/sign_up.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php 
        require 'includes/core.inc.php';
        require 'includes/connect.inc.php';
    ?>
    <?php
        if(loggedin()) { 
            echo'<div>
                <ul class="topnav" id="myTopnav">
                    <li><a href="index.php" class="navbar-brand" style="padding: 14px; "  ><img alt="Site_Logo" src=""></a></li>  
                    <li class=\'navitem floatright\' style=\' cursor: pointer; padding-top:5px;\' ><a href=\'sign_out.php\'> Log Out</a></li>
                    <li class=\'navitem floatright\' style=\' cursor: pointer; padding-top:5px;\' ><a href=\'changepassword.php\'> Change Password</a></li>                                                                                                 
                </ul>
            </div>';
            if(isset($_POST['oldpass']) && isset($_POST['newpass']) && isset($_POST['newpass_again'])) {
                $oldpass = $_POST['oldpass'];
                $newpass = $_POST['newpass'];
                $newpass_again = $_POST['newpass_again']; 
                $oldpass_hash = md5($oldpass);
                $newpass_hash = md5($newpass);
                $newpass_again_hash = md5($newpass_again); 
                if(!empty($oldpass) && !empty($newpass) && !empty($newpass_again)) {
                    $password = getuserfield('password');
                    if($oldpass_hash == $password){
                        if($newpass !=$newpass_again){
                            echo ' <h1 style="text-align:center; color: yellow;"> Your New Passwords do not match </h1>';       
                        } else {
                            $user_id = getuserfield('id');
                            $query = "UPDATE user_information SET password ='$newpass_hash' WHERE id ='$user_id'";
                            $query_run = mysql_query($query);
                            if($query_run) {
                                header('Location:changepassword_success.php');
                            } else {
                                echo '<h1 style="text-align:center; color: yellow;">Sorry, we couldn\'t change password at this time. Try again later.</h1>';
                            }
                        }
                    } else {
                        echo ' <h1 style="text-align:center; color: yellow;"> Your <ins style="color:red;">Current Password</ins> is incorrect </h1>';   
                    }
                } else {
                    echo '<h1 style="text-align:center; color: yellow;">All fields are required</h1>';
                }            
            }
        } else {
            die(header('Location:home.php'));
        }
     ?>
     <form class="content" action="<?php echo $current_file?>" method="POST">
        <div class="container">
            <h2 style="color:black; text-align:center;">Change Password</h2>                   
            <input type="password" placeholder="Current Password" name="oldpass" required ><br><br>
            <input type="password" placeholder="New Password" name="newpass" required ><br><br>
            <input type="password" placeholder="Confirm New Password" name="newpass_again" required ><br><br>
            <button type="submit" class="signinbtn">Change password</button><br><br><br>
        </div>
    </form>
<body>
</html>