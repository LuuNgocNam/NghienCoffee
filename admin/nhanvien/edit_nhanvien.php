<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
  <?php
if (isset($_GET['id_nv'])) {
    $id_nhanvien = $_GET['id_nv'];
    $sql = "SELECT * FROM tbl_nhanvien WHERE id_nv=$id_nhanvien ";
    $product = $db->fetchOne($sql);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $check = false;
      if (isset($_FILES['file'])) {
          $errors = array();
          $file_name = $_FILES['file']['name'];
          $file_size = $_FILES['file']['size'];
          $file_tmp = $_FILES['file']['tmp_name'];
          $file_type = $_FILES['file']['type'];
          $file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));
          $expensions = array("jpeg", "jpg", "png");

          if (in_array($file_ext, $expensions) === false) {
              $errors[] = "Không chấp nhận định dạng ảnh có đuôi này, mời bạn chọn JPEG hoặc PNG.";
          }

          if (empty($errors) == true) {
              move_uploaded_file($file_tmp, '../../public/admin/images/' . $file_name);
              $check = true;
              echo "<script>alert('thanh cong')</script>";
          } else {
              //echo "<script>alert('ko thanh cong')</script>";
              header("location:./index.php");
          }
      }

 


    $data =
        [
                    "tennv" => $_POST['tennv'] ? $_POST['tennv'] : '',
                    "ngaysinh" => $_POST['ngaysinh'] ? $_POST['ngaysinh'] : '',
                    "gioitinh" => $_POST['gioitinh'] ? $_POST['gioitinh'] : '',
                    "chucvu" => $_POST['chucvu'] ? $_POST['chucvu'] : '',
                    "diachi" => $_POST['diachi'] ? $_POST['diachi'] : '',
                    "hinhanh" => "public/admin/images/".$file_name,



        ];

    $update = $db->update('tbl_nhanvien', $data, array('id_nv' => $id_nhanvien));
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
                    <h4 class="card-title">Nhân viên</h4>
                    <p class="card-description">Thêm nhân viên</p>
                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                        <label for="exampleInputName1">Tên nhân viên</label>
                        <input type="text" class="form-control" required id="exampleInputName1" name="tennv" value="<?php echo $product['tennv'] ?>" placeholder="Tên">
                      <div class="form-group">
                        <label for="exampleInputEmail3">Ngày sinh</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="ngaysinh" value="<?php echo $product['ngaysinh'] ?>" placeholder="Ngày sinh">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Giới tính</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="gioitinh" value="<?php echo $product['gioitinh'] ?>" placeholder="Giới tính">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Chức vụ</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="chucvu" value="<?php echo $product['chucvu'] ?>" placeholder="Chức vụ">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Địa chỉ</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="diachi" value="<?php echo $product['diachi'] ?>" placeholder="Địa chỉ">
                      </div>
                      <div class="form-group">
                        <img src="<?php echo $base_url . $product['hinhanh'] ?>" width="100" height="100" alt="">
                        <input type="file" name="file" class="form-control-file">
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