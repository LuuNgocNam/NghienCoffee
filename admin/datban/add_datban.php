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
                    "ngay" => $_POST['ngay'] ? $_POST['ngay'] : '',
                    "gio" => $_POST['gio'] ? $_POST['gio'] : '',
                    "loinhan" => $_POST['loinhan'] ? $_POST['loinhan'] : '',

                ];
            $insert = $db->insert('tbl_datban', $data);
            if ($insert > 0) {
                $_SESSION['error']="Thêm thành công";
                header('Location: ./index.php');
            } else{
                $_SESSION['error']="không thành công";
                header('Location: ./add_datban.php');
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
                    <h4 class="card-title">Đặt bàn</h4>
                    <p class="card-description">Thêm Đặt bàn</p>
                    <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                        <label for="exampleInputName1">Tên</label>
                        <input type="text" class="form-control" name="ten" id="exampleInputName1" placeholder="Tên">
                      <div class="form-group">
                        <label for="exampleInputEmail3">Số điện thoại</label>
                        <input type="text" class="form-control" name="sdt" id="exampleInputEmail3" placeholder="Số điện thoại">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputEmail3">Ngày</label>
                        <input type="text" class="form-control" name="ngay" id="exampleInputEmail3" placeholder="Ngày">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputEmail3">Giờ</label>
                        <input type="text" class="form-control" name="gio" id="exampleInputEmail3" placeholder="Giờ">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputEmail3">Lời nhắn</label>
                        <input type="text" class="form-control" name="loinhan" id="exampleInputEmail3" placeholder="Lời nhắn">
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