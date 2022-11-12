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

                    "tensp" => $_POST['tensp'] ? $_POST['tensp'] : '',
                    "gia" => $_POST['gia'] ? $_POST['gia'] : '',
                    "soluong" => $_POST['soluong'] ? $_POST['soluong'] : '',
                    "tongtien" => $_POST['tongtien'] ? $_POST['chuthich'] : '',
                    
                ];
            $insert = $db->insert('tbl_cthoadon', $data);
            if ($insert > 0) {
                $_SESSION['error']="Thêm thành công";
                header('Location: ./index.php');
            } else{
                $_SESSION['error']="không thành công";
                header('Location: ./add_cthoadon.php');
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
                    <h4 class="card-title">sản phẩm</h4>
                    <p class="card-description">Thêm sản phẩm</p>
                    <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                        <label for="exampleInputName1">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="tensp" id="exampleInputName1" placeholder="Tên sản phẩm">
                      <div class="form-group">
                        <label for="exampleInputEmail3">Giá</label>
                        <input type="text" class="form-control" name="gia" id="exampleInputEmail3" placeholder="Giá">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputPassword4">Số lượng</label>
                        <input type="text" class="form-control" name="soluong" id="exampleInputPassword4" placeholder="Số lượng">
                      </div>                      
         
                      <div class="form-group">
                        <label for="exampleInputPassword4">Tổng tiền</label>
                        <input type="text" class="form-control" name="tongtien" id="exampleInputPassword4" placeholder="Tổng tiền">
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