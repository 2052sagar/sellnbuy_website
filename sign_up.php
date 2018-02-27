<!DOCTYPE html>
<html>
    <head>
        <title>sign_up</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/sign_up.css">
           
    </head>

    <body>
        <?php 
        require 'includes/core.inc.php';
        require 'includes/connect.inc.php';
        ?>
        <!-- Side Navigation -->
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="mobile.php"><img src="icon/mobile-icon.png" height="25px" width="25px"> Mobiles </a>
            <a href="electronics.php"><img src="icon/electronics.png" height="25px" width="25px"> Electronics and Appliances </a>
            <a href="vehicle.php"><img src="icon/vehicle.png" height="25px" width="25px">  Vehicle </a>
            <a href="kids.php"><img src="icon/kids.png" height="25px" width="25px">  Kids </a>
            <a href="books.php"><img src="icon/bsh.png" height="25px" width="25px">  Books, Store & Hobbies </a>
            <a href="furnitures.php"><img src="icon/furnitures.png" height="25px" width="25px">  Furnitures </a>
            <a href="jobs.php"><img src="icon/jobs.png" height="25px" width="25px">  Jobs </a>
            <a href="fashion.php"><img src="icon/fashion.png" height="25px" width="25px">  Fashion </a>
            <a href="realestate.php"><img src="icon/real_estate.png" height="25px" width="25px">  Real Estate </a>
            <a href="services.php"><img src="icon/services.png" height="25px" width="25px">  Services </a>
        </div>
        <div id="main">
            <!--Navigation-->
            <div>
                <ul class="topnav" id="myTopnav">
                    <li class="designsidenav" style="padding-left:5px;padding-top:10px;"><span style="font-size:30px; cursor:pointer;" onclick="openNav()"><img src="icon/menu-rounded-solid.png" height="30px" width="30px"></span></li>
                    <li><a href="index.php" class="navbar-brand" style="padding: 14px; "  ><img alt="Site_Logo" src=""></a></li>
                    <?php
                    if(loggedin()) {
                        $username = getuserfield('username');
                        echo '<li class=\'navitem floatright\' style=\' cursor: pointer; padding-top:5px;\' ><a href="user.php"> <b style="color:red; text-transform: uppercase;">'.$username.'</b></a></li>';
                        echo '<li class="floatright">
                                <a href="post_ad.php"> <button type="submit" class="btn btn-default decorbtn">Post Free Ad<span></span></button> </a>
                            </li>';
                        echo '<li class="floatright adjust-at-center"> 
                                <form class="navbar-form ">
                                    <input type="text" class="form-control" placeholder="search">
                                    <span><button type="submit" class="btn btn-default"><img src="icon/search-icon.png" height="25px" width="25px"></button></span>
                                </form>
                            </li>';
                        echo '<li class="navitem floatright" ><a href="#"><img src="icon/help.png" height="25px" width="25px">Help</a></li>';                       
                    } else {
                        echo '<li class="floatright">
                                <a href="post_ad.php"> <button type="submit" class="btn btn-default decorbtn">Post Free Ad<span></span></button> </a>
                            </li>';
                        echo '<li class="floatright adjust-at-center"> 
                                <form class="navbar-form ">
                                    <input type="text" class="form-control" placeholder="search">
                                    <span><button type="submit" class="btn btn-default"><img src="icon/search-icon.png" height="25px" width="25px"></button></span>
                                </form>
                            </li>';
                        echo '<li class="navitem floatright" ><a href="#"><img src="icon/help.png" height="25px" width="25px">Help</a></li>';
                        echo '<li class=\'navitem floatright\' style=\' cursor: pointer;\' ><a href=\'sign_in.php\'><img src=\'icon/sign in.png\' height=\'25px\' width=\'25px\'> Log In</a></li>';
                    }
                    ?>
                        <li class="icon floatright ">
                            <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
                        </li>
                </ul>
            </div>
            <!-- //Navigation -->

            <?php
            if(!loggedin()) {
                if(isset($_POST['email_id']) && isset($_POST['contactnumber']) && isset($_POST['firstname']) && isset($_POST['surname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_again'])){
                    $email_id = $_POST['email_id'];
                    $firstname = $_POST['firstname'];
                    $surname = $_POST['surname'];
                    $username = $_POST['username'];
                    $contactnumber = $_POST['contactnumber'];
                    $password = $_POST['password'];
                    $password_again = $_POST['password_again'];
                    $password_hash = md5($password);
                    if(!empty($email_id) && !empty($contactnumber) && !empty($firstname) && !empty($surname) && !empty($username) && !empty($password) && !empty($password_again)) {
                        if(strlen($email_id)>50||strlen($contactnumber)>13||strlen($firstname)>40||strlen($lastname)>40||strlen($username)>30) {
                            echo '<h1 style="text-align:center; color: yellow;">Please see for maximum length</h1>';
                        } else {
                            if($password != $password_again){
                                echo ' <h1 style="text-align:center; color: yellow;">Password do not match </h1>';
                            } else {
                                $query ="SELECT username FROM user_information WHERE username = '$username'";
                                $query_run = mysql_query($query);
                                if(mysql_num_rows($query_run)==1) {
                                    echo '<h1 style="text-align:center; color: yellow;">The username <ins style="color:red; text-transform: uppercase;">'. $username.'</ins> already exists. Please try with different Username</h1>';
                                } else {
                                    $query = "INSERT INTO user_information VALUES ('','".mysql_real_escape_string($email_id)."','".mysql_real_escape_string($contactnumber)."','".mysql_real_escape_string($firstname)."','".mysql_real_escape_string($surname)."','".mysql_real_escape_string($username)."','".mysql_real_escape_string($password_hash)."')";
                                    $query_run = mysql_query($query);
                                    if($query_run) {
                                        header('Location:register_success.php');
                                    } else {
                                        echo '<h1 style="text-align:center; color: yellow;">Sorry, we couldn\'t register you at this time. Try again later.</h1>';
                                    }
                                }
                            }
                        }
                    } else {
                        echo '<h1 style="text-align:center; color: yellow;">All fields are required</h1>';
                    }
                }
        
            ?>

            <form class="content" action="sign_up.php" method="POST">
                <div class="container">
                    <h2 style="color:black;">Registration form</h2>
                    <input type="email" maxlength="50" placeholder="Email" name="email_id" required value="<?php if (isset($email_id)) {echo $email_id; } ?>"><br>    
                    <input type="text" maxlength="13" placeholder="Phone number" name="contactnumber" required value="<?php if (isset($contactnumber)) {echo $contactnumber; } ?>"><br> 
                    <input type="text" maxlength="40" placeholder="Firstname" name="firstname" required value="<?php if (isset($firstname)) {echo $firstname; } ?>"><br> 
                    <input type="text" maxlength="40" placeholder="Surname" name="surname" required value="<?php if (isset($surname)) {echo $surname; } ?>"><br>                     
                    <input type="tel"  maxlength="30" placeholder="Username" name="username" required value="<?php if (isset($username)) {echo $username; } ?>"><br>                 
                    <input type="password" placeholder="Password" name="password" required ><br>
                    <input type="password" placeholder="Confirm Password" name="password_again" required ><br><br>
                    <input type="checkbox" name="term&policy"> I agree to your <a href="#" style=" text-decoration: none; color:red;">Terms of use</a> and <a href="#" style=" text-decoration: none; color:red;">Privacy Policy</a><br><br>
                    <button type="submit" class="signinbtn">Register</button><br><br><br>
                </div>
            </form>
            <?php
            } else if(loggedin()) {
                echo '<h1 style="text-align:center; color: yellow;">You\'re already registered and logged in.</h1>';
                echo '<div class="return"><a href="home.php">Return Home</a><br><br><br> <a href="sign_out.php">Log out</a></div>';

            }
            ?>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            /* for top nav bar*/
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }

            /*for side nav bar*/
            function openNav(){
                document.getElementById("mySidenav").style.width = "250px";
               // document.getElementById("main").style.marginLeft = "250px";
                //document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            }
            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
              //  document.getElementById("main").style.marginLeft= "0";
              //  document.body.style.backgroundColor = "white";
            }
        </script>
        
    </body>
</html>