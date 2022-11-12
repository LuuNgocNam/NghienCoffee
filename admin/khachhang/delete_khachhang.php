<?php
require_once(__DIR__ .'/../../lib/autoload.php');
if(isset($_GET['id_khachhang']))
{
    $id = $_GET['id_khachhang'];
    $sql = "DELETE FROM tbl_khachhang where id_khachhang = $id";
    $delete = $db->delete($sql);
    if($delete > 0 ){
      $_SESSION['error'] = "SUCCESS DELETE";
      header("location:./index.php");
    }else{
      $_SESSION['error'] = "SAI";
    }
  }
?>
