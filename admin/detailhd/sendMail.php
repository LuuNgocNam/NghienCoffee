<?php
require_once(__DIR__ . '/../../lib/autoload.php');
include "./../../modules/PHPMailer-master/src/PHPMailer.php";
include "./../../modules/PHPMailer-master/src/Exception.php";
include "./../../modules/PHPMailer-master/src/OAuth.php";
include "./../../modules/PHPMailer-master/src/POP3.php";
include "./../../modules/PHPMailer-master/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET["id_hd"])) {
        $idhd = $_GET['id_hd'];
        $sql_bill = "SELECT * FROM tbl_hoadon WHERE id_hd = $idhd ";
        $bill = $db->fetchOne($sql_bill);


        $userName = $bill["ten"];
        $sdt = $bill["sdt"];
        $email = $bill["email"];
        $addr = $bill["diachi"];



        $str_body = '';
        $str_body .= '
    <p>
        <b>Khách hàng:</b> ' . $userName . '<br>
        <b>Điện thoại:</b> ' . $sdt . '<br>
        <b>Địa chỉ:</b> ' . $addr . '<br>
    </p>
        ';


        $str_body .= '

    <p>
        Cám ơn quý khách đã mua hàng tại cửa hàng của chúng tôi, bộ phận giao hàng sẽ liên hệ với quý khách để xác nhận đặt hàng thành công và chuyển hàng đến quý khách chậm nhất sau vài phút .
        <div class="logo"><img src="https://i.pinimg.com/originals/74/a8/69/74a869d8b2826650a67625b758e96689.jpg" width="300px style="margin-left: 250px;"></div>
    </p>
    ';

        /////////////////////////

        $mail = new PHPMailer(true);                              // Passing 'true' enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'nghiencofffe@gmail.com';                 // SMTP username
            $mail->Password = 'kxpxlouwtxkmngls';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, 'ssl' also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->CharSet = 'UTF-8';
            $mail->setFrom('nghiencofffe@gmail.com', 'Nghiện Coffe');                // Gửi mail tới Mail Server
            $mail->addAddress($email);               // Gửi mail tới mail người nhận
            //$mail->addReplyTo('ceo.vietpro@gmail.com', 'Information');
            // $mail->addCC('quantri.vietproshop@gmail.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Xác nhận đơn hàng từ Nghiện Coffe';
            $mail->Body    = $str_body;
            $mail->AltBody = 'Mô tả đơn hàng';

            $mail->send();
            
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
    
}
echo "<script>window.location.href = '/nghien/admin/hoadon/index.php'</script>";
// echo "<script>window.location.href = '/admin/bill/index.php'</script>";
?>