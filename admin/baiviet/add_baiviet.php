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
                    "tenbv" => $_POST['tenbv'] ? $_POST['tenbv'] : '',
                    "hinhanh" => "public/img/product/".$file_name,
                    "tacgia" => $_POST['tacgia'] ? $_POST['tacgia'] : '',
                    "ngay" => $_POST['ngay'] ? $_POST['ngay'] : '',
                    "binhluan" => $_POST['binhluan'] ? $_POST['binhluan'] : '',
                    "noidung" => $_POST['noidung'] ? $_POST['noidung'] : '',

                ];
            $insert = $db->insert('tbl_baiviet', $data);
            if ($insert > 0) {
                $_SESSION['error']="Thêm thành công";
                header('Location: ./index.php');
            } else{
                $_SESSION['error']="không thành công";
                header('Location: ./add_baiviet.php');
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
                    <h4 class="card-title">Bài viết</h4>
                    <p class="card-description">Thêm bài viết</p>
                    <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                        <label for="exampleInputName1">Tên bài viết</label>
                        <input type="text" class="form-control" name="tenbv" id="exampleInputName1" placeholder="Tên bài viết">
                      <div class="form-group">

                      <div class="form-group">
                        <input type="file" required name="file" class="form-control-file">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail3">Tác giả</label>
                        <input type="text" class="form-control" name="tacgia" id="exampleInputEmail3" placeholder="Tác giả">
                      </div> 
                      <div class="form-group">
                        <label for="exampleInputPassword4">Ngày</label>
                        <input type="text" class="form-control" name="ngay" id="exampleInputPassword4" placeholder="Ngày">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Bình luận</label>
                        <input type="text" class="form-control" name="binhluan" id="exampleInputPassword4" placeholder="Bình luận">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Nội dung</label>
                        <input type="text" class="form-control" name="noidung" id="exampleInputPassword4" placeholder="Nội dung">
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