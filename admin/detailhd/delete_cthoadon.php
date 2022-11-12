<?php
require_once(__DIR__ .'/../../lib/autoload.php');
if(isset($_GET['id_cthd']))
{
    $id = $_GET['id_cthd'];
    $sql = "DELETE FROM tbl_cthoadon where id_cthd = $id";
    $delete = $db->delete($sql);
    if($delete > 0 ){
      $_SESSION['error'] = "SUCCESS DELETE";
      header("location:./index.php");
    }else{
      $_SESSION['error'] = "SAI";
    }
  }
?>
