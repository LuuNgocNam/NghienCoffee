<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
  <?php
if (isset($_GET['id_cthd'])) {
    $id_cthd = $_GET['id_cthd'];
    $sql = "SELECT * FROM tbl_cthoadon WHERE id_cthd=$id_cthd ";
    $product = $db->fetchOne($sql);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data =
        [
                    "id_sp" => $_POST['id_sp'] ? $_POST['id_sp'] : '',
                    "tensp" => $_POST['tensp'] ? $_POST['tensp'] : '',
                    "gia" => $_POST['gia'] ? $_POST['gia'] : '',
                    "loai" => $_POST['loai'] ? $_POST['loai'] : '',
                    "tongtien" => $_POST['tongtien'] ? $_POST['tongtien'] : '',
        ];
    // if($check){
    //     $data["hinhanh"] = "public/img/product/" . $file_name;
    // }
    $update = $db->update('tbl_cthoadon', $data, array('id_hd' => $id_hd));
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
                        <label for="exampleInputPassword4">Số lượng</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="soluong" value="<?php echo $product['soluong'] ?>" placeholder="Số lượng">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Tổng tiền</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="tongtien" value="<?php echo $product['tongtien'] ?>" placeholder="Tổng tiền">
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