<!DOCTYPE html>
<html lang="fa" dir="rtl">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();
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
			$success = "<p style='font-size:20px; color:lightgreen; background:red;'>سفارش شما از رستوران مورد نظرتان با موفقیت انجام شد و برای ملاحظه بیشتر جزئیات خرید خود ، به صفحه سفارشات شما مراجعه بفرمایید";													
			}
			}
?>
    <title>پرداخت هزینه سفارش</title>
<?php include ('includes/header.php'); ?>
        <div class="page-wrapper">
		                <div class="container">
                 
					   <span style="color:green;">
								<?php echo $success; 
								if ($success==true)
								{$success = "
				<script type='text/javascript'>
				function countdown() {
				var i = document.getElementById('counter');
				if (parseInt(i.innerHTML)<=0) {
				location.href = 'index.php';
				}
				i.innerHTML = parseInt(i.innerHTML)-1;
				}
				setInterval(function(){ countdown(); },1000);
				</script>'";
								header("refresh:5;url=index.php");} 
								?>
								
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
                                        <div class="cart-totals-fields">
                                            <table class="table">
											<tbody>
                                                    <tr>
                                                        <td>مبلغ قابل پرداخت بدون احتساب هزینه ارسال</td>
                                                        <td> <?php echo "تومان".$item_total; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>هزینه سفارش</td>
                                                        <td>رایگان (به مدت محدود)</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color"><strong>مبلغ نهایی قابل پرداخت شما</strong></td>
                                                        <td class="text-color"><strong> <?php echo "تومان".$item_total; ?></strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                            <li>
                                                <label class="custom-control custom-radio  m-b-20">
                                                    <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">پرداخت درب منزل با دستگاه کارت خوان</span>
                                                    <br> <span>به دلیل احتمال انتقال ویروس کرونا ، از دریافت وجه نقد از شما عزیزان ، معذوریم</span> </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-radio  m-b-10">
                                                    <input name="mod"  type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">درگاه بانکی</span> </label>
													<br> <span>فعلا به دلایلی ، درگاه پرداخت بانکی ، فعالسازی نشده است . لطفا از روش های پرداخت دیگر استفاده نمایید</span> </label>
                                            </li>
                                        </ul>
                                        <p class="text-xs-center"> <input type="submit" onclick="return confirm('آیا از انجام این کار ، اطمینان دارید؟');" name="submit"  class="btn btn-outline-success btn-block" value="ثبت نهایی سفارش"> </p>
                                    </div>
									</form>
                                </div>
                            </div>
                    </div>
                </div>
				 </form>
            </div>
<?php include ('includes/footer.php'); ?>
<?php
}
?>