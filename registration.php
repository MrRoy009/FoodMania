
<!DOCTYPE html>
<html lang="en">
<?php

session_start(); 
error_reporting(0); 
include("connection/connect.php"); 
if(isset($_POST['submit'] )) 
{
     if(empty($_POST['firstname']) || 
   	    empty($_POST['lastname'])|| 
		empty($_POST['email']) ||  
		empty($_POST['phone'])||
		empty($_POST['password'])||
		empty($_POST['cpassword']) ||
		empty($_POST['cpassword']))
		{
			$message = "All fields must be Required!";
		}
	else
	{
	
	$check_username= mysqli_query($db, "SELECT username FROM users where username = '".$_POST['username']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
		

	
	if($_POST['password'] != $_POST['cpassword']){  
       	
          echo "<script>alert('Password not match');</script>"; 
    }
	elseif(strlen($_POST['password']) < 6)  
	{
      echo "<script>alert('Password Must be >=6');</script>"; 
	}
	elseif(strlen($_POST['phone']) < 10)  
	{
      echo "<script>alert('Invalid phone number!');</script>"; 
	}

    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    {
          echo "<script>alert('Invalid email address please type a valid email!');</script>"; 
    }
	elseif(mysqli_num_rows($check_username) > 0) 
     {
       echo "<script>alert('Username Already exists!');</script>"; 
     }
	elseif(mysqli_num_rows($check_email) > 0) 
     {
       echo "<script>alert('Email Already exists!');</script>"; 
     }
	else{
       
	 
	$mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address) VALUES('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['phone']."','".md5($_POST['password'])."','".$_POST['address']."')";
	mysqli_query($db, $mql);
	
		 header("refresh:0.1;url=login.php");
    }
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
    <title>Registration</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
</head>


<body>
    

    

<title>
        Sign Up
      </title>
      
      <div class="login-box">
        <h2>REGISTER</h2>
        <form action="" method="post">
      
          <div class="name">
            <input type="text" id="firstName" name="username" required="">
            <label>Username</label>
          </div>
          <div class="name">
            <input type="text" id="firstName" name="firstname" required="">
            <label>First Name</label>
          </div>
          <div class="name">
            <input type="text" id="lastName" name="lastname" required="">
            <label>Last Name</label>
          </div>
          <div class="user-box">
            <input type="text" name="email" required="">
            <label>Email Address</label>
          </div>
          <div class="user-box">
            <input type="text" name="phone" required="">
            <label>Phone Number</label>
          </div>
          <div class="user-box">
            <input type="password" id="password" name="password" required="">
            <label>Password</label>
          </div>
          <div class="user-box">
            <input type="password" id="confirmPass" name="cpassword" required="">
            <label>Confirm Password</label>
          </div>
          <div class="user-box">
            <input type="text" id="lastName" name="address" required="">
            <label>Delivery Address</label>
          </div>
          <div class="chk-box" style="font-size: 10px; color: aliceblue;">
            <input type="checkbox" id="chk-accept" onchange="onCheckChange()" />
            <label for="chk-accept" style="margin: 5px;">I accept the Terms of use & Privacy Policy.</label>
          </div>
      
          <a href="#">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <input type="submit" value="Register" class="animation1" name="submit"> 
          </a>
        </form>
      
      </div>

      <style>
        html {
  min-height: 100vh;
}

body {
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background: url(images/img/food2003.jpg);
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 800px; /* Adjust the width as needed */
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0, 0, 0, 0.8);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
  border-radius: 10px;
}


.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #ffffffa0;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}

.login-box .user-box label {
  position: absolute;
  top: 0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: 0.5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #fd07b3;
  font-size: 12px;
}

.login-box form a {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #fd07b3;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: 0.5s;
  margin-top: 40px;
  letter-spacing: 4px;
}

.login-box a:hover {
  background: #fd07b3;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #fd07b3, 0 0 25px #fd07b3, 0 0 50px #fd07b3,
    0 0 100px #fd07b3;
}

.login-box a span {
  position: absolute;
  display: block;
}

.login-box a span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #fd07b3);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }

  50%,
  100% {
    left: 100%;
  }
}

.login-box a span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #fd07b3);
  animation: btn-anim2 1s linear infinite;
  animation-delay: 0.25s;
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }

  50%,
  100% {
    top: 100%;
  }
}

.login-box a span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #fd07b3);
  animation: btn-anim3 1s linear infinite;
  animation-delay: 0.5s;
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }

  50%,
  100% {
    right: 100%;
  }
}

.login-box a span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #fd07b3);
  animation: btn-anim4 1s linear infinite;
  animation-delay: 0.75s;
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }

  50%,
  100% {
    bottom: 100%;
  }
}

.login-box .name {
  position: relative;
}

.login-box .name input {
  display: flex;
  flex-direction: row;
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}

.login-box .name label {
  display: flex;
  flex-direction: row;
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: 0.5s;
}

.animation1 {
    background: transparent;
    color: white;
    border: 0px solid;
    cursor: pointer;
    justify-content: center;
    align-items: center;
}

.login-box .name input:focus ~ label,
.login-box .name input:valid ~ label {
  top: -20px;
  left: 0;
  color: #fd07b3;
  font-size: 12px;
}

.chk-box {
  display: flex;
  flex-direction: row;
  width: 100%;
  margin-top: 1px;
}

.chk-box input {
  font-size: 5px;
  padding: 0;
  width: auto;
}

.login-box .chk-box input a {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #fd07b3;
  font-size: 6px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: 0.5s;
  margin-top: 40px;
  letter-spacing: 4px;
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