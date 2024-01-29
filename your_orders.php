
<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if(empty($_SESSION['user_id']))  
{
	header('location:login.php');
}
else
{
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>My Orders || Easy Ordering & Complete Restaurant Guide - Web Pirates</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css" rel="stylesheet">
    .indent-small {
        margin-left: 5px;
    }

    .form-group.internal {
        margin-bottom: 0;
    }

    .dialog-panel {
        margin: 10px;
    }

    .datepicker-dropdown {
        z-index: 200 !important;
    }

    .panel-body {
        background: #e5e5e5;
        /* Old browsers */
        background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
        /* FF3.6+ */
        background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
        /* Chrome,Safari4+ */
        background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
        /* Chrome10+,Safari5.1+ */
        background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
        /* Opera 12+ */
        background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
        /* IE10+ */
        background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
        /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
        font: 600 15px "Open Sans", Arial, sans-serif;
    }

    label.control-label {
        font-weight: 600;
        color: #777;
    }

    /* 
table { 
	width: 750px; 
	border-collapse: collapse; 
	margin: auto;
	
	}

/* Zebra striping */
    /* tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #404040; 
	color: white; 
	font-weight: bold; 
	
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 14px;
	
	} */
    @media only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px) {

        /* table { 
	  	width: 100%; 
	}

	
	table, thead, tbody, th, td, tr { 
		display: block; 
	} */


        /* thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; } */

        /* td { 
		
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}

	td:before { 
		
		position: absolute;
	
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		
		content: attr(data-column);

		color: #000;
		font-weight: bold;
	} */

    }


    </style>

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



        <div class="inner-page-hero bg-image" data-image-src="images/img/food.jpg">
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
                    <div class="col-xs-12">
                    </div>
                    <div class="col-xs-12">
                        <div class="bg-gray">
                            <div class="row">

                                <table class="table table-bordered table-hover">
                                    <thead style="background: #404040; color:white;">
                                        <tr>

                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php 
				
						$query_res= mysqli_query($db,"select * from users_orders where u_id='".$_SESSION['user_id']."'");
												if(!mysqli_num_rows($query_res) > 0 )
														{
															echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
														}
													else
														{			      
										  
										  while($row=mysqli_fetch_array($query_res))
										  {
						
							?>
                                        <tr>
                                            <td data-column="Item"> <?php echo $row['title']; ?></td>
                                            <td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
                                            <td data-column="price">₹<?php echo $row['price']; ?></td>
                                            <td data-column="status">
                                                <?php 
																			$status=$row['status'];
																			if($status=="" or $status=="NULL")
																			{
																			?>
                                                <button type="button" class="btn btn-info"><span class="fa fa-bars" aria-hidden="true"></span> Dispatch</button>
                                                <?php 
																			  }
																			   if($status=="in process")
																			 { ?>
                                                <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span> On The Way!</button>
                                                <?php
																				}
																			if($status=="closed")
																				{
																			?>
                                                <button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true"></span> Delivered</button>
                                                <?php 
																			} 
																			?>
                                                <?php
																			if($status=="rejected")
																				{
																			?>
                                                <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button>
                                                <?php 
																			} 
																			?>






                                            </td>
                                            <td data-column="Date"> <?php echo $row['date']; ?></td>
                                            <td data-column="Action"> <a href="delete_orders.php?order_del=<?php echo $row['o_id'];?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a>
                                            </td>

                                        </tr>


                                        <?php }} ?>




                                    </tbody>
                                </table>



                            </div>

                        </div>



                    </div>



                </div>
            </div>
    </div>
    </section>


    <?php include "include/footer.php" ?>

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
        animation-delay: 0.1s;
    }

    @keyframes vanish {
        100%{
            opacity: 0;
            visibility: hidden;
        }
    }


</style>

    </div>


    <script>
        var loader = document.querySelector("#preloader")

        window.addEventListener("load", vanish);

        function vanish(){
            loader.classList.add("disappear");
        }
    </script>

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
<?php
}
?>