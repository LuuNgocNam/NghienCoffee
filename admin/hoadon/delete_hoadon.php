<?php
require_once(__DIR__ .'/../../lib/autoload.php');
if(isset($_GET['id_hd']))
{
    $id = $_GET['id_hd'];
    $sql = "DELETE FROM tbl_hoadon where id_hd = $id";
    $delete = $db->delete($sql);
    if($delete > 0 ){
      $_SESSION['error'] = "SUCCESS DELETE";
      header("location:./index.php");
    }else{
      $_SESSION['error'] = "SAI";
    }
  }
?>
