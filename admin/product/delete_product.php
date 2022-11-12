<?php
require_once(__DIR__ .'/../../lib/autoload.php');
if(isset($_GET['id_sp']))
{
    $id = $_GET['id_sp'];
    $sql = "DELETE FROM tbl_sanpham where id_sp = $id";
    $delete = $db->delete($sql);
    if($delete > 0 ){
      $_SESSION['error'] = "SUCCESS DELETE";
      header("location:./index.php");
    }else{
      $_SESSION['error'] = "SAI";
    }
  }
?>
