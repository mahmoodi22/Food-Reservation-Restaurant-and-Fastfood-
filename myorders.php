<!DOCTYPE html>
<html lang="fa">
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
<?php include ('includes/header.php'); ?>
    <title>سفارشات شما</title>
	<link href="css/sefareshateman.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
<style type="text/css" rel="stylesheet">
<style type="text/css" rel="stylesheet">
	</style>
	</head>
<body style="background-image:url('images/backg78.jpg'); background-size: 80% auto;">
        <div class="page-wrapper">
            <div class="inner-page-hero bg-image" data-image-src="images/img/res.jpeg">
                <div class="container"> </div>
            </div>
            <div class="result-show" style="background-color:red;">
                <div class="container">
                    <div class="row">                       
                    </div>
                </div>
            </div>
            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">
                        <div class="col-xs-12 col-sm-7 col-md-7 ">
                                <div class="row">
							<table style="background-color:orange;" >
						  <thead>
							<tr>
							  <th>نام غذا یا آیتم</th>
							  <th>تعداد</th>
							  <th>قیمت</th>
							   <th>وضعیت سفارش</th>
							     <th>تاریخ ثبت سفارش</th>
								   <th>حذف سفارشها</th>
							</tr>
						  </thead>
						  <tbody>
							<?php 
						$query_res= mysqli_query($db,"select * from users_orders where u_id='".$_SESSION['user_id']."'");
							if(!mysqli_num_rows($query_res) > 0 )
								{
									echo '<td colspan="6"><center>هنوز هیچ سفارشی را ثبت نکرده اید </center></td>';
								}
							else
								{			      
									while($row=mysqli_fetch_array($query_res))
								{
?>
			<tr>	
			<td data-column="Item"> <?php echo $row['title']; ?></td>
			<td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
			<td data-column="price">تومان<?php echo $row['price']; ?></td>
			<td data-column="status"> 
<?php 
		$status=$row['status'];
		if($status=="" or $status=="NULL")
			{
?>
		<p style="font-weight:bold; color:red; background-color:cyan;">در حال پردازش و آماده سازی سفارش</p>
<?php 
}
		if($status=="in process")
{ ?>
	    <p style="font-weight:bold; color:yellow; background-color:pink;">در حال ارسال به مقصد</p>
<?php
}
		if($status=="closed")
			{
?>
		<p style="font-weight:bold; color:purple; background-color:yellow;">رستوران بسته شده و یا سفارش ارسال شده</p> 
<?php 
			} 
?>
<?php
		if($status=="rejected")
		    {
?>
		<p style="font-weight:bold; color:orange; background-color:black;">لغو شده</p>
<?php 
			} 
?>
		</td>
		<td data-column="Date"> <?php echo $row['date']; ?></td>
		<td data-column="Action"> <a href="delete_orders.php?order_del=<?php echo $row['o_id'];?>" onclick="return confirm('آیا برای انصراف از این سفارش ، مطمئن هستید ؟');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"></a> 
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
<?php include ('includes/footer.php'); ?>
<?php
}
?>