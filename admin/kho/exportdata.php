
<?php
    require_once(__DIR__ .'/../../lib/autoload.php');
    $con = mysqli_connect('localhost','root','','nghien');

    $output = '';
    if(isset($_POST['export']))
    {

        $sql = "SELECT * FROM `tbl_kho`";
         

        $res =mysqli_query($con,$sql);
        
        if(mysqli_num_rows($res)>0)
        {
            $output .= '
                <table border="2" id="example">
                <thead>
                    <th style="width:200px;">ID</th>
                    <th style="width:200px;">Mã sản phẩm</th>
                    <th style="width:200px;">Tên</th>
                    <th style="width:200px;">Hình ảnh</th>
                    <th style="width:100px;">Số lượng nhập</th>
                    <th style="width:200px;">Số lượng tồn</th>
                    <th style="width:400px;">Giá</th>
                </thead>
                <tbody>
            ';
            while($data=mysqli_fetch_array($res)){
                $id_kho = $data['id_kho'];
                $id_sp = $data['id_sp'];
                $tensp = $data['tensp'];
                $hinhanh  = $data['hinhanh'];
                $soluongnhap = $data['soluongnhap'];
                $soluongton = $data['soluongton'];
                $gia = $data['gia'];


            
                $output .='
                    <tr style="height:110px;text-align: center;border-width: 20px;">
                    <td>'.$id_kho.'</td>
                    <td>'.$id_sp.'</td>
                    <td>'.$tensp.'</td>
                    <td style="height: 160px;"></br></br><img width="160" height="125" style="object-fit: cover;" src="http://localhost:8080/nghien/'.$hinhanh.'"></td>
                    <td>'.$soluongnhap.'</td>
                    <td>'.$soluongton.'</td>
                    <td>'.$gia.'</td>  
                    </tr>
                ';
            }
            $output .= '</tbody></table>';
            
            header('Content-type: application/force-download');
            header('Content-Disposition: attachment; filename=Khohang.xls');
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