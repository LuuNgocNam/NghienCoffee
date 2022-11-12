<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="./print.css">
        <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script> -->
        <title>In Hóa đơn</title>
    </head>
    
    <?php
        require_once(__DIR__ .'/../../lib/autoload.php');
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            if(isset($_GET['id_cthd'])){
                $id = $_GET['id_cthd'];
                $bill = $db->fetchOne("Select * from tbl_hoadon where id_hd = $id");
                
                $billinfor=$db->fetchAll("SELECT `tbl_sanpham`.`tensp` as `tensp1`, `tbl_sanpham`.`tensp` as `tensp2`, `tbl_cthoadon`.`gia` , `tbl_cthoadon`.`soluong` , `tbl_cthoadon`.`tongtien` FROM `tbl_cthoadon`, `tbl_sanpham` WHERE `tbl_cthoadon`.`id_sphd` = `tbl_sanpham`.`id_sp` and `id_cthd` = $id;");

            }else{
                header('Location: ./index.php');
            }
            
        }
    ?>
    
    <body onload="window.print();">
        <!--onload="window.print();" -->
        <div id="page" class="page">
            <div class="header">
            <img src="1.png" width="200px" style="margin-left: 250px;">
            </div>
            <br />
            <div class="title">
                HÓA ĐƠN THANH TOÁN

            </div>
            <br />
            <br />
            <div>
                <div class="customer">
                Khách hàng : <?php echo $bill['ten']?>
                </div>
                <div class="customer">
                SĐT : <?php echo $bill['sdt']?>
                </div>
                <div class="customer">
                Địa chỉ giao hàng : <?php echo $bill['diachi']?>
                </div>
            </div>
            <table class="TableData">
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá($)</th>
                    <th>Số lượng</th>
                    <th>Thành tiền($)</th>
                </tr>
                <?php $stt=1; foreach($billinfor as $item): ?>
                    <tr>
                        <td><?php echo $stt++ ?></td>
                        <td><?php echo $item['tensp1'].' '.$item['tensp2'] ?></td>
                        <td><?php echo $item['gia'] ?></td>
                        <td><?php echo $item['soluong'] ?></td>
                        <td><?php echo $item['tongtien'] ?></td>
                    </tr>                 
                <?php endforeach; ?>
    
                <tr>
                    <td colspan="4" class="tong">Tổng cộng($)</td>
                    <td class="cotSo"><?php echo $bill['tongtien'] ?></td>
                </tr>
            </table>
            <div class="footer-left"><br />
                Khách hàng </div>
            <?php
                date_default_timezone_set('Asia/Ho_Chi_Minh');
            ?>
            <div class="footer-right"> Hà Nội, ngày <?php echo date("d") ?> tháng <?php echo date("m") ?> năm <?php echo date("Y") ?> <br /> Người tạo <br />
        </div>
    </body> 
</html>