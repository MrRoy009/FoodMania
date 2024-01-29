
<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Restaurants || Easy Ordering & Complete Restaurant Guide - Web Pirates</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body style="font-family: 'Pangolin', cursive;">

    <div id='preloader'>
        <div id='loader'>
          <span class='loader'>
            <span class='loader-inner'></span>
          </span>
        </div>
    </div>

<header id="header" class="header-scroll top-header headrom" style="background-color:rgba(255, 255, 255, 0.7); box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);">

    <nav class="navbar navbar-dark">
        <div class="container">
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
            <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/food-mania-logo.png" alt="" > </a>
            <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item"> <a class="nav-link active" style="color: black;" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                    <li class="nav-item"> <a class="nav-link active" style="color: black;" href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>

                    <?php
                    if(empty($_SESSION["user_id"]))
                        {
                            echo '<li class="nav-item"><a href="login.php" style="color: black;" class="nav-link active">Login</a> </li>
                        <li class="nav-item"><a href="registration.php" style="color: black;" class="nav-link active">Register</a> </li>';
                        }
                    else
                        {
                                
                                
                                echo  '<li class="nav-item"><a href="your_orders.php" style="color: black;" class="nav-link active">My Orders</a> </li>';
                                echo  '<li class="nav-item"><a href="logout.php" style="color: black;" class="nav-link active">Logout</a> </li>';
                        }

                    ?>

                </ul>
            </div>
        </div>
    </nav>

</header>
    <div class="page-wrapper">
        <div class="top-links">
            <div class="container">
                <ul class="row links">

                    <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="#">Choose Restaurant</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Pick Your favorite food</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay</a></li>
                </ul>
            </div>
        </div>
        <div class="inner-page-hero bg-image" data-image-src="images/img/food2003.jpg">
            <div class="container"> </div>
        </div>
        <div class="result-show">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </div>
        

        <section class="restaurants-page">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                        <div class="bg-gray restaurant-entry">
                            <div class="row">
                                <?php $ress= mysqli_query($db,"select * from restaurant");
									      while($rows=mysqli_fetch_array($ress))
										  {
													
						
													 echo' <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
															<div class="entry-logo">
																<a class="img-fluid" href="dishes.php?res_id='.$rows['rs_id'].'" > <img src="admin/Res_img/'.$rows['image'].'" alt="Food logo"></a>
															</div>
															<!-- end:Logo -->
															<div class="entry-dscr">
																<h5><a href="dishes.php?res_id='.$rows['rs_id'].'" >'.$rows['title'].'</a></h5> <span>'.$rows['address'].'</span>
																
															</div>
															<!-- end:Entry description -->
														</div>
														
														 <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
																<div class="right-content bg-white">
																	<div class="right-review">
																		
																		<a href="dishes.php?res_id='.$rows['rs_id'].'" class="btn btn-purple">View Menu</a> </div>
																</div>
																<!-- end:right info -->
															</div>';
										  }
						
						
						?>

                            </div>

                        </div>



                    </div>


                    

                </div>
            </div>
    </div>
    </section>

    <style>
    .navbar-nav a {
    font-weight: 500;
    letter-spacing: 0.6px;
    position: relative;
    text-decoration: none;
}

.navbar-nav a:before {
    content: "";
    position: absolute;
    bottom: -2px;
    height: 2px;
    width: 0;
    background: black;
    border-radius: 50px;
    transition: width 0.3s ease;
}

.navbar-nav a:hover:before {
    width: 100%;
}


#preloader {
    position: fixed;
    z-index: 1800;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #010079;
    }
    .no-js #preloaders,
    .oldie #preloaders {
    display: none
    }
    #loader {
    position: absolute;
    top: calc(50% - 1.25em);
    left: calc(50% - 1.25em);
    }
    .loader {
    display: inline-block;
    width: 30px;
    height: 30px;
    position: relative;
    border: 4px solid #Fff;
    top: 50%;
    animation: loader 2s infinite ease;
    }
    .loader-inner {
    vertical-align: top;
    display: inline-block;
    width: 100%;
    background-color: #fff;
    animation: loader-inner 2s infinite ease-in;
    }
    @keyframes loader {
    0% {
    transform: rotate(0deg);
    }
    25% {
    transform: rotate(180deg);
    }
    50% {
    transform: rotate(180deg);
    }
    75% {
    transform: rotate(360deg);
    }
    100% {
    transform: rotate(360deg);
    }
    }
    @keyframes loader-inner {
    0% {
    height: 0%;
    }
    25% {
    height: 0%;
    }
    50% {
    height: 100%;
    }
    75% {
    height: 100%;
    }
    100% {
    height: 0%;
    }
    }

    .disappear {
        animation: vanish 1s forwards;
        animation-delay: 0.3s;
    }

    @keyframes vanish {
        100%{
            opacity: 0;
            visibility: hidden;
        }
    }


</style>

    <script>
        var loader = document.querySelector("#preloader")

        window.addEventListener("load", vanish);

        function vanish(){
            loader.classList.add("disappear");
        }
    </script>

    <?php include "include/footer.php" ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>


</html>