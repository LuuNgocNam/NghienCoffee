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
                    "username" => $_POST['username'] ? $_POST['username'] : '',
                    "password" => $_POST['password'] ? $_POST['password'] : '',



                ];
            $insert = $db->insert('tbl_admin', $data);
            if ($insert > 0) {
                $_SESSION['error']="Thêm thành công";
                header('Location: ./index.php');
            } else{
                $_SESSION['error']="không thành công";
                header('Location: ./add_user.php');
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
                    <h4 class="card-title">Tài khoản</h4>
                    <p class="card-description">Thêm tài khoản</p>
                    <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                        <label for="exampleInputName1">Tài khoản</label>
                        <input type="text" class="form-control" name="username" id="exampleInputName1" placeholder="Tài khoản">
                        <div class="form-group">
                        <label for="exampleInputEmail3">Mật khẩu</label>
                        <input type="text" class="form-control" name="password" id="exampleInputEmail3" placeholder="Mật khẩu">
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