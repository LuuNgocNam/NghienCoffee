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
                    "email" => $_POST['email'] ? $_POST['email'] : '',
                    "danhgia" => $_POST['danhgia'] ? $_POST['danhgia'] : '',
                    "loinhac" => $_POST['loinhac'] ? $_POST['loinhac'] : '',

                ];
            $insert = $db->insert('tbl_contact', $data);
            if ($insert > 0) {
                $_SESSION['error']="Thêm thành công";
                header('Location: ./index.php');
            } else{
                $_SESSION['error']="không thành công";
                header('Location: ./add_contact.php');
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
                    <h4 class="card-title">Liên hệ</h4>
                    <p class="card-description">Thêm Liên hệ</p>
                    <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                        <label for="exampleInputName1">Tên</label>
                        <input type="text" class="form-control" name="ten" id="exampleInputName1" placeholder="Tên">
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email</label>
                        <input type="text" class="form-control" name="email" id="exampleInputEmail3" placeholder="email">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputEmail3">Đánh giá</label>
                        <input type="text" class="form-control" name="danhgia" id="exampleInputEmail3" placeholder="Đánh giá">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputEmail3">Lời nhắc</label>
                        <input type="text" class="form-control" name="loinhan" id="exampleInputEmail3" placeholder="Lời nhắc">
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