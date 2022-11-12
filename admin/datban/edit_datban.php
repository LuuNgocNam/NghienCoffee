<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
  <?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_datban WHERE id=$id ";
    $product = $db->fetchOne($sql);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {


 


    $data =
        [
                    "ten" => $_POST['ten'] ? $_POST['ten'] : '',
                    "sdt" => $_POST['sdt'] ? $_POST['sdt'] : '',
                    "ngay" => $_POST['ngay'] ? $_POST['ngay'] : '',
                    "gio" => $_POST['gio'] ? $_POST['gio'] : '',
                    "loinhan" => $_POST['loinhan'] ? $_POST['loinhan'] : '',
        ];

    $update = $db->update('tbl_datban', $data, array('id' => $id));
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
                    <h4 class="card-title">Đặt bàn</h4>
                    <p class="card-description">Thêm đặt bàn</p>
                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                        <label for="exampleInputName1">Tên</label>
                        <input type="text" class="form-control" required id="exampleInputName1" name="ten" value="<?php echo $product['ten'] ?>" placeholder="Tên">
                      <div class="form-group">
                        <label for="exampleInputEmail3">Số điện thoại</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="sdt" value="<?php echo $product['sdt'] ?>" placeholder="Số điện thoại">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Ngày</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="ngay" value="<?php echo $product['ngay'] ?>" placeholder="Ngày">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Giờ</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="gio" value="<?php echo $product['gio'] ?>" placeholder="Giờ">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Lời nhắn</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="loinhan" value="<?php echo $product['loinhan'] ?>" placeholder="Lời nhắn">
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