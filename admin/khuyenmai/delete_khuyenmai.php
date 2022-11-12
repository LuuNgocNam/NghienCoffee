<?php
require_once(__DIR__ .'/../../lib/autoload.php');
if(isset($_GET['id_km']))
{
    $id = $_GET['id_km'];
    $sql = "DELETE FROM tbl_khuyenmai where id_km = $id";
    $delete = $db->delete($sql);
    if($delete > 0 ){
      $_SESSION['error'] = "SUCCESS DELETE";
      header("location:./index.php");
    }else{
      $_SESSION['error'] = "SAI";
    }
  }
?>
