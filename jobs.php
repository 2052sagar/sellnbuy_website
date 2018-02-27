<!DOCTYPE html>
<html>
    <head>
        <title>jobs</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/categories.css">
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
            <a href="books.php"><img src="icon/bsh.png" height="25px" width="25px">  Books, Sports & Hobbies </a>
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
                //count total ads under jobs category
                $query = "SELECT COUNT(*) AS count_ad FROM ad_information WHERE (category LIKE 'Customer Service' OR category LIKE 'IT' OR category LIKE 'Online' OR category LIKE 'Marketing & Advertising' OR category LIKE 'Sales' OR category LIKE 'Human Resources' OR category LIKE 'Education' OR category LIKE 'Hotels & Tourism' OR category LIKE 'Accounting & Finance' OR category LIKE 'Manufacturing' OR category LIKE 'Part - Time' OR category LIKE 'Other Jobs')";
                $run_query = mysql_query($query);
                $total_ad = mysql_result($run_query,0);
                $query1 = "SELECT COUNT(*) AS count_ad FROM ad_information WHERE category LIKE 'Customer Service'";
                $run_query1 = mysql_query($query1);
                $customer_ad = mysql_result($run_query1,0);  
                $query2 = "SELECT COUNT(*) AS count_ad FROM ad_information WHERE category LIKE 'IT'";
                $run_query2 = mysql_query($query2);
                $it_ad = mysql_result($run_query2,0);
                $query3 = "SELECT COUNT(*) AS count_ad FROM ad_information WHERE category LIKE 'Online'";
                $run_query3 = mysql_query($query3);
                $online_ad = mysql_result($run_query3,0); 
                $query4 = "SELECT COUNT(*) AS count_ad FROM ad_information WHERE category LIKE 'Marketing & Advertising'";
                $run_query4 = mysql_query($query4);
                $marketing_ad = mysql_result($run_query4,0);
                $query5 = "SELECT COUNT(*) AS count_ad FROM ad_information WHERE category LIKE 'Sales'";
                $run_query5 = mysql_query($query5);
                $sales_ad = mysql_result($run_query5,0);
                $query6 = "SELECT COUNT(*) AS count_ad FROM ad_information WHERE category LIKE 'Human Resources'";
                $run_query6 = mysql_query($query6);
                $humanres_ad = mysql_result($run_query6,0);
                $query7 = "SELECT COUNT(*) AS count_ad FROM ad_information WHERE category LIKE 'Education'";
                $run_query7 = mysql_query($query7);
                $education_ad = mysql_result($run_query7,0); 
                $query8 = "SELECT COUNT(*) AS count_ad FROM ad_information WHERE category LIKE 'Hotels & Tourism'";
                $run_query8 = mysql_query($query8);
                $hotel_ad = mysql_result($run_query8,0); 
                $query9 = "SELECT COUNT(*) AS count_ad FROM ad_information WHERE category LIKE 'Accounting & Finance'";
                $run_query9 = mysql_query($query9);
                $accounting_ad = mysql_result($run_query9,0); 
                $query10 = "SELECT COUNT(*) AS count_ad FROM ad_information WHERE category LIKE 'Manufacturing'";
                $run_query10 = mysql_query($query10);
                $manufacturing_ad = mysql_result($run_query10,0); 
                $query11 = "SELECT COUNT(*) AS count_ad FROM ad_information WHERE category LIKE 'Part - Time'";
                $run_query11 = mysql_query($query11);
                $parttime_ad = mysql_result($run_query11,0);              
                $query12 = "SELECT COUNT(*) AS count_ad FROM ad_information WHERE category LIKE 'Other Jobs'";
                $run_query12 = mysql_query($query12);
                $other_ad = mysql_result($run_query12,0); 

            ?>

            <div>
                <h1 class="categoriesheading">Jobs</h1>
                <h4 style="text-align:center;">(<?php echo $total_ad.' Ads' ?>)</h4> 
                <img src="images/findjob.jpg" height="200px" >  
            </div>
            <div class="categoriesbody">
                <h1 class="af-bf"><span>Browse<br/>Sub-Categories</span></h1>
                <div class="col-6">
                    <a href="#">Customer Service (<strong><?php echo $customer_ad.' Ads' ?> </strong>)</a>  
                </div>
                <div class="col-6">
                    <a href="#">IT (<strong><?php echo $it_ad.' Ads' ?> </strong>)</a>
                </div>
                <div class="col-6">
                    <a href="#">Online (<strong><?php echo $online_ad.' Ads' ?> </strong>)</a>
                </div>
                <div class="col-6">
                    <a href="#">Marketing & Advertising (<strong><?php echo $marketing_ad.' Ads' ?> </strong>)</a>   
                </div>
                <div class="col-6">
                    <a href="#">Sales (<strong><?php echo $sales_ad.' Ads' ?> </strong>)</a>
                </div>
                <div class="col-6">
                    <a href="#">Human Resources (<strong><?php echo $humanres_ad.' Ads' ?> </strong>)</a>
                </div>
                <div class="col-6">
                    <a href="#">Education (<strong><?php echo $education_ad.' Ads' ?> </strong>)</a>   
                </div>
                <div class="col-6">
                    <a href="#">Hotels & Tourism (<strong><?php echo $hotel_ad.' Ads' ?> </strong>)</a>
                </div>
                <div class="col-6">
                    <a href="#">Accounting & Finance (<strong><?php echo $accounting_ad.' Ads' ?> </strong>)</a>
                </div>
                <div class="col-6">
                    <a href="#">Manufacturing (<strong><?php echo $manufacturing_ad.' Ads' ?> </strong>)</a>   
                </div>
                <div class="col-6">
                    <a href="#">Part - Time (<strong><?php echo $parttime_ad.' Ads' ?> </strong>)</a>
                </div>
                <div class="col-6">
                    <a href="#">Other Jobs (<strong><?php echo $other_ad.' Ads' ?> </strong>)</a>
                </div>
            </div><br><br><br><br><br><br><br><br>
            <div>
                <h1 class="af-bf"><span>See all Ads </span></h1>
                <?php
                $query = "SELECT * FROM ad_information WHERE (category LIKE 'Customer Service' OR category LIKE 'IT' OR category LIKE 'Online' OR category LIKE 'Marketing & Advertising' OR category LIKE 'Sales' OR category LIKE 'Human Resources' OR category LIKE 'Education' OR category LIKE 'Hotels & Tourism' OR category LIKE 'Accounting & Finance' OR category LIKE 'Manufacturing' OR category LIKE 'Part - Time' OR category LIKE 'Other Jobs') ORDER BY ad_id DESC";
                if($query_run = mysql_query($query)) {
                    if (mysql_num_rows($query_run) == NULL) {
                        echo '<h4 style="text-align: center;">No ads of this category found.<h4>';
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
                            <a onclick="document.getElementById('<?php echo $ad_id; ?>').style.display='block' " style="cursor:pointer;">
                            <li class="col-9">
                              <div class="col-2"> <img src="uploads/thumbs/<?php echo $image ?>" class="ad_grouping_img"></div>
                               <section class="col-13" style="color:black;"><?php echo '<strong>'.$ad_title.'</strong> <br><br><ins style="color:red; text-decoration:none;"> Rs'.$price.'</ins>'?></section>
                            </li><br><br><br><br><br><br><br><br><br><br><br>
                            </a>
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
                                                <div class="seller-contact">
                                                    <h4 style="padding-left:5px;">Interested in this Ad?<small style="color:#777;"> contact the seller!</small></h4><br>
                                                    <p style="padding-left:5px;"><b>Seller Name: <ins style="color:red; text-decoration:none; font-size:20px;"><?php echo $seller_name; ?> </ins></b></p><br>                                                    
                                                    <p style="padding-left:5px;"><b>Contact Number: </b><ins style="color:red; text-decoration:none;"><?php echo $contactnum; ?> </ins></p><br>
                                                    <p class="first" style="padding-left:5px;"><b>Email: </b><ins style="color:red; text-decoration:none;"><?php echo $email; ?> </ins></p>
                                                    <p class="second" style="padding-left:5px;"><b>Email: </b><ins style="color:red; text-decoration:none; font-size:12px;"><?php echo $email; ?> </ins></p>                                                  
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