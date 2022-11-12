<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data =
                [
                    "tenkh" => $_POST['tenkh'] ? $_POST['tenkh'] : '',
                    "ngaysinh" => $_POST['ngaysinh'] ? $_POST['ngaysinh'] : '',
                    "email" => $_POST['email'] ? $_POST['email'] : '',
                    "sdt" => $_POST['sdt'] ? $_POST['sdt'] : '',
                    "diachi" => $_POST['diachi'] ? $_POST['diachi'] : '',


                ];
            $insert = $db->insert('tbl_khachhang', $data);
            if ($insert > 0) {
                $_SESSION['error']="Thêm thành công";
                header('Location: ./index.php');
            } else{
                $_SESSION['error']="không thành công";
                header('Location: ./add_khachhang.php');
            }
        }
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
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Khách hàng</h4>
                    <p class="card-description">Thêm khách hàng</p>
                    <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                        <label for="exampleInputName1">Tên khách hàng</label>
                        <input type="text" class="form-control" name="tenkh" id="exampleInputName1" placeholder="Tên">
                        <div class="form-group">
                        <label for="exampleInputEmail3">Ngày sinh</label>
                        <input type="text" class="form-control" name="ngaysinh" id="exampleInputEmail3" placeholder="Ngày sinh">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email</label>
                        <input type="text" class="form-control" name="email" id="exampleInputEmail3" placeholder="Email">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputPassword4">sdt</label>
                        <input type="text" class="form-control" name="sdt" id="exampleInputPassword4" placeholder="Số điện thoại">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Địa chỉ</label>
                        <input type="text" class="form-control" name="diachi" id="exampleInputEmail3" placeholder="Địa chỉ">
                      </div> 



                
                      
                      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                    
                  </div>
                </div>
              </div>
              
            </div>
          </div>
    
    <?php require_once "../layout/script.php"; ?>
    
  </body>
</html>