<!DOCTYPE html>
<html lang="fa" dir="rtl">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>
    <title>Classy FOOD</title>
	    <link rel="icon" href="images/classy-fav.png">
<body class="home" style="background-image:url('images/backkkk.jpg'); background-size: 150% auto;">
<?php include 'includes/header.php' ; ?>
        <section class="hero bg-image" data-image-src="images/img/main.jpg">
            <div class="hero-inner">
                <div class="container text-center hero-text font-white">
                    <h5 class="font-white space-xs">به آسانی ، غذای مورد علاقه خودتان را سفارش دهید و لذت ببرید</h5>
                    <div class="banner-form">
                        <form class="form-inline">
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="text" dir="rtl" class="form-control form-control-lg" id="exampleInputAmount" placeholder="نام آیتم دلخواه را اینجا وارد کنید"> </div>
                            </div>
                            <button onclick="location.href='restaurants.php'" type="button" class="btn theme-btn btn-lg" style="background-color:green;">..جستجو</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
            </div>
        </section>
		<a href="https://irancell.ir">
<img src="images/ads1.gif" width="400" height="300" style="margin-left:10px;">
</a>
<a href="https://wallex.ir">
<img src="images/ads2.gif" width="400" height="300">
</a>
<a href="https://iranicard.ir">
<img src="images/ads3.gif" width="400" height="300">
</a>
<a href="https://mci.ir">
<img src="images/ads4.gif" width="350" height="300">
</a>
        <section class="featured-restaurants">
            <div class="container" style="background-color:pink;">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="title-block pull-left">
                            <h4>لیست رستورانهای موجود</h4> </div>
                    </div>
                    <div class="col-sm-8">
                    </div>
                </div>
                <div class="row" style="background-color:cyan;">
                    <div class="restaurant-listing">
						<?php
						$ress= mysqli_query($db,"select * from restaurant");  
									      while($rows=mysqli_fetch_array($ress))
										  {
													$query= mysqli_query($db,"select * from res_category where c_id='".$rows['c_id']."' ");
													 $rowss=mysqli_fetch_array($query);
						
													 echo ' <div class="col-xs-12 col-sm-12 col-md-6 single-restaurant all '.$rowss['c_name'].'">
														<div class="restaurant-wrap" style="background-color:gold;">
															<div class="row">
																<div class="col-xs-12 col-sm-3 col-md-12 col-lg-3 text-xs-center">
																	<a class="restaurant-logo" href="foods.php?res_id='.$rows['rs_id'].'" > <img src="admin/Res_img/'.$rows['image'].'"> </a>
																</div>
																<div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
																	<h5><a href="foods.php?res_id='.$rows['rs_id'].'" >'.$rows['title'].'</a></h5> <span>'.$rows['address'].'</span>
																	<div class="bottom-part">
																		<div class="mins">حداقل زمان ارسال سفارش و رسیدن به مقصد ، 30 دقیقه میباشد</div>
																	</div>
																</div>
															</div>
														</div>
													</div>';
										  }
						?>
                    </div>
                </div>
            </div>
        </section>
<?php include 'includes/footer.php' ; ?>
</body>
</html>