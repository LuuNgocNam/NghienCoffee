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
	$sql = "Select * from tbl_baiviet";
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
                    <h4 class="card-title">Bài viết</h4>
                    <p class="card-description"> Danh Sách</p>
                   
                    <table class="table table-striped custom-table">
                    <thead>
                        <tr>

                            <th scope="col" style="color: black;">Tên bài viết</th>
                            <th scope="col" style="color: black;">Hình ành</th>
                            <th scope="col" style="color: black;">Tác giả</th>
                            <th scope="col" style="color: black;">Ngày</th>
                            <th scope="col" style="color: black;">Bình luận</th>
                            <th scope="col" style="color: black;">Nội dung</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach($product as $item) : ?>
                        <tr scope="row">
                            <td>
                              <?php echo $item['tenbv']?>
                            </td>
                            <td><a href="#"><img width="100" height="100" src="<?php echo $base_url.$item['hinhanh'] ?>" alt=""></a></td>
                            <td>
                              <?php echo $item['tacgia']?>
                            </td>
                            <td><?php echo $item['ngay']?></td>
                            <td><?php echo $item['binhluan']?></td>
                            <td><class="more"><?php echo $item['noidung']?></a></td>
                            <td> <a href="./edit_baiviet.php?id_bv=<?php echo $item['id_bv']?>"><i class="far fa-edit" style="font-size: 18px;"></a></td>
                            <td></i><a href="./delete_baiviet.php?id_bv=<?php echo $item['id_bv']?>"><i class="far fa-trash-alt" style="color: red;font-size: 20px;"></i></a></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                </table>
                      </br>
                      <div class="test">
                        <button class="btn btn-gradient-primary mt-4" type="submit"><a href="./add_baiviet.php" class="card-description" style="color: white;font-weight: bold;">Thêm bài viết</a></button>           
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