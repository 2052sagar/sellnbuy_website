<!DOCTYPE html>
<html>
<head>
    <title>post_ad</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/post_ad.css">
</head>
<body>
    <?php 
        require 'includes/core.inc.php';
        require 'includes/connect.inc.php';
        include 'includes/img.inc.php';
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
                <li class="designsidenav" style="padding-left:5px;padding-top:10px;"><span style="font-size:30px; cursor:pointer;" onclick="openNav()">  <img src="icon/menu-rounded-solid.png" height="30px" width="30px"></span></li>
                <li><a href="index.php" class="navbar-brand" style="padding: 14px; "  ><img alt="Site_Logo" src=""></a></li>
                <?php
                if(loggedin()) {
                    $username = getuserfield('username');
                    $total_ad = getuserfield('total_ad');
                    $userid = getuserfield('id');
                    echo '<li class=\'navitem floatright\' style=\' cursor: pointer; padding-top:5px;\' ><a href="user.php"> <b style="color:red; text-transform: uppercase;">'.$username.'</b></a></li>';
                    echo '<li class="floatright adjustbtn adjust-at-center">
                            <form class="navbar-form ">
                                <button type="submit" class="btn btn-default decorbtn">Post Free Ad<span></span></button>
                            </form>
                        </li>';
                    echo '<li class="floatright adjust-at-center"> 
                            <form class="navbar-form ">
                                <input type="text" class="form-control" placeholder="search">
                                <span><button type="submit" class="btn btn-default"><img src="icon/search-icon.png" height="25px" width="25px"></button></span>
                            </form>
                        </li>';
                    echo '<li class="navitem floatright" ><a href="#"><img src="icon/help.png" height="25px" width="25px">Help</a></li>';                       
                } else {
                    echo '<li class="floatright adjustbtn adjust-at-center">
                        <form class="navbar-form ">
                            <button type="submit" class="btn btn-default decorbtn">Post Free Ad<span></span></button>
                        </form>
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
        if(isset($_POST['category_name']) && isset($_POST['title']) && isset($_POST['ad_description']) && isset($_POST['price']) && isset($_POST['condition']) && isset($_FILES['image1']) && isset($_FILES['image2']) && isset($_FILES['image3']) && isset($_FILES['image4']) && isset($_FILES['image5']) && isset($_POST['name']) && isset($_POST['contact_num']) && isset($_POST['email'])) {
            $categoryname = $_POST['category_name'];
            $title = $_POST['title'];
            $ad_description = $_POST['ad_description'];
            $price = $_POST['price'];
            $condition = $_POST['condition'];
            $name = $_POST['name'];
            $contactnum = $_POST['contact_num'];
            $email = $_POST['email'];
            if((empty($categoryname)) || ($categoryname === 'Select Category')) {
                echo '<h1 style="text-align:center; color: red;">Please select category for your ad</h1>';
            } else if(!empty($categoryname) && !empty($title) && !empty($ad_description) && !empty($price) && !empty($condition) && !empty($name) && !empty($contactnum) && !empty($email)) {
                if(strlen($title)>75||strlen($ad_description)>500||strlen($condition)>10||strlen($name)>40||strlen($contactnum)>13||strlen($email)>50) {
                    echo '<h1 style="text-align:center; color: red;">Please see for maximum length</h1>';
                } else {
                    $image_name1 = $_FILES['image1']['name'];
                    $image_size1 = $_FILES['image1']['size'];
                    $image_temp1 = $_FILES['image1']['tmp_name'];
                    $image_name2 = $_FILES['image2']['name'];
                    $image_size2 = $_FILES['image2']['size'];
                    $image_temp2 = $_FILES['image2']['tmp_name'];
                    $image_name3 = $_FILES['image3']['name'];
                    $image_size3 = $_FILES['image3']['size'];
                    $image_temp3 = $_FILES['image3']['tmp_name'];
                    $image_name4 = $_FILES['image4']['name'];
                    $image_size4 = $_FILES['image4']['size'];
                    $image_temp4 = $_FILES['image4']['tmp_name'];
                    $image_name5 = $_FILES['image5']['name'];
                    $image_size5 = $_FILES['image5']['size'];
                    $image_temp5 = $_FILES['image5']['tmp_name'];
                    $total_img_size = $image_size1 + $image_size2 + $image_size3 + $image_size4 + $image_size5;

                    $allowed_ext = array('jpg', 'jpeg', 'png', 'gif', '');
                    if(!empty($image_name1)) {
                        $image_ext1 = strtolower(end(explode('.',$image_name1)));    
                    }else {
                        $image_ext1 = '';
                    }  
                    if(!empty($image_name2)) {
                        $image_ext2 = strtolower(end(explode('.',$image_name2)));    
                    }else {
                        $image_ext2 = '';
                    }
                    if(!empty($image_name3)) {
                        $image_ext3 = strtolower(end(explode('.',$image_name3)));    
                    }else {
                        $image_ext3 = '';
                    }
                    if(!empty($image_name4)) {
                        $image_ext4 = strtolower(end(explode('.',$image_name4)));    
                    }else {
                        $image_ext4 = '';
                    }
                    if(!empty($image_name5)) {
                        $image_ext5 = strtolower(end(explode('.',$image_name5)));    
                    }else {
                        $image_ext5 = '';
                    }             
                    if(!empty($image_name1) || !empty($image_name2) || !empty($image_name3) || !empty($image_name4) || !empty($image_name5)){
                        if((in_array($image_ext1,$allowed_ext) === false) || (in_array($image_ext2,$allowed_ext) === false) || (in_array($image_ext3,$allowed_ext) === false) || (in_array($image_ext4,$allowed_ext) === false) || (in_array($image_ext5,$allowed_ext) === false)) {
                           echo '<h1 style="text-align:center; color: red;">Image file type not allowed. Please choose file type of .jpg, .jpeg, .png, .gif.</h1>'; 
                        } else {
                            if($total_img_size > 10485760 ) {
                                echo '<h1 style="text-align:center; color: red;">Total size of images should be less than or equal to 10mb.</h1>';
                            }else {
                                $query = "INSERT INTO ad_information VALUES ('','".$_SESSION['user_id']."', '".mysql_real_escape_string($categoryname)."', '".mysql_real_escape_string($title)."', '".mysql_real_escape_string($ad_description)."', '".mysql_real_escape_string($price)."', '".mysql_real_escape_string($condition)."', '".mysql_real_escape_string($name)."','".mysql_real_escape_string($contactnum)."', '".mysql_real_escape_string($email)."', UNIX_TIMESTAMP(), '".mysql_real_escape_string($image_ext1)."','".mysql_real_escape_string($image_ext2)."','".mysql_real_escape_string($image_ext3)."','".mysql_real_escape_string($image_ext4)."','".mysql_real_escape_string($image_ext5)."' ) ";  
                                $query_run = mysql_query($query);

                                $image_id = mysql_insert_id();
                                $image_file1 = $image_id.'a.'.$image_ext1;
                                $image_file2 = $image_id.'b.'.$image_ext2;
                                $image_file3 = $image_id.'c.'.$image_ext3;
                                $image_file4 = $image_id.'d.'.$image_ext4;
                                $image_file5 = $image_id.'e.'.$image_ext5;
                                if(!empty($image_name1)) {
                                move_uploaded_file($image_temp1,'uploads/images/'.$image_file1);
                                create_thumbnail('uploads/images/'.$image_file1, 'uploads/thumbs/'.$image_file1,100,100);
                                }
                                if(!empty($image_name2)) {
                                move_uploaded_file($image_temp2,'uploads/images/'.$image_file2);
                                create_thumbnail('uploads/images/'.$image_file2, 'uploads/thumbs/'.$image_file2,100,100);
                                }
                                if(!empty($image_name3)){
                                move_uploaded_file($image_temp3,'uploads/images/'.$image_file3);
                                create_thumbnail('uploads/images/'.$image_file3, 'uploads/thumbs/'.$image_file3,100,100);
                                }
                                if(!empty($image_name4)) {
                                move_uploaded_file($image_temp4,'uploads/images/'.$image_file4);
                                create_thumbnail('uploads/images/'.$image_file4, 'uploads/thumbs/'.$image_file4,100,100);
                                }
                                if(!empty($image_name5)) {
                                move_uploaded_file($image_temp5,'uploads/images/'.$image_file5);
                                create_thumbnail('uploads/images/'.$image_file5, 'uploads/thumbs/'.$image_file5,100,100);
                                }
                                if($query_run) {
                                    $total_ad = $total_ad +1;
                                    $query1 = "UPDATE user_information SET total_ad = '$total_ad' WHERE id = '$userid' ";
                                    $query_run1 = mysql_query($query1);
                                    header('Location:post_ad_success.php');
                                } else {
                                    echo '<h1 style="text-align:center; color: yellow;">Sorry, we couldn\'t post your Ad at this time. Try again later.</h1>';
                                }
                            }
                        }
                    }  else {
                        echo '<h1 style="text-align:center; color: red;">Please choose atleast one image for your Ad.</h1>';
                    }                 
                }
            }else {
                echo '<h1 style="text-align:center; color:red;">All fields are required</h1>';
            }
        }
        ?>
        <?php 
        if(loggedin()) {
        ?>
        <div class="post_content" >
        <h1 style="font-size: 40px; color:#0099e5"> Post an Ad </h1>  
            <div class="post_container">
                <form action="post_ad.php" method="POST" enctype="multipart/form-data">
                    <div class="col-3"><label class="adjust"> <strong>Select Category </strong><span>*</span></label></div>
                    <div class="col-8 ">
                        <select class="col-3" name="category_name">
                            <option style="display:none; color:#eee" required>Select Category</option>
                                <optgroup label="Mobiles">
                                    <option>Mobile Phones</option>  
                                    <option>Tablets</option>
                                </optgroup>
                                <optgroup label="Vehicles">
                                    <option>Cars </option>    
                                    <option>Bikes & Scooters</option>
                                    <option>Other Vehicles</option>
                                    <option>Spare Parts</option>
                                </optgroup>
                                <optgroup label="Electronics & Appliances">
                                    <option>Computers & Accessories</option>
                                    <option>Tv - Video - Audio</option>
                                    <option>Cameras & Accessories</option>
                                    <option>Games & Entertainment</option>
                                    <option>Fridge - AC - Washing Machine</option>
                                    <option>Kitchen & Other Appliances</option>
                                </optgroup>
                                <optgroup label="Bookks, Sports & Hobbies">
                                    <option>Books & Magazines</option>
                                    <option>Sports Equipment</option>
                                    <option>Musical Instruments</option>
                                    <option>Gym & Fitness</option>
                                    <option>Other Hobbies</option>    
                                </optgroup>
                                <optgroup label="Kids">
                                    <option>Furniture And Toys</option>
                                    <option>Prams & Walkers</option>  
                                    <option>Other Things</option>
                                </optgroup>
                                <optgroup label="Furnitures">
                                    <option>Sofa & Dining</option>
                                    <option>Beds & Wardrobes</option>
                                    <option>Home Decor & Garden</option>
                                    <option>Other Household Items</option>   
                                </optgroup>
                                <optgroup label="Fashion">
                                    <option>Clothes</option>
                                    <option>Footwear</option>
                                    <option>Others</option>
                                </optgroup>
                                <optgroup label="Jobs">
                                    <option>Customer Service</option>
                                    <option>IT</option>
                                    <option>Online</option>
                                    <option>Marketing & Advertising</option>
                                    <option>Sales</option>
                                    <option>Human Resources</option>
                                    <option>Education</option>
                                    <option>Hotels & Tourism</option> 
                                    <option>Accounting & Finance</option>
                                    <option>Manufacturing</option> 
                                    <option>Part - Time</option>
                                    <option>Other Jobs</option>           
                                </optgroup>
                                <optgroup label="Services">
                                    <option>Education & Classes</option>
                                    <option>Electronics & Computer Repair</option>
                                    <option>Maids & Domestics Help</option>
                                    <option>Health & Beauty</option>
                                    <option>Drivers & Taxi</option>
                                    <option>Other Services</option>     
                                </optgroup>
                                <optgroup label="Real Estate">
                                    <option>Houses</option>
                                    <option>Apartments</option>
                                    <option>Land & Plots</option>
                                    <option>Shops - Offices - Commercial Space</option>
                                    <option>Vacation Rentals - Guest Houses</option>
                                </optgroup>
                        </select>
                    </div><br><br><br><br>
                    <div class="col-3"><label class="adjust"><strong>Ad Title</strong><span>*</span></label></div>
                    <div class="col-8"><input class="col-8" maxlength="75" type="text" name="title" required value="<?php if (isset($title)) {echo $title; } ?>"></div><br><br><br><br>
                    <div class="col-3"><label class="adjust"><strong> Ad Description </strong><span>*</span></label></div>
                    <div class="col-8"><textarea placeholder="Write few lines about your product" maxlength="500" name="ad_description" class="col-8" required ><?php if (isset($ad_description)) {echo $ad_description; } ?></textarea></div><br><br><br><br>
                    <div class="col-3"><label class="adjust"><strong>Price in Rs.</strong><span>*</span></label></div>
                    <div class="col-8"><input class="col-8" type="text" name="price" required value="<?php if (isset($price)) {echo $price; } ?>"></div><br><br><br><br>
                    <div class="col-3"><label class="adjust"><strong>Condition</strong><span>*</span></label></div>
                    <div class="col-8"><input class="col-8" type="text" maxlength="10" name="condition" required value="<?php if (isset($condition)) {echo $condition; } ?>"></div><br><br><br><br><br>
                    <div>
                        <div class="col-3"><label class="adjust"><strong> Photos for your ad :</strong> </label></div>
                            <div class="col-8">
                                Image 1:<input type="file" name="image1" ><br><br>
                                Image 2:<input type="file" name="image2" ><br><br>
                                Image 3:<input type="file" name="image3" ><br><br>
                                Image 4:<input type="file" name="image4" ><br><br>
                                Image 5:<input type="file" name="image5" ><br><br>    
                            </div>
                        </div><br><br><br><br><br>
                        <div>
                            <div class="col-3"><label class="adjust"><strong> Your Name </strong><span>*</span></label></div>
                            <div class="col-8"><input type="text" class="col-8" maxlength="40" name="name" required value="<?php if (isset($name)) {echo $name; } ?>"></div><br><br><br><br>
                            <div class="col-3"><label class="adjust"> <strong>Your Mobile No</strong> <span>*</span></label></div>
                            <div class="col-8"><input type="tel" class="col-8" maxlength="13" name="contact_num" required value="<?php if (isset($contactnum)) {echo $contactnum; } ?>"></div><br><br><br><br>
                            <div class="col-3"><label class="adjust"><strong>Your Email Address</strong><span>*</span></label></div>
                            <div class="col-8"><input type="email" class="col-8" maxlength="50" name= "email" required value="<?php if (isset($email)) {echo $email; } ?>"> </div><br><br><br><br>
                            <div class="col-3"></div>
                            <div class="col-8">
                                <p> By clicking <strong>post button</strong> you accept our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a></p><br><br>
                                <input class="postbtn" type="submit" value="Post" class="adjust">   
                            </div>      
                        </div>
                </form>
            </div>
        </div>
    <?php
    } else {
    ?>
    <h1 style="text-align:center;">You Must <a href="sign_in.php" style="color:red;">Log In</a> First</h1>
    <?php
    }
    ?> 
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