<?php
require_once(__DIR__ .'/../../lib/autoload.php');
if(isset($_GET['id_dv']))
{
    $id = $_GET['id_dv'];
    $sql = "DELETE FROM tbl_dichvu where id_dv = $id";
    $delete = $db->delete($sql);
    if($delete > 0 ){
      $_SESSION['error'] = "SUCCESS DELETE";
      header("location:./index.php");
    }else{
      $_SESSION['error'] = "SAI";
    }
  }
?>
