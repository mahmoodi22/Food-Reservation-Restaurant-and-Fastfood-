<!DOCTYPE html>
<html lang="fa" dir="rtl">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
include_once 'product-action.php';
?>
    <title>لیست غذاها</title>
<?php include ('includes/header.php'); ?>
        <div class="page-wrapper" style="background-image:url('images/back49.jpg'); background-size: 135% auto;   background-repeat: no-repeat;">
			<?php $ress= mysqli_query($db,"select * from restaurant where rs_id='$_GET[res_id]'");
									     $rows=mysqli_fetch_array($ress);
										  ?>
            <section class="inner-page-hero bg-image" data-image-src="images/img/dish.jpeg">
                <div class="profile">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                                <div class="image-wrap">
                                    <figure><?php echo '<img src="admin/Res_img/'.$rows['image'].'">'; ?></figure>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                                <div class="pull-left right-text white-txt">
                                    <h6><a style="background-color:red; color:yellow; font-size:40px;"><?php echo $rows['title']; ?></a></h6>
                                    <p style="background-color:purple; color:yellow; font-size:20px;"><?php echo $rows['address']; ?></p>
                                    <ul class="nav nav-inline">
                                        <p class="nav-item" style="background-color:blue; color:green; font-size:15px;"> <a> زمان رسیدن سفارش به دستتان ، حداقل 30 دقیقه میباشد</a> </p>
                                    </span> </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="breadcrumb" style="background-color:pink;">
                <div class="container">
                </div>
            </div>
            <div class="container m-t-30">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                         <div class="widget widget-cart">
                                <div class="widget-heading" style="background-color:gold;">
                                    <h3 class="widget-title text-dark">
                                 سبد خرید شما
                              </h3>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="order-row bg-white">
                                    <div class="widget-body" style="background-color:cyan;">
	<?php
$item_total = 0;
foreach ($_SESSION["cart_item"] as $item)
{
?>									
									
                                        <div class="title-row" style="background-color:lightgreen;">
										<?php echo $item["title"]; ?><a href="foods.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>" >
										<input type="delete" class="btn theme-btn" style="margin-left:40px; background-color:darkred;" value="حذف"></a>
										</div>
										
                                        <div class="form-group row no-gutter">
                                            <div class="col-xs-8">
                                                 <input type="text" class="form-control b-r-0" value=<?php echo $item["price"]."تومان"; ?> readonly id="exampleSelect1">
                                                   
                                            </div>
                                            <div class="col-xs-4">
                                               <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input"> </div>
                                        
									  </div>
									  
	<?php
$item_total += ($item["price"]*$item["quantity"]);
}
?>								  
                                    </div>
                                </div>
                                <div class="widget-body" style="background-color:coral;">
                                    <div class="price-wrap text-xs-center">
                                        <p>قیمت نهایی قابل پرداخت شما</p>
                                        <h3 class="value"><strong><?php echo "تومان".$item_total; ?></strong></h3>
                                        <p>هزینه سفارش های شما به تا اطلاع ثانوی ، رایگان میباشد</p>
                                        <a href="payment.php?res_id=<?php echo $_GET['res_id'];?>&action=check"  class="btn theme-btn btn-lg" style="background-color:purple; font-size:50px;">پرداخت</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                        <div class="menu-widget" id="2">
                            <div class="widget-heading" style="background-color:#b660cd;">
                                <h3 class="widget-title text-dark">
                              لیست تمام غذاها و آیتم های این فروشگاه
                           </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="collapse in" id="popular2" style="background-color:#eedc82;">
						<?php
									$stmt = $db->prepare("select * from foods where rs_id='$_GET[res_id]'");
									$stmt->execute();
									$products = $stmt->get_result();
									if (!empty($products)) 
									{
									foreach($products as $product)
										{
													 ?>
                                <div class="food-item">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-lg-8">
										<form method="post" action='foods.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                            <div class="rest-logo pull-left">
                                                <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="admin/Res_img/foods/'.$product['img'].'">'; ?></a>
                                            </div>
                                            <div class="rest-descr">
                                                <h6><a href="#"><?php echo $product['title']; ?></a></h6>
                                                <p> <?php echo $product['slogan']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> 
										<span class="price pull-left" >تومان<?php echo $product['price']; ?></span>
										  <input class="b-r-0" type="text" name="quantity"  style="margin-left:30px;" value="1" size="5" />
										  <input type="submit" class="btn theme-btn" style="margin-left:40px; background-color:darkblue;" value="افزودن به سبد خرید" />
										</div>
										</form>
                                    </div>
                                </div>
								<?php
									  }
									}
								?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include ('includes/footer.php'); ?>