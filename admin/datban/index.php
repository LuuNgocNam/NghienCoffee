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
	$sql = "Select * from tbl_datban";
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
                    <h4 class="card-title">Đặt bàn</h4>
                    <p class="card-description"> Danh Sách</p>
                   
                    <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                            <th scope="col" style="color: black;">ID</th>
                            <th scope="col" style="color: black;">Tên khách hàng</th>
                            <th scope="col" style="color: black;">Số điện thoại</th>
                            <th scope="col" style="color: black;">Ngày</th>
                            <th scope="col" style="color: black;">Giờ</th>
                            <th scope="col" style="color: black;">Lời nhắn</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach($product as $item) : ?>
                        <tr scope="row">
                            <td>
                              <?php echo $item['id']?>
                            </td>
                            <td>
                              <?php echo $item['ten']?>
                            </td>
                            <td><?php echo $item['sdt']?></td>
                            <td><?php echo $item['ngay']?></td>
                            <td><?php echo $item['gio']?></td>
                            <td><?php echo $item['loinhan']?></td>
                            <td> <a href="./edit_datban.php?id=<?php echo $item['id']?>"><i class="far fa-edit" style="font-size: 18px;"></a></td>
                            <td></i><a href="./delete_datban.php?id=<?php echo $item['id']?>"><i class="far fa-trash-alt" style="color: red;font-size: 20px;"></i></a></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                </table>
                      </br>
                      <div class="test">
                        <button class="btn btn-gradient-primary mt-4" type="submit"><a href="./add_datban.php" class="card-description" style="color: white;font-weight: bold;">Thêm bàn</a></button>           
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