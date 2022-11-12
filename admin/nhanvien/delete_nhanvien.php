<?php
require_once(__DIR__ .'/../../lib/autoload.php');
if(isset($_GET['id_nv']))
{
    $id = $_GET['id_nv'];
    $sql = "DELETE FROM tbl_nhanvien where id_nv = $id";
    $delete = $db->delete($sql);
    if($delete > 0 ){
      $_SESSION['error'] = "SUCCESS DELETE";
      header("location:./index.php");
    }else{
      $_SESSION['error'] = "SAI";
    }
  }
?>
