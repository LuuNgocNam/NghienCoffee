
<?php
    require_once(__DIR__ .'/../../lib/autoload.php');
    $con = mysqli_connect('localhost','root','','nghien');

    $output = '';
    if(isset($_POST['export']))
    {

        $sql = "SELECT * FROM `tbl_sanpham`";
         

        $res =mysqli_query($con,$sql);
        
        if(mysqli_num_rows($res)>0)
        {
            $output .= '
                <table border="2" id="example">
                <thead>
                    <th style="width:200px;">Tên</th>
                    <th style="width:100px;">Giá</th>
                    <th style="width:200px;">Loại</th>
                    <th style="width:200px;">Hình ảnh</th>
                    <th style="width:400px;">Chú thích</th>

                </thead>
                <tbody>
            ';
            while($data=mysqli_fetch_array($res)){
                $tensp = $data['tensp'];
                $gia = $data['gia'];
                $loai = $data['loai'];
                $hinhanh  = $data['hinhanh'];
                $chuthich = $data['chuthich'];


            
                $output .='
                    <tr style="height:110px;text-align: center;border-width: 20px;">
                    <td>'.$tensp.'</td>
                    <td>'.$gia.'</td>  
                    <td>'.$loai.'</td>
                    <td style="height: 160px;"></br></br><img width="160" height="125" style="object-fit: cover;" src="http://localhost:8080/nghien/'.$hinhanh.'"></td>
                    <td>'.$chuthich.'</td>  
                    </tr>
                ';
            }
            $output .= '</tbody></table>';
            
            header('Content-type: application/force-download');
            header('Content-Disposition: attachment; filename=Sanpham.xls');
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