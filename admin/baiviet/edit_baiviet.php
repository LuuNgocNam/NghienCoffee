<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
  <?php
if (isset($_GET['id_bv'])) {
    $id_baiviet = $_GET['id_bv'];
    $sql = "SELECT * FROM tbl_baiviet WHERE id_bv=$id_baiviet ";
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
                    "tenbv" => $_POST['tenbv'] ? $_POST['tenbv'] : '',
                    "hinhanh" => "public/img/product/".$file_name,
                    "ngay" => $_POST['ngay'] ? $_POST['ngay'] : '',
                    "noidung" => $_POST['noidung'] ? $_POST['noidung'] : '',

        ];
    if($check){
        $data["hinhanh"] = "public/img/product/" . $file_name;
    }
    $update = $db->update('tbl_baiviet', $data, array('id_bv' => $id_baiviet));
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
                <div  class="card">
                  <div class="card-body">
                    <h4 class="card-title">Bài viết</h4>
                    <p class="card-description">Thêm bài viết</p>
                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                        <label for="exampleInputName1">Tên bài viết</label>
                        <input type="text" class="form-control" required id="exampleInputName1" name="tenbv" value="<?php echo $product['tenbv'] ?>" placeholder="Tên">
                      
                        <div class="form-group">
                        <img src="<?php echo $base_url . $product['hinhanh'] ?>" width="100" height="100" alt="">
                        <input type="file" name="file" class="form-control-file">
                      </div>
                      
                        <div class="form-group">
                        <label for="exampleInputEmail3">Ngày</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="ngay" value="<?php echo $product['ngay'] ?>" placeholder="Ngày">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Nội dung</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="noidung" value="<?php echo $product['noidung'] ?>" placeholder="Nội dung">
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