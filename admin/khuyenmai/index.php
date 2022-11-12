<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
  <?php
	$sql = "Select * from tbl_khuyenmai";
	$product = $db->fetchAll($sql);  	
  ?>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
    <?php require_once "../layout/nav_bar_header.php"; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
    <?php require_once "../layout/nav_bar.php"; ?> 
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Khuyến mại</h4>
                    <p class="card-description"> Danh Sách</p>
                   
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> Mã khuyến mãi </th>
                          <th> Tên khuyến mãi </th>
                          <th> Chiết khấu </th>
                          <th> Ngày bắt đầu </th>
                          <th> Ngày kết thúc </th>
                          <th> Hình ảnh </th>
                        </tr> 
                      </thead>
                      <tbody>
                      <?php foreach($product as $item) : ?>
                        <tr>
                          <td> <?php echo $item['id_km']?></td>
                          <td> <?php echo $item['tenkm']?> </td>
                          <td> <?php echo $item['chietkhau']?></td>
                          <td> <?php echo $item['ngaybd']?> </td>
                          <td> <?php echo $item['ngaykt']?> </td>
                          <td><img width="100" height="100" src="<?php echo $base_url.$item['hinhanh'] ?>" alt=""></td>

                          <td> <a href="./edit_khuyenmai.php?id_km=<?php echo $item['id_km']?>">EDIT</a>&emsp;<a href="./delete_khuyenmai.php?id_km=<?php echo $item['id_km']?>">XÓA</a></td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                      </br>
                    <a href="./add_khuyenmai.php" class="card-description">Thêm khuyến mại</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
    
    <?php require_once "../layout/script.php"; ?>
    
  </body>
</html>