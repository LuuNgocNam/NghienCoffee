<?php
require_once(__DIR__ .'/../../lib/autoload.php');
if(isset($_GET['id_ct']))
{
    $id = $_GET['id_ct'];
    $sql = "DELETE FROM tbl_contact where id_ct = $id";
    $delete = $db->delete($sql);
    if($delete > 0 ){
      $_SESSION['error'] = "SUCCESS DELETE";
      header("location:./index.php");
    }else{
      $_SESSION['error'] = "SAI";
    }
  }
?>
