<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
  <?php
if (isset($_GET['id_sp'])) {
    $id_sanpham = $_GET['id_sp'];
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sp=$id_sanpham ";
    $product = $db->fetchOne($sql);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // upload file
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
            move_uploaded_file($file_tmp, '../../public/img/product/' . $file_name);
            $check = true;
            echo "<script>alert('thanh cong')</script>";
        } else {
            //echo "<script>alert('ko thanh cong')</script>";
            header("location:./index.php");
        }
    }

    //


    $data =
        [
                    "tensp" => $_POST['tensp'] ? $_POST['tensp'] : '',
                    "gia" => $_POST['gia'] ? $_POST['gia'] : '',
                    "loai" => $_POST['loai'] ? $_POST['loai'] : '',
                    "hinhanh" => "public/img/product/".$file_name,
                    "chuthich" => $_POST['chuthich'] ? $_POST['chuthich'] : '',
        ];
    if($check){
        $data["hinhanh"] = "public/img/product/" . $file_name;
    }
    $update = $db->update('tbl_sanpham', $data, array('id_sp' => $id_sanpham));
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
                    <h4 class="card-title">sản phẩm</h4>
                    <p class="card-description">Thêm sản phẩm</p>
                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                        <label for="exampleInputName1">Tên sản phẩm</label>
                        <input type="text" class="form-control" required id="exampleInputName1" name="tensp" value="<?php echo $product['tensp'] ?>" placeholder="Tên">
                      <div class="form-group">
                        <label for="exampleInputEmail3">Giá</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="gia" value="<?php echo $product['gia'] ?>" placeholder="Giá">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Chú thích</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="chuthich" value="<?php echo $product['chuthich'] ?>" placeholder="Chú thích">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Loại</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="loai" value="<?php echo $product['loai'] ?>" placeholder="Loại">
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