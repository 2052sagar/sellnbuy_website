<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/sign_in.css">
</head>
<body>
    <?php
    require 'includes/core.inc.php';
    require 'includes/connect.inc.php';
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_hash = md5 ($password);
        if(!empty($username) && !empty($password)) {
            $query = "SELECT id FROM user_information WHERE username = '".mysql_real_escape_string($username)."' AND password ='".mysql_real_escape_string($password_hash)."'";
            if($query_run = mysql_query($query)) {
                $query_num_rows = mysql_num_rows($query_run);
                if($query_num_rows == 0 ) {
                    echo '<h1 style="text-align:center; color: yellow;">Invalid username/password. Please enter valid username and password.</h1>';
                } else if ($query_num_rows == 1) {
                    $user_id = mysql_result($query_run, 0, 'id');
                    $_SESSION['user_id'] = $user_id;
                    header('Location:index.php');
                }
            }
        } else {
            echo '<h1 style="text-align:center; color: yellow;">You must supply a username and password</h1>';
        }
    }
?>
<?php
if(loggedin()){
    $username = getuserfield('username');
    echo'<h1 style="text-align:center; color: yellow;">You are already logged in with username <b style="color:red; text-transform: uppercase;">'.$username .'</b></h1><br><br>';
    echo '<div class="return"><a href="home.php">Return Home</a><br><br><br> <a href="sign_out.php">Log out</a></div>';
    die();
}
?>
    <form class="content" action="<?php echo $current_file?>" method="POST">
        <div class="container">
            <h2 style="color:black; text-align:center;">User Log In</h2>
            <input type="text" placeholder="Username" name="username" required><br>                    
            <input type="password" placeholder="Password" name="password" required ><br><br>
            <button type="submit" class="signinbtn">LOG IN</button><br><br><br>
            <input type="checkbox" checked="checked" > Remember me
            <a href="" class="forget" style="color:red;">Forget Password?</a><br><br>
            <a href="index.php"><button type="button"  class="cancelbtn">Cancel</button></a>
            <h4 style="text-align:center; letter-spacing:1px;">Not a Member Yet? <a href="sign_up.php" style="color:#16a7bb;">Register Now</a>
        </div>
    </form> 
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>