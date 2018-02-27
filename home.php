<!DOCTYPE html>
<html>
    <head>
        <title>home_page</title>
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
                    ?>
                        <li class="navitem floatright" style="cursor: pointer; padding-top:5px;"><a href="user.php"> <b style="color:red; text-transform: uppercase;"><?php echo $username ?></b></a></li>
                        <li class="floatright">
                            <a href="post_ad.php"> <button type="submit" class="btn btn-default decorbtn">Post Free Ad<span></span></button> </a>
                        </li>
                        <li class="floatright adjust-at-center"> 
                            <form class="navbar-form ">
                                <input type="text" class="form-control" placeholder="search">
                                <span><button type="submit" class="btn btn-default"><img src="icon/search-icon.png" height="25px" width="25px"></button></span>
                            </form>
                        </li>
                        <li class="navitem floatright" ><a href="#"><img src="icon/help.png" height="25px" width="25px">Help</a></li>                       
                    <?php
                    } else {
                    ?>
                        <li class="floatright">
                            <a href="post_ad.php"> <button type="submit" class="btn btn-default decorbtn">Post Free Ad<span></span></button> </a>
                        </li>
                        <li class="floatright adjust-at-center"> 
                            <form class="navbar-form ">
                                <input type="text" class="form-control" placeholder="search">
                                <span><button type="submit" class="btn btn-default"><img src="icon/search-icon.png" height="25px" width="25px"></button></span>
                            </form>
                        </li>
                        <li class="navitem floatright" ><a href="#"><img src="icon/help.png" height="25px" width="25px">Help</a></li>
                        <li class="navitem floatright" style="cursor: pointer;" ><a href="sign_in.php"><img src="icon/sign in.png" height="25px" width="25px"> Log In</a></li>
                    <?php
                    }
                    ?>
                    <li class="icon floatright ">
                        <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
                    </li>
                </ul>
            </div>
            <!-- //Navigation -->

            <!-- image slideshow at homepage -->
            <div class="mainslide-container">
                <div class="img-container fades background">
                    <img id="img1" src="images/slideshow/mainbig.jpg" style="width:100%;" >
					<img id="img2" src="images/slideshow/mainsmall.jpg" style="width:100%;" >
                    <div class="layer"></div>
                     <div class="text"> 
                        <h3> ADVERTISE AND SELL ANYTHING ONLINE</h3>
                       <h4> <a>Browse all Categories</a></h4>
                    </div>
                </div>
                <div class="img-container fades background">
                    <img id="img1" src="images/slideshow/mobilebig.jpg" style="width:100%;" >
					<img id="img2" src="images/slideshow/mobilesmall.jpg" style="width:100%;" >
                    <div class="layer"></div>
                    <div class="text"> 
                        <h3> ADVERTISE AND SELL ANYTHING ONLINE</h3>
                       <h4> <a href="mobile.php">Browse all Categories</a></h4>
                    </div>
                </div>
                <div class="img-container fades background">
                    <img id="img1" src="images/slideshow/vehiclebig.jpg" style="width:100%;" >
					<img id="img2" src="images/slideshow/vehiclesmall.jpg" style="width:100%;" >
                    <div class="layer"></div>
                     <div class="text"> 
                        <h3> ADVERTISE AND SELL ANYTHING ONLINE</h3>
                       <h4> <a href="vehicle.php">Browse all Categories</a></h4>
                    </div>
                </div>
                <div class="img-container fades background">
                    <img id="img1" src="images/slideshow/electronicbig.jpg" style="width:100%;" >
					<img id="img2" src="images/slideshow/electronicsmall.jpg" style="width:100%;" >
                    <div class="layer"></div>
                    <div class="text"> 
                        <h3> ADVERTISE AND SELL ANYTHING ONLINE</h3>
                       <h4> <a href="electronics.php">Browse all Categories</a></h4>
                    </div>
                </div>
                <div class="img-container fades background">
                    <img id="img1" src="images/slideshow/furniturebig.jpg" style="width:100%;" >
					<img id="img2" src="images/slideshow/furnituresmall.jpg" style="width:100%;" >
                    <div class="layer"></div>
                    <div class="text"> 
                        <h3> ADVERTISE AND SELL ANYTHING ONLINE</h3>
                       <h4> <a href="furnitures.php">Browse all Categories</a></h4>
                    </div>
                </div>
                <div class="img-container fades background">
                    <img id="img1" src="images/slideshow/bshbig.jpg" style="width:100%;" >
					<img id="img2" src="images/slideshow/bshsmall.jpg" style="width:100%;" >
                    <div class="layer"></div>
                    <div class="text"> 
                        <h3> ADVERTISE AND SELL ANYTHING ONLINE</h3>
                       <h4> <a href="books.php">Browse all Categories</a></h4>
                    </div>
                </div>
                <div class="img-container fades background">
                    <img id="img1" src="images/slideshow/fashionbig.jpg" style="width:100%;" >
					<img id="img2" src="images/slideshow/fashionsmall.jpg" style="width:100%;" >
                    <div class="layer"></div>
                    <div class="text"> 
                    <h3> ADVERTISE AND SELL ANYTHING ONLINE</h3>
                       <h4> <a href="fashion.php">Browse all Categories</a></h4>
                    </div>
                </div>
                <div class="img-container fades background">
                    <img id="img1" src="images/slideshow/realestatebig.jpg" style="width:100%;" >
					<img id="img2" src="images/slideshow/realestatesmall.jpg" style="width:100%;" >
                    <div class="layer"></div>
                    <div class="text"> 
                    <h3> ADVERTISE AND SELL ANYTHING ONLINE</h3>
                       <h4> <a href="realestate.php">Browse all Categories</a></h4>
                    </div>
                </div>
                <div class="img-container fades background">
                    <img id="img1" src="images/slideshow/jobbig.jpg" style="width:100%;" >
					<img id="img2" src="images/slideshow/jobsmall.jpg" style="width:100%;" >
                    <div class="layer"></div>
                    <div class="text"> 
                    <h3> ADVERTISE AND SELL ANYTHING ONLINE</h3>
                       <h4> <a href="jobs.php">Browse all Categories</a></h4>
                    </div>
                </div>
                <div class="img-container fades background">
                    <img id="img1" src="images/slideshow/servicebig.jpg" style="width:100%;" >
					<img id="img2" src="images/slideshow/servicesmall.jpg" style="width:100%;" >
                    <div class="layer"></div>
                    <div class="text"> 
                    <h3> ADVERTISE AND SELL ANYTHING ONLINE</h3>
                       <h4> <a href="services.php">Browse all Categories</a></h4>
                    </div>
                </div>
                <div class="img-container fades background">
                    <img id="img1" src="images/slideshow/kidbig.jpg" style="width:100%;" >
					<img id="img2" src="images/slideshow/kidsmall.jpg" style="width:100%;" >
                    <div class="layer"></div>
                    <div class="text"> 
                    <h3> ADVERTISE AND SELL ANYTHING ONLINE</h3>
                       <h4> <a href="kids.php">Browse all Categories</a></h4>
                    </div>
                </div>
              <!-- this code is used for manual slideshow -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a> 
                
            </div>
            <br>
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(4)"></span>
                <span class="dot" onclick="currentSlide(5)"></span>
                <span class="dot" onclick="currentSlide(6)"></span>
                <span class="dot" onclick="currentSlide(7)"></span>
                <span class="dot" onclick="currentSlide(8)"></span>
                <span class="dot" onclick="currentSlide(9)"></span>
                <span class="dot" onclick="currentSlide(10)"></span>
                <span class="dot" onclick="currentSlide(11)"></span>
            </div>
             <!-- //image slideshow at homepage -->
            <br><br><br>
            <div>
                <h1 class="af-bf"><span>Browse<br/>Categories</span></h1>
                <div style="text-align:center; margin-left:5%; margin-right:5%">
                    <div class="col-3 browseitem">
                        <a href="mobile.php"> 
                        <div class="decoratebox">
                            <img src="icon/mobicon.png" height="80px" width="80px">
                            <h4>mobiles</h4>
                        </div>
                         </a>
                    </div>

                    <div class="col-3 browseitem"> 
                        <a href="vehicle.php">
                        <div class="decoratebox">
                            <img src="icon/vehicleicon.png" height="80px" width="80px">
                            <h4>vehicle</h4>
                        </div>
                        </a>
                        
                        
                    </div>

                    <div class="col-3 browseitem"> 
                        <a href="furnitures.php">
                        <div class="decoratebox">
                            <img src="icon/furnitureicon.png" height="80px" width="80px">
                             <h4>Furnitures</h4>
                        </div>  
                        </a>
                    </div>

                    <div class="col-3 browseitem"> 
                        <a href="fashion.php">
                        <div class="decoratebox">
                            <img src="icon/fashionicon.png" height="80px" width="80px">
                              <h4>Fashion</h4>
                        </div>
                        </a>
                    </div>

                    <div class="col-3 browseitem">
                        <a href="services.php">
                        <div class="decoratebox">
                            <img src="icon/serviceicon.png" height="80px" width="80px">
                            <h4>Services</h4>
                        </div>
                        </a> 
                    </div>

                    <div class="col-3 browseitem">
                        <a href="jobs.php">
                        <div class="decoratebox">
                            <img src="icon/jobsicon.png" height="80px" width="80px">
                            <h4>Jobs</h4> 
                        </div> 
                        </a>
                    </div>

                    <div class="col-3 browseitem">
                        <a href="kids.php">
                        <div class="decoratebox">
                            <img src="icon/kidsicon.png" height="80px" width="80px">
                            <h4>Kids</h4>
                        </div>
                         </a>  
                    </div>

                    <div class="col-3 browseitem">
                        <a href="realestate.php">
                        <div class="decoratebox">
                            <img src="icon/realestateicon.png" height="80px" width="80px">
                            <h4>Real Estate</h4> 
                        </div> 
                        </a>
                    </div>

                    <div class="col-3 browseitem">
                        <a href="books.php">
                        <div class="decoratebox">
                            <img src="icon/bshicon.png" height="80px" width="80px">
                            <h4>Books, Sports & Hobbies</h4> 
                        </div>
                        </a> 
                    </div>
                    
                    <div class="col-3 browseitem">
                        <a href="electronics.php">
                        <div class="decoratebox">
                            <img src="icon/electronicicon.png" height="80px" width="80px">
                            <h4>Electronics and Appliances</h4> 
                        </div>
                        </a> 
                    </div>
                </div>
            </div>
            <br><br><br>



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

            /*for image slideshow at home page */
           
            /*for manual slideshow*/
           var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n){
                showSlides(slideIndex += n);
            }

            function currentSlide(n){
                showSlides(slideIndex = n);
            }

            function showSlides(n){
                var i;
                var slides = document.getElementsByClassName("img-container");
                var dots = document.getElementsByClassName("dot");
                
                if (n > slides.length){slideIndex = 1}
                if(n < 1){slideIndex = slides.length}
                for(i = 0; i < slides.length; i++){
                    slides[i].style.display = "none";
                }
                for(i = 0; i < dots.length; i++){
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block";
                dots[slideIndex-1].className += " active";
            }
            
            /*for auto slideshow*/

           /* var autoslideIndex = 0;
            autoshowSlides();

            function autoshowSlides() {
                var i;
                var autoslides = document.getElementsByClassName("img-container");
                var autodots = document.getElementsByClassName("dot");
                for (i = 0; i < autoslides.length; i++) {
                autoslides[i].style.display = "none";  
                }
                autoslideIndex++;
                if (autoslideIndex> autoslides.length) {autoslideIndex = 1}    
                for (i = 0; i < autodots.length; i++) {
                    autodots[i].className = autodots[i].className.replace(" active", "");
                }
                autoslides[autoslideIndex-1].style.display = "block";  
                autodots[autoslideIndex-1].className += " active";
               setTimeout(autoshowSlides, 5000); // Change image every 5 seconds
            }*/


        </script>
    </body>
</html>