<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
  <?php
if (isset($_GET['id_khachhang'])) {
    $id_khachhang = $_GET['id_khachhang'];
    $sql = "SELECT * FROM tbl_khachhang WHERE id_khachhang=$id_khachhang ";
    $product = $db->fetchOne($sql);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {


 


    $data =
        [
                    "tenkh" => $_POST['tenkh'] ? $_POST['tenkh'] : '',
                    "ngaysinh" => $_POST['ngaysinh'] ? $_POST['ngaysinh'] : '',
                    "email" => $_POST['email'] ? $_POST['email'] : '',
                    "sdt" => $_POST['sdt'] ? $_POST['sdt'] : '',
                    "diachi" => $_POST['diachi'] ? $_POST['diachi'] : '',



        ];

    $update = $db->update('tbl_khachhang', $data, array('id_khachhang' => $id_khachhang));
    if ($update > 0) {
        $_SESSION['error'] = "sửa thành công";
        header('Location: ./index.php');
    } else
        $_SESSION['error'] = "không thành công";
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
                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                        <label for="exampleInputName1">Tên khách hàng</label>
                        <input type="text" class="form-control" required id="exampleInputName1" name="tenkh" value="<?php echo $product['tenkh'] ?>" placeholder="Tên">
                      <div class="form-group">
                        <label for="exampleInputEmail3">Ngày sinh</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="ngaysinh" value="<?php echo $product['ngaysinh'] ?>" placeholder="Ngày sinh">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Email</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="email" value="<?php echo $product['email'] ?>" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Số điện thoại</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="sdt" value="<?php echo $product['sdt'] ?>" placeholder="Số điện thoại">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Địa chỉ</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="diachi" value="<?php echo $product['diachi'] ?>" placeholder="Địa chỉ">
                      </div>



                      <input type="submit" class="btn btn-gradient-primary mr-2" name="update" value="Update">
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