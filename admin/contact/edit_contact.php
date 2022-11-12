<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
    
  </head>
  <?php
if (isset($_GET['id_ct'])) {
    $id = $_GET['id_ct'];
    $sql = "SELECT * FROM tbl_contact WHERE id_ct=$id ";
    $product = $db->fetchOne($sql);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {


 


    $data =
        [
                    "ten" => $_POST['ten'] ? $_POST['ten'] : '',
                    "email" => $_POST['email'] ? $_POST['email'] : '',
                    "danhgia" => $_POST['danhgia'] ? $_POST['danhgia'] : '',
                    "loinhac" => $_POST['loinhac'] ? $_POST['loinhac'] : '',
        ];

    $update = $db->update('tbl_contact', $data, array('id_ct' => $id));
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
                    <h4 class="card-title">Liên hệ</h4>
                    <p class="card-description">Thêm liên hệ</p>
                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                        <label for="exampleInputName1">Tên</label>
                        <input type="text" class="form-control" required id="exampleInputName1" name="ten" value="<?php echo $product['ten'] ?>" placeholder="Tên">
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="email" value="<?php echo $product['email'] ?>" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Đánh giá</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="danhgia" value="<?php echo $product['danhgia'] ?>" placeholder="Đánh giá">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Lời nhắc</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="loinhac" value="<?php echo $product['loinhac'] ?>" placeholder="Lời nhắc">
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