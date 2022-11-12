
<?php
    require_once(__DIR__ .'/../../lib/autoload.php');
    $con = mysqli_connect('localhost','root','','nghien');

    $output = '';
    if(isset($_POST['export']))
    {

        $sql = "SELECT * FROM `tbl_hoadon`";
         

        $res =mysqli_query($con,$sql);
        
        if(mysqli_num_rows($res)>0)
        {
            $output .= '
                <table border="2" id="example">
                <thead>
                    <th style="width:200px;">Tên</th>
                    <th style="width:150px;">Số điện thoại</th>
                    <th style="width:200px;">Email</th>
                    <th style="width:200px;">Địa chỉ</th>
                    <th style="width:150px;">Ngày</th>
                    <th style="width:200px;">Phương thức thanh toán</th>
                    <th style="width:100px;">Tổng tiền</th>
                    <th style="width:200px;">Trạng thái</th>

                </thead>
                <tbody>
            ';
            while($data=mysqli_fetch_array($res)){
                $ten = $data['ten'];
                $sdt = $data['sdt'];
                $email = $data['email'];
                $diachi = $data['diachi'];
                $ngay  = $data['ngay'];
                $pttt = $data['pttt'];
                $tongtien = $data['tongtien'];
                $chuthich = $data['chuthich'];


            
                $output .='
                    <tr style="height:110px;text-align: center;border-width: 20px;">
                    <td>'.$ten.'</td>
                    <td>'.$sdt.'</td>  
                    <td>'.$email.'</td>
                    <td>'.$diachi.'</td>
                    <td>'.$ngay.'</td>  
                    <td>'.$pttt.'</td>  
                    <td>'.$tongtien.'</td>  
                    <td>'.$chuthich.'</td>  

                    </tr>
                ';
            }
            $output .= '</tbody></table>';
            
            header('Content-type: application/force-download');
            header('Content-Disposition: attachment; filename=Hoadon.xls');
            header("Content-Transfer-Encoding: BINARY");
            echo $output;
        }
        else{
            echo '<script type="text/javascript"alert("Record not FOUND! select correct data range");
                window.location.href="index.php";
                </script>
            ';
        }
    }
?>