<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();


function function_alert() { 
      

    echo "<script>alert('Thank you. Your Order has been placed!');</script>"; 
    echo "<script>window.location.replace('your_orders.php');</script>"; 
} 

if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
else{

										  
												foreach ($_SESSION["cart_item"] as $item)
												{
											
												$item_total += ($item["price"]*$item["quantity"]);
												
													if($_POST['submit'])
													{
						
													$SQL="insert into users_orders(u_id,title,quantity,price) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."')";
						
														mysqli_query($db,$SQL);
														
                                                        
                                                        unset($_SESSION["cart_item"]);
                                                        unset($item["title"]);
                                                        unset($item["quantity"]);
                                                        unset($item["price"]);
														$success = "Thank you. Your order has been placed!";

                                                        function_alert();

														
														
													}
												}
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Checkout || Easy Ordering & Complete Restaurant Guide - Web Pirates</title>
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
    
    <div class="site-wrapper">
    <header id="header" class="header-scroll top-header headrom" style="background-color:rgba(255, 255, 255, 0.7); box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);">
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/food-mania-logo.png" alt="" width="100%"> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" style="color:black;" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" style="color:black;" href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>

                            <?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li class="nav-item"><a href="login.php" style="color:black;" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" style="color:black;" class="nav-link active">Register</a> </li>';
							}
						else
							{
									
									
										echo  '<li class="nav-item"><a href="your_orders.php" style="color:black;" class="nav-link active">My Orders</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" style="color:black;" class="nav-link active">Logout</a> </li>';
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

                        <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Choose Restaurant</a></li>
                        <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pick Your favorite food</a></li>
                        <li class="col-xs-12 col-sm-4 link-item active"><span>3</span><a href="checkout.php">Order and Pay</a></li>
                    </ul>
                </div>
            </div>

            <div class="container">

                <span style="color:green;">
                    <?php echo $success; ?>
                </span>

            </div>


            

            <div class="container m-t-30">
                <form action="" method="post">
                    <div class="widget clearfix">

                    <div class="widget-body">
    <form method="post" action="#">
        <div class="row">
            <div class="col-sm-12">
                <div class="cart-totals margin-b-20">
                    <div class="cart-totals-title">
                        <h4>Cart Summary</h4>
                    </div>
                    <div class="cart-totals-fields">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Cart Subtotal</td>
                                    <td><?php echo "₹" . $item_total; ?></td>
                                </tr>
                                <tr>
                                    <td>Delivery Charges</td>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <td class="text-color"><strong>Total</strong></td>
                                    <td class="text-color"><strong><?php echo "₹" . $item_total; ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="payment-option">
                    <ul class="list-unstyled">
                        <li>
                            <label class="custom-control custom-radio m-b-20">
                                <input name="mod" id="radioCOD" checked value="COD" type="radio" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Cash on Delivery</span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-control custom-radio m-b-10">
                                <input name="mod" id="radioOnlinePayment" value="OnlinePayment" type="radio" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Online Payment <img src="" alt="" srcset="" width="8%"></span>

                                <form>
                <button id="rzp-button1">
                  <i class="fas fa-donate"></i>&nbsp;&nbsp;Pay
                </button>
                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                <script>
                  var options = {
                    key: "rzp_test_EvRTIN6g610RnT", 
                    amount: "<?php echo ($item_total) * 100; ?>", 
                    currency: "INR",
                    name: "Web Pirates",
                    description: "Pay using Razor Pay",
                    handler: function (response) {
                      if (
                        typeof response.razorpay_payment_id == "undefined" ||
                        response.razorpay_payment_id < 1
                      ) {
                        swal({
                          title: "Please try again later!",
                          icon: "error",
                          button: "Close",
                        });
                      } else {
                        swal({
                          title: "Thank You!",
                          icon: "success",
                          button: "Close",
                        });
                      }
                    },
                    theme: {
                      color: "#3399cc",
                    },
                  };
                  var rzp1 = new Razorpay(options);
                  document.getElementById("rzp-button1").onclick = function (
                    e
                  ) {
                    rzp1.open();
                    e.preventDefault();
                  };
                </script>
              </form>
                                
                            </label>
                        </li>
                    </ul>

                    

                    
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    #rzp-button1 {
    background-color: #e91e63;
    color: #ffffff;
    font-family: 'Poppins', sans-serif;
    cursor: pointer;
    font-size: 15px !important;
    text-transform: uppercase;
    font-weight: 550;
    line-height: 30px;
    text-align: center;
    padding: 7px 12px;
    margin-top: 25px;
    border: 2px solid transparent;
    background: #e91e63;
    box-shadow: inset 5px 5px 10px #5d0c28, inset -5px -5px 10px #ff309e;
    border-radius: 30px !important;
}

#rzp-button1:hover {
    background-color: #b60c45;
}

#button {
    display: inline-block;
    background-color: #877ba1;
    width: 50px;
    height: 50px;
    text-align: center;
    border-radius: 4px;
    position: fixed;
    bottom: 30px;
    right: 30px;
    transition: background-color .3s, opacity .5s, visibility .5s;
    opacity: 0;
    visibility: hidden;
    z-index: 1000;
}

#button::after {
    content: "\f077";
    font-family: FontAwesome;
    font-weight: normal;
    font-style: normal;
    font-size: 2em;
    line-height: 50px;
    color: #fff;
}

#button:hover {
    cursor: pointer;
    background-color: #333;
}

#button:active {
    background-color: #555;
}

#button.show {
    opacity: 1;
    visibility: visible;
}
</style>


<div class="wrapper">
<header>Upload screenshot</header>
<form action="#" id="uploadDocument">
<input class="file-input" type="file" name="file" hidden>
<i class="fas fa-cloud-upload-alt"></i>
<p >Browse File to Upload</p>
</form>
<section class="progress-area"></section>
<section class="uploaded-area"></section>
</div>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
*{
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: "Poppins", sans-serif;
}


::selection{
color: #fff;
background: #6990F2;
}
.wrapper{
width: 330px;
background: #fff;
border-radius: 5px;
padding: 30px;
box-shadow: 7px 7px 12px rgba(0,0,0,0.05);
}
.wrapper header{
color: #6990F2;
font-size: 17px;
font-weight: 600;
text-align: center;
}
.wrapper form{
height: 60px;
display: flex;
cursor: pointer;
margin: 30px 0;
align-items: center;
justify-content: center;
flex-direction: column;
border-radius: 5px;
border: 2px dashed #6990F2;
}
form :where(i, p){
color: #6990F2;
}
form i{
font-size: 50px;
}
form p{
margin-top: 15px;
font-size: 16px;
}

section .row{
margin-bottom: 10px;
background: #E9F0FF;
list-style: none;
padding: 15px 20px;
border-radius: 5px;
display: flex;
align-items: center;
justify-content: space-between;
}
section .row i{
color: #6990F2;
font-size: 30px;
}
section .details span{
font-size: 14px;
}
.progress-area .row .content{
width: 100%;
margin-left: 15px;
}
.progress-area .details{
display: flex;
align-items: center;
margin-bottom: 7px;
justify-content: space-between;
}
.progress-area .content .progress-bar{
height: 6px;
width: 100%;
margin-bottom: 4px;
background: #fff;
border-radius: 30px;
}
.content .progress-bar .progress{
height: 100%;
width: 0%;
background: #6990F2;
border-radius: inherit;
}
.uploaded-area{
max-height: 232px;
overflow-y: scroll;
}
.uploaded-area.onprogress{
max-height: 150px;
}
.uploaded-area::-webkit-scrollbar{
width: 0px;
}
.uploaded-area .row .content{
display: flex;
align-items: center;
}
.uploaded-area .row .details{
display: flex;
margin-left: 15px;
flex-direction: column;
}
.uploaded-area .row .details .size{
color: #404040;
font-size: 11px;
}
.uploaded-area i.fa-check{
font-size: 16px;
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

<script>
const form = document.querySelector("form"),
    fileInput = document.querySelector(".file-input"),
    progressArea = document.querySelector(".progress-area"),
    uploadedArea = document.querySelector(".uploaded-area");

document.querySelector("#uploadDocument").addEventListener("click", () => {
    fileInput.click();
});

fileInput.addEventListener("change", ({ target }) => {
    let file = target.files[0];
    if (file) {
        let fileName = file.name;
        if (fileName.length >= 12) {
            let splitName = fileName.split('.');
            fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
        }
        uploadFile(file, fileName);
    }
});

function uploadFile(file, name) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/upload.php");
    xhr.upload.addEventListener("progress", ({ loaded, total }) => {
        let fileLoaded = Math.floor((loaded / total) * 100);
        let progressHTML = `<li class="row">
        <i class="fas fa-file-alt"></i>
        <div class="content">
        <div class="details">
        <span class="name">${name} • Uploading</span>
        <span class="percent">${fileLoaded}%</span>
        </div>
        <div class="progress-bar">
        <div class="progress" style="width: ${fileLoaded}%"></div>
        </div>
        </div>
        </li>`;
        uploadedArea.classList.add("onprogress");
        progressArea.innerHTML = progressHTML;
        if (loaded == total) {
            let fileSize;
            (total < 1024) ? fileSize = total + " B" :
                (total < 1024 * 1024) ? fileSize = (total / 1024).toFixed(2) + " KB" :
                    fileSize = (total / (1024 * 1024)).toFixed(2) + " MB";

            progressArea.innerHTML = "";
            let uploadedHTML = `<li class="row">
            <div class="content upload">
            <i class="fas fa-file-alt"></i>
            <div class="details">
            <span class="name">${name} • Uploaded</span>
            <span class="size">${fileSize}</span>
            </div>
            </div>
            <i class="fas fa-check"></i>
            </li>`;
            uploadedArea.classList.remove("onprogress");
            uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
        }
    });
    let data = new FormData(form);
    data.append('file', file);
    xhr.send(data);
}

var loader = document.querySelector("#preloader")

window.addEventListener("load", vanish);

function vanish() {
    loader.classList.add("disappear");
}


</script>

<div>


        </ul>
        




                                            <p class="text-xs-center"> <input type="submit" onclick="return confirm('Do you want to confirm the order?');" name="submit" class="btn btn-success btn-block" value="Order Now"> </p>
                                        </div>


                                        
                            </form>
                        </div>
                    </div>

                        </div>

        </div>
        </form>
    </div>
    
    <?php include "include/footer.php" ?>
    </div>
    </div>


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
</style>



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
