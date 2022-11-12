<?php
require_once(__DIR__ .'/../../lib/autoload.php');
if(isset($_GET['id_kho']))
{
    $id = $_GET['id_kho'];
    $sql = "DELETE FROM tbl_kho where id_kho = $id";
    $delete = $db->delete($sql);
    if($delete > 0 ){
      $_SESSION['error'] = "SUCCESS DELETE";
      header("location:./index.php");
    }else{
      $_SESSION['error'] = "SAI";
    }
  }
?>
