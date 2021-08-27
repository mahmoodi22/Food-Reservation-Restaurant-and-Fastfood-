<!DOCTYPE html>
<html lang="fa" dir="rtl">
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
			$message = "باید تمامی فیلدها را پر کنید";
		}
	else
	{
	$check_username= mysqli_query($db, "SELECT username FROM users where username = '".$_POST['username']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
		

	
	if($_POST['password'] != $_POST['cpassword']){
       	$message = "رمز عبور ، مطابقت ندارد";
    }
	elseif(strlen($_POST['password']) < 8)
	{
		$message = "رمز عبور باید حداقل دارای 8 کاراکتر باشد";
	}
	elseif(strlen($_POST['phone']) < 10)
	{
		$message = "فرمت وارد شده برای شماره تلفن ، درست نمیباشد";
	}

    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
       	$message = "ایمیل وارد شده معتبر نمیباشد";
    }
	elseif(mysqli_num_rows($check_username) > 0)
     {
    	$message = 'این نام کاربری قبلا ثبت شده است';
     }
	elseif(mysqli_num_rows($check_email) > 0)
     {
    	$message = 'این ایمیل قبلا به ثبت رسیده است';
     }
	else{
       
	$mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address) VALUES('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['password']."','".$_POST['address']."')";
	mysqli_query($db, $mql);
		$success = "حساب کاربری با موفقیت ساخته شد <p>و تا چند ثانیه دیگر به صفحه ورود ، هدایت میشوید <span id='counter'>5</span> ثانیه</p>
				<script type='text/javascript'>
				function countdown() {
				var i = document.getElementById('counter');
				if (parseInt(i.innerHTML)<=0) {
				location.href = 'login.php';
				}
				i.innerHTML = parseInt(i.innerHTML)-1;
				}
				setInterval(function(){ countdown(); },1000);
				</script>'";
		 header("refresh:5;url=login.php");
    }
	}
}
?>
    <title>ثبت نام</title>
<?php include 'includes/header.php' ; ?>
         <div class="page-wrapper">
            <div class="breadcrumb">
               <div class="container">
                  <ul>
                     <li><a href="#" class="active">
					  <span style="color:red;"><?php echo $message; ?></span>
					   <span style="color:green;">
								<?php echo $success; ?>
										</span>
					</a></li>
                  </ul>
               </div>
            </div>
            <section class="contact-page inner-page" style="background-color:lightblue;" dir="rtl">
               <div class="container">
                  <div class="row">
                     <div class="col-md-8">
                        <div class="widget">
                           <div class="widget-body">
							  <form action="" method="post">
                                 <div class="row">
								  <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">نام کاربری</label>
                                       <input class="form-control" type="text" name="username" id="example-text-input" placeholder="alirezamahmoodi22 مثل "> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">نام</label>
                                       <input class="form-control" type="text" dir="rtl" name="firstname" id="example-text-input" placeholder="مثل : علیرضا"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">نام خانوادگی</label>
                                       <input class="form-control" type="text" dir="rtl" name="lastname" id="example-text-input-2" placeholder="مثل : محمودی"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">ایمیل</label>
                                       <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="alireza@gmail.com مثل">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">شماره تماس</label>
                                       <input class="form-control" type="text" name="phone" id="example-tel-input-3" placeholder="به صورت 10 رقمی و بدون صفر اول">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">رمز عبور</label>
                                       <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="رمز عبور خود را وارد نمایید"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">تکرار رمز عبور</label>
                                       <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2" placeholder="به صورت مجدد ، رمز عبور خود را وارد نمایید"> 
                                    </div>
									 <div class="form-group col-sm-12">
                                       <label for="exampleTextarea">آدرس</label>
                                       <textarea class="form-control" dir="rtl" id="exampleTextarea"  name="address" rows="3"></textarea>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-4">
                                       <p> <input type="submit" value="ثبت نام" name="submit" class="btn theme-btn"> </p>
                                    </div>
                                 </div>
                              </form>
						   </div>
                        </div>
                     </div>
            </section>
			<?php include 'includes/footer.php' ; ?>