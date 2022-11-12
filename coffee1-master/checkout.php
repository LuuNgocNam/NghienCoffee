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
    <?php require_once(__DIR__ .'/../lib/autoload.php'); ?>

  </head>

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $data_bill = [
      "ten" => $_POST['ten'] ? $_POST['ten'] : '',
      "sdt" => $_POST['sdt'] ? $_POST['sdt'] : '',
      "diachi" => $_POST['diachi'] ? $_POST['diachi'] : '',
      "email" => $_POST['email'] ? $_POST['email'] : '',
      "ngay" => $_POST['ngay'] ? $_POST['ngay'] : '',
      "pttt" => $_POST['pttt'] ? $_POST['pttt'] : '',
      "tongtien" => $_POST['tongtien'] ? $_POST['tongtien'] : '',
      "chuthich" => $_POST['chuthich'] ? $_POST['chuthich'] : '',
    ];
    $insert = $db->insert('tbl_hoadon', $data_bill);
    if ($insert > 0) {
        $arrCart = [];
        foreach ($_SESSION['cart'] as $key => $value) {
            $arrCart[$key] = $value;

            $sql_prd = "SELECT * FROM `tbl_sanpham` WHERE id_sp = $key";
            $cthoadon = $db->fetchOne($sql_prd);
          $data_prd = [
              "id_cthd" => $insert,
              "id_sphd" => $cthoadon['id_sp'],  
              "tensp" => $cthoadon['tensp'],
              "soluong" => $value,
              "gia" => $cthoadon['gia'] ,
              "tongtien" => $cthoadon['gia'] * $value,
          ];
          $insert_detail_hd = $db->insert('tbl_cthoadon', $data_prd);
          $sql_update_kho = "UPDATE `tbl_kho` SET `tbl_kho`.`soluongton` = (SELECT `soluongton` FROM `tbl_kho` WHERE `tbl_kho`.`id_sp` =  ".$cthoadon['id_sp'].") - ".$value." WHERE `tbl_kho`.`id_sp` =".$cthoadon['id_sp'].";";
          
          $update_kho = $db->query($sql_update_kho);
          
      }
      
      unset($_SESSION['cart']);
      header("Location:./menu.php");
    } 
  }
   
$param = [];
$total_price = 0;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {

        $arr_id_sp = [];
        $arr_soluong = [];
        foreach ($_SESSION['cart'] as $key => $value) {
            $arr_id_sp[] = $key;
            $arr_soluong[$key] = $value;
        }
        // join(' , ');
        $str_sql = implode(" , ", $arr_id_sp);
        $sql = "SELECT * FROM `tbl_sanpham`WHERE `id_sp` IN ($str_sql)";
        $prd_cart;

        if(count($arr_id_sp)>0){
          $prd_cart = $db->fetchAll($sql);
          foreach  ($prd_cart as $item) { 
            $total_price +=  $item['gia'] * $_SESSION["cart"][$item['id_sp']];
          }
        }
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
	      <a class="navbar-brand" href="index.php">Coffee<small>Nghiện</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Trang chủ</a></li>
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
            	<h1 class="mb-3 mt-5 bread">Thanh toán</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ</a></span> <span>Thanh toán</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-xl-8 ftco-animate">
						<form action="" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
							<h3 class="mb-4 billing-heading">Thông tin thanh toán</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Họ và tên</label>
	                  <input type="text" name="ten" class="form-control" placeholder="Họ và tên">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Email</label>
	                  <input type="text" name="email" class="form-control" placeholder="Email">
	                </div>
                </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">Phương thức thanh toán</label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="pttt" id="" class="form-control">
		                  	<option value="Thanh toán trực tiếp" selected style="color: black;">Thanh toán trực tiếp</option>
		                    <option value="Thanh toán bằng thẻ ngân hàng" selectd style="color:black;">Thanh toán bằng thẻ ngân hàng</option>
		                    <option value="Thanh toán thẻ tín dụng/Ghi nợ" selectd style="color:black;">Thanh toán thẻ tín dụng/Ghi nợ</option>
		                  </select>
		                </div>
		            	</div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Địa chỉ</label>
	                  <input type="text" name="diachi" class="form-control" placeholder="Địa chỉ">
	                </div>
		            </div>

		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Số điện thoại</label>
	                  <input type="text" name="sdt" class="form-control" placeholder="Số điện thoại">
	                </div>
	              </div>
                
                <input type="hidden" name="ngay" readonly="readonly" disable value="<?php echo date('y-m-d');?>"/>
                <input type="hidden" name="tongtien" value="<?php echo $total_price ?>" id="cun">
                <input type="hidden" name="chuthich" value="chua thanh toan" id="cun">
                

	            </div>
	          



	          <div class="row mt-5 pt-3 d-flex">
	          	<div class="col-md-6 d-flex">
	          		<div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Hoá đơn</h3>
                  <?php if(count($_SESSION['cart']) > 0) : ?>
                    
                  

                    <?php endif ?>
	          			<p class="d-flex">
		    						<span>Giá</span>
		    						<span>$<?php echo $total_price?></span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Tổng tiền</span>
		    						<span>$<?php echo $total_price ?></span>
                    
		    					</p>
                  <div class="col-md-6">
	          		  <div class="cart-detail ftco-bg-dark p-3 p-md-4" style="width: 250px;">
	          			  <h3 class="billing-heading mb-4">Thanh toán</h3>
									  <p><button type="submit" class="btn btn-primary py-3 px-4">Thanh toán</button></p>
								  </div>
	          	    </div>
								</div> 
	          	</div>
	          </div>
            </form><!-- END -->
          </div> <!-- .col-md-8 -->




          <div class="col-xl-4 sidebar ftco-animate">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                	<div class="icon">
	                  <span class="icon-search"></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Search...">
                </div>
              </form>
            </div>
            <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3>Categories</h3>
                <li><a href="#">Tour <span>(12)</span></a></li>
                <li><a href="#">Hotel <span>(22)</span></a></li>
                <li><a href="#">Coffee <span>(37)</span></a></li>
                <li><a href="#">Drinks <span>(42)</span></a></li>
                <li><a href="#">Foods <span>(14)</span></a></li>
                <li><a href="#">Travel <span>(140)</span></a></li>
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Recent Blog</h3>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Tag Cloud</h3>
              <div class="tagcloud">
                <a href="#" class="tag-cloud-link">dish</a>
                <a href="#" class="tag-cloud-link">menu</a>
                <a href="#" class="tag-cloud-link">food</a>
                <a href="#" class="tag-cloud-link">sweet</a>
                <a href="#" class="tag-cloud-link">tasty</a>
                <a href="#" class="tag-cloud-link">delicious</a>
                <a href="#" class="tag-cloud-link">desserts</a>
                <a href="#" class="tag-cloud-link">drinks</a>
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div>
          </div>

        </div>
      </div>
    </section> <!-- .section -->

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

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>

    
  </body>
</html>