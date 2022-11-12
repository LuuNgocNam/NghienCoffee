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
                "ten" => $_POST['ten'] ? $_POST['ten'] : '',
                "sdt" => $_POST['sdt'] ? $_POST['sdt'] : '',
                "email" => $_POST['email'] ? $_POST['email'] : '',
                "diachi" => $_POST['diachi'] ? $_POST['diachi'] : '',
                "ngay" => $_POST['ngay'] ? $_POST['ngay'] : '',
                "pttt" => $_POST['pttt'] ? $_POST['pttt'] : '',
                "tongtien" => $_POST['tongtien'] ? $_POST['tongtien'] : '',
                "chuthich" => $_POST['chuthich'] ? $_POST['chuthich'] : '',
            ];
            $insert = $db->insert('tbl_hoadon', $data);
            if ($insert > 0) {
                $_SESSION['error']="Thêm thành công";
                header('Location: ./index.php');
            } else{
                $_SESSION['error']="không thành công";
                header('Location: ./add_hoadon.php');
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
                    <h4 class="card-title">Hóa đơn</h4>
                    <p class="card-description">Thêm hóa đơn</p>
                    <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">

                      <div class="form-group">
                        <label for="exampleInputName1">Họ tên</label>
                        <input type="text" class="form-control" name="ten" id="exampleInputName1" placeholder="Tên">
                      <div> 

                      <div class="form-group">
                        <label for="exampleInputEmail3">Số điện thoại</label>
                        <input type="text" class="form-control" name="sdt" id="exampleInputEmail3" placeholder="Số điện thoại">
                      </div> 

                      <div class="form-group">
                        <label for="exampleInputEmail3">Email</label>
                        <input type="text" class="form-control" name="email" id="exampleInputEmail3" placeholder="Email">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputEmail3">Địa chỉ</label>
                        <input type="text" class="form-control" name="diachi" id="exampleInputEmail3" placeholder="Địa chỉ">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputPassword4">Ngày</label>
                        <input type="date" class="form-control" name="ngay" id="exampleInputPassword4" placeholder="Ngày">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">PTTT</label>
                        <input type="text" class="form-control" name="pttt" id="exampleInputPassword4" placeholder="Phương thức thanh toán">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Tổng tiền</label>
                        <input type="text" class="form-control" name="tongtien" id="exampleInputEmail3" placeholder="Tổng tiền">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Chú thích</label>
                        <input type="text" class="form-control" name="chuthich" id="exampleInputEmail3" placeholder="Chú thích">
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