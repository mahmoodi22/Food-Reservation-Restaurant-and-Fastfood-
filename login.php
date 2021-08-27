<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>ورود</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
      <link rel="stylesheet" href="css/login.css">
	  <link rel="icon" href="images/classy-fav.png">
	  <style type="text/css">
	  #buttn{
		  color:#fff;
		  background-color: #fe1520;
	  }
	  </style>
</head>
<body>
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(!empty($_POST["submit"]))
     {
	$loginquery ="SELECT * FROM users WHERE username='$username' && password='".$password."'";
	$result=mysqli_query($db, $loginquery);
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row))
								{
                                    	$_SESSION["user_id"] = $row['u_id'];
										 header("refresh:1;url=index.php");
	                            } 
							else
							    {
                                      	$message = "نام کاربری یا رمز عبور نامعتبر است";
                                }
	 }
	
	
}
?>
  
<div class="pen-title">
  <h1>فرم ورود به سایت</h1>
</div>
<div class="module form-module" style="background-color:darkblue;">
  <div class="toggle">
   
  </div>
  <div class="form">
    <h2>ورود به حساب کاربری</h2>
	  <span style="color:red;"><?php echo $message; ?></span> 
   <span style="color:green;"><?php echo $success; ?></span>
    <form action="" method="post">
      <input type="text" placeholder="نام کاربری"  name="username"/>
      <input type="password" placeholder="رمز عبور" name="password"/>
      <input type="submit" id="buttn" name="submit" value="ورود" />
    </form>
  </div>
  <div class="cta">اگر هنوز ثبت نام نکرده اید<a href="register.php" style="color:#f30;"> اینجا کلیک کنید</a></div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>