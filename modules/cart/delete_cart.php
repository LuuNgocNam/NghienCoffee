<?php 
    session_start();
    echo "trc :<br>";
    var_dump($_SESSION['cart']);
    var_dump($_SESSION['soluong']);

    if(isset($_GET) && isset($_GET['id_sp'])){
        $id_sp = $_GET['id_sp'];
        if(isset($_SESSION['cart'][$id_sp])){
            unset($_SESSION['cart'][$id_sp]);
        }

    }
    if(count($_SESSION['cart'])>0){
        $count = 0;
        foreach ($_SESSION['cart'] as $key => $value) {
            $count += $value;
        }
        $_SESSION['soluong'] = $count;
    }
        echo "<br>sau :\n <br>";
    var_dump($_SESSION['cart']);
    var_dump($_SESSION['soluong']);
    header("location: ../../coffee1-master/cart.php");
?>