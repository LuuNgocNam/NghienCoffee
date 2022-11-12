<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
  <?php
if (isset($_GET['id_hd'])) {
    $id_hd = $_GET['id_hd'];
    $sql = "SELECT * FROM tbl_hoadon WHERE id_hd=$id_hd ";
    $product = $db->fetchOne($sql);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data =
        [
                    "ten" => $_POST['ten'] ? $_POST['ten'] : '',
                    "sdt" => $_POST['sdt'] ? $_POST['sdt'] : '',
                    "email" => $_POST['email'] ? $_POST['email'] : '',
                    "ngay" => $_POST['ngay'] ? $_POST['ngay'] : '',
                    "pttt" => $_POST['pttt'] ? $_POST['pttt'] : '',
                    "tongtien" => $_POST['tongtien'] ? $_POST['tongtien'] : '',
                    "chuthich" => $_POST['chuthich'] ? $_POST['chuthich'] : '',



        ];

    $update = $db->update('tbl_hoadon', $data, array('id_hd' => $id_hd));
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
                    <h4 class="card-title">Hoá Đơn</h4>
                    <p class="card-description">Thêm hoá đơn</p>
                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                        <label for="exampleInputName1">Họ tên</label>
                        <input type="text" class="form-control" required id="exampleInputName1" name="ten" value="<?php echo $product['ten'] ?>" placeholder="Tên">
                      <div class="form-group">
                        <label for="exampleInputEmail3">Số điện thoại</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="sdt" value="<?php echo $product['sdt'] ?>" placeholder="Số điện thoại">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="email" value="<?php echo $product['email'] ?>" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Địa chỉ</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="diachi" value="<?php echo $product['diachi'] ?>" placeholder="Địa chỉ">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Ngày</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="ngay" value="<?php echo $product['ngay'] ?>" placeholder="Ngày">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Phương thức thanh toán</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="pttt" value="<?php echo $product['pttt'] ?>" placeholder="Phương thức thanh toán">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Tổng tiền</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="tongtien" value="<?php echo $product['tongtien'] ?>" placeholder="Tổng tiền">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Trạng thái</label>
                        <select name="chuthich" class="form-control">
                          <option style="color: red;" value="Đã thanh toán">Đã thanh toán</option>
                          <option value="Chưa thành toán" selected>Chưa thánh toán</option>
                        </select> 
                      </div>
                      <a class="btn btn-gradient-primary mr-2" href="../detailhd/index.php?id_hd=<?php echo $product['id_hd'] ?>">Chi Tiết Hóa ĐƠn</a>
                      <button class="btn btn-gradient-primary mt-2" type="submit"><a href="./../detailhd/sendMail.php?id_hd=<?php echo $product['id_hd'] ?>" class="card-description" style="color: white;font-weight: bold;">Gửi Mail</a></button>     
                      <input type="submit" class="btn btn-gradient-primary mr-2" name="update" value="Update">
                      <!-- <input type="submit" class="btn btn-gradient-primary mr-2" name="detail_hd" value="Detail"> -->
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