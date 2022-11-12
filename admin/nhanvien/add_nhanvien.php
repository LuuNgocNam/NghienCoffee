<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
                  move_uploaded_file($file_tmp, '../../public/admin/images/'.$file_name);
                  echo "<script>alert('thanh cong')</script>";
                }
                else{
                    echo "<script>alert('ko thanh cong')</script>";
                }
            }
            $data =
                [
                    "tennv" => $_POST['tennv'] ? $_POST['tennv'] : '',
                    "ngaysinh" => $_POST['ngaysinh'] ? $_POST['ngaysinh'] : '',
                    "gioitinh" => $_POST['gioitinh'] ? $_POST['gioitinh'] : '',
                    "sdt" => $_POST['sdt'] ? $_POST['sdt'] : '',
                    "diachi" => $_POST['diachi'] ? $_POST['diachi'] : '',
                    "hinhanh" => "public/admin/images/".$file_name,


                ];
            $insert = $db->insert('tbl_nhanvien', $data);
            if ($insert > 0) {
                $_SESSION['error']="Thêm thành công";
                header('Location: ./index.php');
            } else{
                $_SESSION['error']="không thành công";
                header('Location: ./add_nhanvien.php');
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
                    <h4 class="card-title">Nhân viên</h4>
                    <p class="card-description">Thêm nhân viên</p>
                    <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                        <label for="exampleInputName1">Tên nhân viên</label>
                        <input type="text" class="form-control" name="tennv" id="exampleInputName1" placeholder="Tên">
                        <div class="form-group">
                        <label for="exampleInputEmail3">Ngày sinh</label>
                        <input type="text" class="form-control" name="ngaysinh" id="exampleInputEmail3" placeholder="Ngày sinh">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputEmail3">Giới tính</label>
                        <input type="text" class="form-control" name="gioitinh" id="exampleInputEmail3" placeholder="Giới tính">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputPassword4">sdt</label>
                        <input type="text" class="form-control" name="sdt" id="exampleInputPassword4" placeholder="Số điện thoại">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Địa chỉ</label>
                        <input type="text" class="form-control" name="diachi" id="exampleInputEmail3" placeholder="Địa chỉ">
                      </div> 
                      <div class="form-group">
                        <input type="file" required name="file" class="form-control-file">
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