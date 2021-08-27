<!DOCTYPE html>
<html lang="fa" dir="rtl">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>
    <title>رستوران ها</title>
<?php include ('includes/header.php'); ?>
        <div class="page-wrapper" style="background-image:url('images/ttu.gif'); background-size: 155% auto; background-repeat:no-repeat;">
            <div class="inner-page-hero bg-image" data-image-src="images/img/res.jpeg">
                <div class="container"> </div>
            </div>
            <div class="result-show" style="background-color:lavender;">
                <div class="container">
                    <div class="row">                       
                    </div>
                </div>
            </div>
            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9" style="background-color:purple;">
                            <div class="bg-gray restaurant-entry" style="background-color:cyan;">
                                <div class="row">
								<?php $ress= mysqli_query($db,"select * from restaurant");
									      while($rows=mysqli_fetch_array($ress))
										  {
													 echo' <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left" style="background-color:#bb4350;">
															<div class="entry-logo">
																<a class="img-fluid" href="foods.php?res_id='.$rows['rs_id'].'" > <img src="admin/Res_img/'.$rows['image'].'" alt="Food logo"></a>
															</div>
															<div class="entry-dscr" style="background-color:yellow;">
																<h5><a href="foods.php?res_id='.$rows['rs_id'].'" >'.$rows['title'].'</a></h5> <span>'.$rows['address'].' <a href="#">...</a></span>
																<ul class="list-inline">
																	<li class="list-inline-item">حداقل زمان رسیدن سفارش به دستتان ، 30 دقیقه میباشد</li>
																</ul>
															</div>
														</div>
														
														 <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
																<div class="right-content bg-white">
																</div>
															</div>';
										  }
						?>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?php include ('includes/footer.php'); ?>
</body>
</html>