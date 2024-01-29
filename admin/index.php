                
                <!DOCTYPE html>
                <html lang="en">
                <?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(!empty($_POST["submit"])) 
     {
	$loginquery ="SELECT * FROM admin WHERE username='$username' && password='".md5($password)."'";
	$result=mysqli_query($db, $loginquery);
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row))
								{
                                    	$_SESSION["adm_id"] = $row['adm_id'];
										header("refresh:1;url=dashboard.php");
	                            } 
							else
							    {
										echo "<script>alert('Invalid Username or Password!');</script>"; 
                                }
	 }
	
	
}

?>
                

                <head>
                    <meta charset="UTF-8">
                    <title>Admin Login</title>

                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

                    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
                    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
                    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>



                </head>

                <body>

                                  <div class="container">
                        <h1>Admin Panel</h1>
                        <form class="login-form" action="index.php" method="post">
                            <span style="color:red;"><?php echo $message; ?></span>
                            <span style="color:green;"><?php echo $success; ?></span>
                            <div class="form-control">
                                <input type="text" required name="username" name="username" />
                                <label>Username</label>
                            </div>
                            <div class="form-control">
                                <input type="password" required name="password" name="password" />
                                <label>Password</label>
                            </div>
                            <input class="btn" type="submit" name="submit" value="Login" />
                        </form>
                    </div>
                    
                    <style>

  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

  :root {
      font-size: 100%;
      --white: oklch(100% 0 0);
      --primary-light: oklch(78.81% 0.109 255.212);
      --primary: oklch(58.63% 0.227 281.34);
      --primary-dark: oklch(47.56% 0.273 284.25);

      --greyLight-1:  oklch(93.77% 0.015 257.2);
      --greyLight-2:  oklch(85.86% 0.033 270.41);
      --greyDark:     oklch(73.91% 0.056 267.7);

      --background: var(--greyLight-1);
      --onBackground: var(--greyDark);

      --surface: var(--primary);
      --onSurface: var(--white);
      --onSurface-Dark: oklch(58.2% 0.228 266.74);

      --shadow: .3rem .3rem .6rem var(--greyLight-2),
               -.2rem -.2rem .5rem var(--white);
  }

  * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
  }

  body {
      font-family: 'Inter', sans-serif;
      background-image: url("./images/pancakes.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      overflow: hidden;
      margin: 0;
  }

  .container {
      background-color: var(--background);
      color: var(--onBackground);
      padding: 1.25rem 2.2rem;
      border-radius: 1.5rem;
  }

  .container h1 {
      font-size: 1.8rem;
      text-align: center;
      padding-bottom: 1.25rem;
      font-weight: 600;
  }

  .container a {
      text-decoration: none;
      color: var(--onSurface-Dark);
  }

  .form-control {
      position: relative;
      margin: 1.25rem 0 2.5rem 0;
      width: 18.75rem;
  }

  .form-control input {
      background-color: transparent;
      border: 0;
      border-bottom: 0.125rem var(--onBackground) solid;
      display: block;
      width: 100%;
      padding: .9rem;
      font-size: 1.2rem;
      color: var(--onBackground);
      font-weight: 400;
  }

  .form-control input:focus,
  .form-control input:valid {
      outline: 0;
      border-bottom-color: var(--greyLight-2);
  }

  .form-control label {
      position: absolute;
      top: .9rem;
      left: 0;
  }

  .form-control label span {
      display: inline-block;
      font-size: 1.2rem;
      min-width: .3rem;
      transition: 300ms cubic-bezier(0.68, -0.55, 0.265, 1.55);
  }

  .form-control input:focus + label span,
  .form-control input:valid + label span {
      color: var(--greyLight-2);
      transform: translateY(-1.875rem);
      font-size: 1rem;
  }

  .btn {
      cursor: pointer;
      display: inline-block;
      width: 100%;
      background: var(--surface);
      padding: .9rem;
      font-family: inherit;
      font-size: 1.2rem;
      border: 0;
      border-radius: .8rem;
      box-shadow:inset .2rem .2rem 1rem var(--primary-light), 
                inset -.2rem -.2rem 1rem var(--primary-dark),
                var(--shadow);
      color: var(--greyLight-1);
      transition: 300ms ease;
      font-weight: 500;
  }

  .btn:focus {
      outline: 0;
  }

  .btn:hover{
      color: var(--onSurface);
  }

  .btn:active {
      box-shadow:inset .2rem .2rem 1rem var(--primary-dark), 
               inset -.2rem -.2rem 1rem var(--primary-light);
      color: var(--onSurface);
  }

  .text {
      margin-top: 1.875rem;
      text-align: center;
      font-size: .8rem;
      font-weight: 400;
  }

</style>



<script>

    const labels = document.querySelectorAll('.form-control label')

    labels.forEach(label => {
        label.innerHTML = label.innerText
            .split('')
            .map((letter, index) => `<span style="transition-delay:${index * 40}ms">${letter}</span>`)
            .join('')
    })

</script>


                    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                    <script src='js/index.js'></script>


                </body>

                </html>
                