<!DOCTYPE html>
<html>
<head>
    <title>user_page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/categories.css">
    <link rel="stylesheet" type="text/css" href="css/user.css">
</head>
<body>
    <?php 
        require 'includes/core.inc.php';
        require 'includes/connect.inc.php';
    ?>      
    <?php
        if(loggedin()) {
            $userid = getuserfield('id');
            $firstname = getuserfield('firstname'); 
            $surname = getuserfield('surname'); 
            $username = getuserfield('username');
            $emailid = getuserfield('email_id');
            $contactnum = getuserfield('contactnumber');
            $total_ad = getuserfield('total_ad');

            //count total ad posted by user
            $query1 = "SELECT COUNT(*) AS count_ad FROM ad_information WHERE id ='$userid'";
            $run_query1 = mysql_query($query1);
            $present_ad = mysql_result($run_query1,0);
    ?>
            <div>
                <ul class="topnav" id="myTopnav" >
                    <li><a href="index.php" class="navbar-brand" style="padding: 14px; "  ><img alt="Site_Logo" src=""></a></li>  
                    <li class='navitem floatright' style=' cursor: pointer; padding-top:5px;' ><a href='sign_out.php'> Log Out</a></li>
                    <li class='navitem floatright' style=' cursor: pointer; padding-top:5px; display:block' ><a href='changepassword.php'> Change Password</a></li>                                                                                                 
                </ul>
            </div>
            <div class="user-main">
                <div class="user-container">
                    <div class="user-info">
                        <h4 style="padding-left:5px;">About User</h4><hr>
                        <p style="padding-left:5px;"><b>User Name: <ins style="color:red; text-decoration:none;"><?php echo $username; ?> </ins></b></p> 
                        <p style="padding-left:5px;"><b>Name: <ins style="color:red; text-decoration:none;"><?php echo $firstname.' '.$surname; ?> </ins></b></p>
                        <p style="padding-left:5px;"><b>Email Id: <ins style="color:red; text-decoration:none;"><?php echo $emailid; ?> </ins></b></p> 
                        <p style="padding-left:5px;"><b>Contact Number: <ins style="color:red; text-decoration:none;"><?php echo $contactnum; ?> </ins></b></p> <br><br>                                              
                    </div>
                    <div class="user-info">
                        <h4 style="padding-left:5px;">Ad Information</h4><hr>
                        <a href="post_ad.php"> <button type="submit" class="btn btn-default decorbtn">Post Free Ad<span></span></button></a>                    
                        <p style="padding-left:5px;"><b>Total Ads you have posted on this site: <ins style="color:red; text-decoration:none;"><?php echo $total_ad; ?> </ins></b></p> 
                        <p style="padding-left:5px;"><b>Your Present Ads on this site: <ins style="color:red; text-decoration:none;"><?php echo $present_ad; ?> </ins></b></p>
                    </div>
                </div>
                <div class="ad-container">
                    <h1 class="af-bf"><span>See Your Ads </span></h1>
                    <?php
                    $query = "SELECT * FROM ad_information WHERE id = '$userid'  ORDER BY ad_id DESC";
                    if($query_run = mysql_query($query)) {
                        if (mysql_num_rows($query_run) == NULL) {
                            echo 'No ads of this category found.';
                        } else{
                    ?>
                        <ul class="ad_grouping">
                    <?php 
                        while  ($query_row = mysql_fetch_assoc($query_run)) {
                                $ad_id = $query_row['ad_id'];
                                $ad_title = $query_row['ad_title'];
                                $price = $query_row['price'];
                                $img_ext1 = $query_row['img_ext1'];
                                $img_ext2 = $query_row['img_ext2'];
                                $img_ext3 = $query_row['img_ext3'];
                                $img_ext4 = $query_row['img_ext4'];
                                $img_ext5 = $query_row['img_ext5'];
                                if(!empty($img_ext1)) {
                                    $image = $ad_id.'a.'.$img_ext1;
                                } else if(!empty($img_ext2)) {
                                    $image = $ad_id.'b.'.$img_ext2;
                                } else if(!empty($img_ext3)) {
                                    $image = $ad_id.'c.'.$img_ext3;
                                } else if(!empty($img_ext4)) {
                                    $image = $ad_id.'d.'.$img_ext4;
                                } else {
                                    $image = $ad_id.'e.'.$img_ext5;
                                }
                                $category = $query_row['category'];
                                $ad_description = $query_row['ad_description'];
                                $condition = $query_row['condition'];
                                $seller_name = $query_row['name'];
                                $contactnum = $query_row['contactnumber'];
                                $email = $query_row['email'];
                                $image1 = $ad_id.'a.'.$img_ext1;
                                $image2 = $ad_id.'b.'.$img_ext2;
                                $image3 = $ad_id.'c.'.$img_ext3;
                                $image4 = $ad_id.'d.'.$img_ext4;
                                $image5 = $ad_id.'e.'.$img_ext5;
                                
                    ?>
                                <div class="big">
                                    <a onclick="document.getElementById('<?php echo $ad_id; ?>').style.display='block' " style="cursor:pointer;">
                                    <li class="col-11">
                                    <div class="col-2" > <img src="uploads/thumbs/<?php echo $image ?>" class="ad_grouping_img"></div>
                                    <section class="col-13" style="color:black;"><?php echo '<strong>'.$ad_title.'</strong><br><br><ins style="color:red; text-decoration:none;"> Rs'.$price.'</ins>'?></section>
                                    </li><br><br><br><br><br><br><br><br><br><br><br>
                                    </a>
                                </div>
                                <div class="small">
                                    <a onclick="document.getElementById('<?php echo $ad_id; ?>').style.display='block' " style="cursor:pointer;">
                                    <li class="col-9">
                                    <div class="col-2"> <img src="uploads/thumbs/<?php echo $image ?>" class="ad_grouping_img" width="70px;"></div>
                                    <section class="col-13" style="color:black; font-size:14px;"><?php echo '<strong>'.$ad_title.'</strong><br><br><ins style="color:red; text-decoration:none;"> Rs'.$price.'</ins>'?></section>
                                    </li><br><br><br><br><br><br><br><br><br><br><br>
                                    </a>
                                </div>
                                <div class="verysmall">
                                    <a onclick="document.getElementById('<?php echo $ad_id; ?>').style.display='block' " style="cursor:pointer;">
                                    <li class="col-9">
                                    <div class="col-2"> <img src="uploads/thumbs/<?php echo $image ?>" class="ad_grouping_img"></div>
                                    </li><br><br><br><br><br><br><br><br><br><br><br>
                                    </a>
                                </div>
                                <div id="<?php echo $ad_id; ?>" class="modal">
                                    <div>
                                        <span onclick="document.getElementById('<?php echo $ad_id; ?>').style.display= 'none' " class="close">&times;</span>
                                    </div>
                                    <div class="modal-content animate-detail" >
                                        <h2 style="text-align:center;"><?php echo $ad_title ;?> </h2>
                                        <div class="main-box">
                                            <div class="box1" style="text-align:center;">
                                                <h3 style="color:yellow;"><strong>Images</strong></h3>
                                                <?php 
                                                if(!empty($img_ext1)){
                                                ?>
                                                    <div class="img">
                                                        <a target="_blank" href="uploads/images/<?php echo $image1; ?>">
                                                            <img src="uploads/thumbs/<?php echo $image1; ?>">
                                                        </a>
                                                    </div>
                                                <?php
                                                }
                                                if(!empty($img_ext2)){
                                                ?>
                                                    <div class="img">
                                                        <a target="_blank" href="uploads/images/<?php echo $image2; ?>">
                                                            <img src="uploads/thumbs/<?php echo $image2; ?>">
                                                        </a>
                                                    </div>
                                                <?php
                                                }
                                                if(!empty($img_ext3)){
                                                ?>
                                                    <div class="img">
                                                        <a target="_blank" href="uploads/images/<?php echo $image3; ?>">
                                                            <img src="uploads/thumbs/<?php echo $image3; ?>">
                                                        </a>
                                                    </div>
                                                <?php
                                                }
                                                if(!empty($img_ext4)){
                                                ?>
                                                    <div class="img">
                                                        <a target="_blank" href="uploads/images/<?php echo $image4; ?>">
                                                            <img src="uploads/thumbs/<?php echo $image4; ?>">
                                                        </a>
                                                    </div>
                                                <?php
                                                }
                                                if(!empty($img_ext5)){
                                                ?>
                                                    <div class="img">
                                                        <a target="_blank" href="uploads/images/<?php echo $image5; ?>">
                                                            <img src="uploads/thumbs/<?php echo $image5; ?>">
                                                        </a>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div><br><br>
                                            <div class="box2">
                                                <div class="ad-description">
                                                    <h3 style="text-align:center; color:red;">Ad Description </h3>
                                                    <p><?php echo $ad_description.'<br><br>'; ?></p>
                                                </div>
                                                <div class="main-boxcontent">
                                                    <div class="ad-buyerinfo">
                                                        <section class="box">
                                                        <p class="front"><b>Category</b></p>
                                                        <h3 class="back" style="color:#0099e5;"><?php echo $category; ?> </h3>
                                                        </section><hr style="width:94%;">
                                                        <section class="box">
                                                        <p class="front"><b>Price</b></p>
                                                        <h3 class="back" style="color:#0099e5;">Rs<?php echo $price; ?> </h3>
                                                        </section><hr style="width:94%;">
                                                        <section class="box">
                                                        <p class="front"><b>Condition</b></p>
                                                        <h3 class="back" style="color:#0099e5;"><?php echo $condition; ?> </h3>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php       
                            }
                    ?>
                            </ul>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
    <?php        
        } else {
            die(header('Location:home.php'));
        }
    ?>  
<body>
</html>