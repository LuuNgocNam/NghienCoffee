<?php
  require_once(__DIR__ .'/../../lib/autoload.php');
?>

<?php 
  if(isset($_SESSION['login'])){
    $username = $_SESSION['login'];
    // echo $_SESSION['login'];
  }else{
    header("location:./login.php");
  }
?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <link rel="stylesheet" href="<?php echo $base_url?>public/site/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo $base_url?>public/site/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo $base_url?>public/site/css/style.css">
    <link rel="shortcut icon" href="<?php echo $base_url?>public/site/images/favicon.ico" />