<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../../public/table/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../../public/table/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../public/table/css/bootstrap.min.css">

    <!-- Style -->
    <!-- <link rel="stylesheet" href="../../public/table/css/style.css"> -->
  </head>
  <?php
	$sql = "Select * from tbl_hoadon";
	$product = $db->fetchAll($sql);  	
  ?>
  <body>
    <style>
      .td:hover{
        color: black;
      }
      
    </style>
  <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
    <?php require_once "../layout/nav_bar_header.php"; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
    <?php require_once "../layout/nav_bar.php"; ?> 
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Hoá đơn</h4>
                    <p class="card-description"> Danh Sách</p>
                   
                    <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                            <th scope="col" style="color: black;">Tên khách hàng</th>                           
                            <th scope="col" style="color: black;">Số điện thoại</th>
                            <th scope="col" style="color: black;">Email</th>
                            <th scope="col" style="color: black;">Địa chỉ</th>
                            <th scope="col" style="color: black;">Ngày</th>                           
                            <th scope="col" style="color: black;">PTTT</th>                           
                            <th scope="col" style="color: black;">Tổng tiền</th>                           
                            <th scope="col" style="color: black;">Trạng thái</th>                           

                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach($product as $item) : ?>
                        <tr scope="row">
                            <td>
                              <?php echo $item['ten']?>
                            </td>
                            <td><?php echo $item['sdt']?></td>
                            <td><?php echo $item['email']?></td>
                            <td><?php echo $item['diachi']?></td>
                            <td><?php echo $item['ngay']?></td>
                            <td><?php echo $item['pttt']?></td>
                            <td><?php echo $item['tongtien']?></td>
                            <td style="color: red";><?php echo $item['chuthich']?></td>
                            <td> <a href="./edit_hoadon.php?id_hd=<?php echo $item['id_hd']?>"><i class="far fa-edit" style="font-size: 18px;"></a></td>
                            <td></i><a href="./delete_hoadon.php?id_hd=<?php echo $item['id_hd']?>"><i class="far fa-trash-alt" style="color: red;font-size: 20px;"></i></a></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                </table>
                      <div class="container" style="display: flex;">
                        <div class="test">
                          <button class="btn btn-gradient-primary mt-4" type="submit"><a href="./add_hoadon.php" class="card-description" style="color: white;font-weight: bold;">Thêm hoá đơn</a></button>   
                        </div>
                        <td colspan = 11>
                          <form action="exportdata.php" method="post">
                            <button class="btn btn-success  mb-2" style="margin-top: 23px; margin-left: 30px;" type="submit" name="export"><i class="fas fa-file-excel"></i> Export Excel</button>
                          </form>
                        </td>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    
    <?php require_once "../layout/script.php"; ?>
    <script src="../../public/table/js/jquery-3.3.1.min.js"></script>
    <script src="../../public/table/js/popper.min.js"></script>
    <script src="../../public/table/js/bootstrap.min.js"></script>
    <script src="../../public/table/js/main.js"></script>
    <script src="../../public/table/../../public/table/js/"></script>
  </body>
</html>