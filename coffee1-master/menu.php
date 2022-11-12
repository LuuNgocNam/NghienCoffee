<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Coffee - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css"> 
    <link rel="stylesheet" href="css/style.css">
    <?php require_once "../lib/autoload.php" ?> 

  </head>
  
<?php
	$sql1 = "Select * from tbl_sanpham where loai='COFFEE'";
	$product1 = $db->fetchAll($sql1);
?>
<?php
	$sql2 = "Select * from tbl_sanpham where loai='Main Dish'";
	$product2 = $db->fetchAll($sql2);
?>
<?php
	$sql3 = "Select * from tbl_sanpham where loai='Drinks'";
	$product3 = $db->fetchAll($sql3);
?>
<?php
	$sql4 = "Select * from tbl_sanpham where loai='Desserts'";
	$product4 = $db->fetchAll($sql4);
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data =
        [
            "ten" => $_POST['ten'] ? $_POST['ten'] : '',
            "ngay" => $_POST['ngay'] ? $_POST['ngay'] : '',
            "gio" => $_POST['gio'] ? $_POST['gio'] : '',
            "sdt" => $_POST['sdt'] ? $_POST['sdt'] : '',
            "loinhan" => $_POST['loinhan'] ? $_POST['loinhan'] : '',
            
        ];
    $insert = $db->insert('tbl_datban', $data);
    if ($insert > 0) {
        $_SESSION['error'] = "Thêm thành công";
        header("Refresh:0");
    } else {
        $_SESSION['error'] = "không thành công";
        header("Refresh:0");
    }
}
function countss(){
	if(isset($_SESSION['cart'])){
	  $count = 0;
	  for ($i=0; $i < sizeof($_SESSION['cart']) ; $i++) { 
		$count++;
	  }
	}else {
	  $count = 0;
	}
	  echo ''.$count.'';
}
?>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Coffee<small>Nghiện</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Trang chủ</a></li>
	          <li class="nav-item"><a href="menu.php" class="nav-link">Menu</a></li>
	          <li class="nav-item"><a href="services.php" class="nav-link">Dịch vụ</a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="room.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="cart.php">Hoá đơn</a>
                <a class="dropdown-item" href="checkout.php">Thanh toán</a>
              </div>
            </li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Liên hệ</a></li>
	          <li class="nav-item cart"><a href="cart.php" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small><?php echo countss() ?></small></span></a></li>
	        </ul>
	      </div>
		  </div>
	  </nav>
    <!-- END nav -->

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Menu</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ</a></span> <span>Menu</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>
	<section class="ftco-intro">
    	<div class="container-wrap">
    		<div class="wrap d-md-flex align-items-xl-end">
	    		<div class="info">
					<div class="row no-gutters">
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-phone"></span></div>
	    					<div class="text">
	    						<h3>(+84) 793266228</h3>
	    						<p>Số điện thoại liên hệ cửa hàng.</p>
	    					</div>
	    				</div>
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-my_location"></span></div>
	    					<div class="text">
	    						<h3>Ngỡ 178 Đường Cổ Nhuế</h3>
	    						<p>	Tại khu phố nhỏ ở Cổ Nhuế 2, Bắc Từ Liêm, Hà Nội</p>
	    					</div>
	    				</div>
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-clock-o"></span></div>
	    					<div class="text">
	    						<h3>Mở của hàng ngày</h3>
	    						<p>8:00am - 9:00pm</p>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    		<div class="book p-4">
	    			<h3>Đặt bàn</h3>
	    			<form action="#" method="POST" class="appointment-form">
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="text" name="ten" class="form-control" placeholder="Họ và tên">
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<div class="input-wrap">
		            		<div class="icon"><span class="ion-md-calendar"></span></div>
		            		<input type="text" name="ngay" class="form-control appointment_date" placeholder="Ngày">
	            		</div>
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<div class="input-wrap">
		            		<div class="icon"><span class="ion-ios-clock"></span></div>
		            		<input type="text" name="gio" class="form-control appointment_time" placeholder="Giờ">
	            		</div>
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<input type="text" name="sdt" class="form-control" placeholder="Số điện thoại">
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
	    					<div class="form-group">
		              <textarea name="loinhan" id="" cols="30" rows="2" class="form-control" placeholder="Lời nhắn"></textarea>
		            </div>
		            <div class="form-group ml-md-4">
		              <input type="submit" value="Đặt bàn" class="btn btn-white py-3 px-4">
		            </div>
	    				</div>
	    			</form>
	    		</div>
    		</div>
    	</div>
    </section>


    <section class="ftco-menu mb-5 pb-5">
    	<div class="container">
    		<div class="row d-md-flex">
	    		<div class="col-lg-12 ftco-animate p-md-5">
		    		<div class="row">
		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		            	<a class="nav-link active" id="v-pills-0-tab" data-toggle="pill" href="#v-pills-0" role="tab" aria-controls="v-pills-0" aria-selected="true">Coffee</a>

		              <a class="nav-link" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="false">Main Dish</a>

		              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Drinks</a>

		              <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Desserts</a>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex align-items-center">
		            
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

		              <div class="tab-pane fade show active" id="v-pills-0" role="tabpanel" aria-labelledby="v-pills-0-tab">
		              	<div class="row">
                           
                            <?php foreach ($product1 as $item) : ?>
		              		<div class="col-md-3">
								<div class="menu-entry">
									<img width="250" height="250" src="<?php echo $base_url.$item['hinhanh'] ?>" alt=""> 
									<div class="text text-center pt-4">
										<h3><a href=""><?php echo $item['tensp'] ?></a></h3>
										<p><?php echo $item['chuthich'] ?></p>
										<p class="price"><span><?php echo $item['gia'] ?>$</span></p>
										<p><a href="../modules/cart/add_cart.php?id_sp=<?php echo $item['id_sp']?>&soluong=1" class="btn btn-primary btn-outline-primary">Đặt món</a></p>

									</div>
								</div>
                            </div>
                            <?php endforeach ?>  
						        	

		              	    </div>
                              <!-- <div class="col-md-3">
						        		<div class="menu-entry">
						    					<a href="#" class="img" style="background-image: url(http://localhost:8080/nghien/public/img/product/menu-1.jpg);"></a>
						    					<div class="text text-center pt-4">
						    						<h3><a href="product-single.html">Coffee Capuccino</a></h3>
						    						<p>A small river named Duden flows by their place and supplies</p>
						    						<p class="price"><span>$5.90</span></p>
						    						<p><a href="cart.html" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
						    					</div>
						    				</div>
						        	</div> -->
                          
		                </div>

		              <div class="tab-pane fade" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
		                <div class="row">
						<?php foreach ($product2 as $item) : ?>
		              		<div class="col-md-4 text-center">
						        <div class="menu-entry">
                                    <img width="320" height="270" src="<?php echo $base_url.$item['hinhanh'] ?>" alt=""> 
						    		<div class="text text-center pt-4">
											<h3><a href=""><?php echo $item['tensp'] ?></a></h3>
											<p><?php echo $item['chuthich'] ?></p>
											<p class="price"><span><?php echo $item['gia'] ?>$</span></p>
											<p><a href="../modules/cart/add_cart.php?id_sp=<?php echo $item['id_sp']?>&soluong=1" class="btn btn-primary btn-outline-primary">Đặt món</a></p>
						    		</div>
						    	</div>
                            </div>
                            <?php endforeach ?>  
		              	</div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
		                <div class="row">
                            <?php foreach ($product3 as $item) : ?>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
                                  <img width="320" height="270" src="<?php echo $base_url.$item['hinhanh'] ?>" alt="">		              				
                                    <div class="text text-center pt-4">
		              					<h3><a href=""><?php echo $item['tensp'] ?></a></h3>
		              					<p><?php echo $item['chuthich'] ?></p>
		              					<p class="price"><span><?php echo $item['gia'] ?>$</span></p>
										  <p><a href="../modules/cart/add_cart.php?id_sp=<?php echo $item['id_sp']?>&soluong=1" class="btn btn-primary btn-outline-primary">Đặt món</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<!-- <div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/drink-2.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="product-single.html">Pineapple Juice</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="cart.html" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div> -->
                            <?php endforeach ?>     
		              	</div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
		                <div class="row">
                            <?php foreach ($product4 as $item) : ?>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
                                    <img width="320" height="270" src="<?php echo $base_url.$item['hinhanh'] ?>" alt="">		              				
		              				<div class="text text-center pt-4">
		              					<h3><a href="product-"><?php echo $item['tensp'] ?></a></h3>
		              					<p><?php echo $item['chuthich'] ?></p>
		              					<p class="price"><span><?php echo $item['gia'] ?>$</span></p>
										  <p><a href="../modules/cart/add_cart.php?id_sp=<?php echo $item['id_sp']?>&soluong=1" class="btn btn-primary btn-outline-primary">Đặt món</a></p>
		              				</div>
		              			</div>
		              		</div>
                            <?php endforeach ?>       
		              	</div>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
    </section>

    <footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Về chúng tôi</h2>
              <p>Xa xa, đằng sau những ngọn núi chữ, xa những quốc gia Vokalia và Consonantia, có những văn tự mù mịt.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Blog</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Ngay cả Pointing toàn năng cũng không kiểm soát được</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Ngay cả Pointing toàn năng cũng không kiểm soát được</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
             <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Dịch vụ</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Nấu chín</a></li>
                <li><a href="#" class="py-2 d-block">Giao hàng</a></li>
                <li><a href="#" class="py-2 d-block">Thực phẩm chất lượng</a></li>
                <li><a href="#" class="py-2 d-block">Trộn</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Địa chỉ liên hệ</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Số nhà 47 ngõ 178 Cổ Nhuế</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+84 0793266228</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">luunam2203@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>