<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
    <?php
	    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // upload file
            if(isset($_FILES['file'])){
                $errors= array();
                $file_name = $_FILES['file']['name'];
                $file_size =$_FILES['file']['size'];
                $file_tmp =$_FILES['file']['tmp_name'];
                $file_type=$_FILES['file']['type'];
                $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
                $expensions= array("jpeg","jpg","png");
                
                if(in_array($file_ext,$expensions)=== false){
                   $errors[]="Không chấp nhận định dạng ảnh có đuôi này, mời bạn chọn JPEG hoặc PNG.";
                }
                            
                if(empty($errors)==true){
                   move_uploaded_file($file_tmp, '../../public/img/product/'.$file_name);
                   echo "<script>alert('thanh cong')</script>";
                }
                else{
                    echo "<script>alert('ko thanh cong')</script>";
                }
             }
    
            $data =
                [
                    "id_sp" => $_POST['id_sp'] ? $_POST['id_sp'] : '',
                    "tensp" => $_POST['tensp'] ? $_POST['tensp'] : '',
                    "hinhanh" => "public/img/product/".$file_name,
                    "soluongnhap" => $_POST['soluongnhap'] ? $_POST['soluongnhap'] : '',
                    "soluongton" => $_POST['soluongton'] ? $_POST['soluongton'] : '',
                    "gia" => $_POST['gia'] ? $_POST['gia'] : '',
                ];
            $insert = $db->insert('tbl_kho', $data);
            if ($insert > 0) {
                $_SESSION['error']="Thêm thành công";
                header('Location: ./index.php');
            } else{
                $_SESSION['error']="không thành công";
                header('Location: ./add_kho.php');
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
                    <h4 class="card-title">Kho</h4>
                    <p class="card-description">Thêm kho</p>
                    <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                        <label for="exampleInputName1">Mã sản phẩm</label>
                        <input type="text" class="form-control" name="id_sp" id="exampleInputName1" placeholder="Mã">
                      <div class="form-group">
                        <label for="exampleInputEmail3">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="tensp" id="exampleInputEmail3" placeholder="Tên">
                      </div> 
                               
                      <div class="form-group">
                        <input type="file" required name="file" class="form-control-file">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputPassword4">Số lượng nhập</label>
                        <input type="text" class="form-control" name="soluongnhap" id="exampleInputPassword4" placeholder="Số lượng">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Số lượng tồn</label>
                        <input type="text" class="form-control" name="soluongton" id="exampleInputPassword4" placeholder="Số lượng">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Giá</label>
                        <input type="text" class="form-control" name="gia" id="exampleInputEmail3" placeholder="Giá">
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