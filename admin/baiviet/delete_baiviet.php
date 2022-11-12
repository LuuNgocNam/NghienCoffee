<?php
require_once(__DIR__ .'/../../lib/autoload.php');
if(isset($_GET['id_bv']))
{
    $id = $_GET['id_bv'];
    $sql = "DELETE FROM tbl_baiviet where id_bv = $id";
    $delete = $db->delete($sql);
    if($delete > 0 ){
      $_SESSION['error'] = "SUCCESS DELETE";
      header("location:./index.php");
    }else{
      $_SESSION['error'] = "SAI";
    }
  }
?>
