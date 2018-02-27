<!DOCTYPEE Html>
<html>
<head>
    <title>index</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php 
        require 'includes/core.inc.php';
        require 'includes/connect.inc.php';
    ?>
    <div>
        <ul class="topnav" id="myTopnav">
            <li><a href="index.php" class="navbar-brand" style="padding: 14px; "  ><img alt="Site_Logo" src=""></a></li>
            <?php
            if(loggedin()) {
                $username = getuserfield('username');  
                echo '<li class=\'navitem floatright\' style=\' cursor: pointer; padding-top:5px;\' ><a href="user.php"> <b style="color:red; text-transform: uppercase;">'.$username.'</b></a></li>';
            } else {
                echo '<li class=\'navitem floatright\' style=\' cursor: pointer;\' ><a href=\'sign_in.php\'><img src=\'icon/sign in.png\' height=\'25px\' width=\'25px\'> Log In</a></li>';
            }
            ?>
        </ul>
    </div>
    <h4>Click  on <ins style="color:red; text-decoration:none;">Visit Site</ins> to see Products <a href="home.php"><button type="submit" class="btn btn-default decorbtn">Visit Site<span></span></button></a> </h4>
    <br><br>
    <h4>Click  on <ins style="color:red; text-decoration:none;">Register</ins> if you aren't register <a href="sign_up.php"><button type="submit" class="btn btn-default decorbtn">Register<span></span></button></a> </h4>
    <br><br>
    <h4>Click on <ins style="color:red; text-decoration:none;">Post Free Ad</ins> to adverise things <a href="post_ad.php"> <button type="submit" class="btn btn-default decorbtn">Post Free Ad<span></span></button> </a> </h4><br><br>
    <p> Description about the site will be here </p>
</body>
</html>