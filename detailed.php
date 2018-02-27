<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/detail.css">
    </head>
    <body>
        <?php
        require 'mobile.php';
        echo $_SESSION['ad_title'];
        session_destroy();
        ?>
    </body>
</html>