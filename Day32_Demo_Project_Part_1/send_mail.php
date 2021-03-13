<?php
/**
 * send_mail.php
 * Tạo cùng cấp với thư mục PHPMailer
 * - Cách gửi mail sử dụng PHP
 * - Web thực tế có rất nhiều chức năng cần gửi mail:
 * mail đky tài khoản, mail xác nhận đơn hàng ...
 */
// Email nhận
$to = 'nguyenvietmanhit@gmail.com';
$subject = 'Tiêu đề mail';
$message = "<b>Nội dung gửi mail</b>";

//mail($to, $subject, $message);
// Khi chạy code trên sẽ báo lỗi và ko gửi đc mail
// -> mặc định hàm mail của PHP sẽ chưa gửi đc mail, cần
// cấu hình webserver / XAMPP thì mới gửi đc, tuy nhiên
//việc cấu hình là khá phức tạp, nên ưu tiên sử dụng
// thư viện có sẵn để gửi mail -> PHPMailer
// - Search PHPMailer
?>

<?php
// Demo gửi mail với thư viện PHPMailer
// - Download thư viện về
// - Copy code mẫu từ doc của PHPMailer
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// - Nhúng các file theo đúng thứ tự sau
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';


//Load Composer's autoloader
//require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
  //Server settings
  // - Cấu hình cho phép gửi mail chứa ký tự có dấu
  $mail->CharSet = 'UTF-8';
  // - Debug gửi mail, tắt dùng DEBUG_OFF
  $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP

  // Server gửi mail: sử dụng Gmail làm server, free
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

  // Username là username gmail của bạn
  $mail->Username   = 'nguyenvietmanhit@gmail.com';                     //SMTP username
  // Password ko phải là password đăng nhập vào Gmail
  //, là mật khẩu ứng dụng -> cần lấy bằng cách sau:
  // Truy cập myaccount.google.com -> Bảo mật -> Tạo
  // mật khẩu ứng dung -> CẦn tạo xác thực 2 bước thì
  // mới tạo đc
  $mail->Password   = 'gxmntlqtkewqkgfa';                               //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
  $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

  //Recipients
  // - Set tên người gửi thay vì dùng email mặc định
  $mail->setFrom('nguyenvietmanhit@gmail.com', 'NVManh');
//  $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
  // - Set email nhận
  $mail->addAddress('nguyenvietmanhit@gmail.com');               //Name is optional
//  $mail->addReplyTo('info@example.com', 'Information');
//  $mail->addCC('cc@example.com');
//  $mail->addBCC('bcc@example.com');

  //Attachments: gửi file đính kèm
  // Copy 1 file ảnh bất kỳ cùng cấp với file hiện tại
  $mail->addAttachment('image.png');         //Add attachments
//  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  // - Tiêu đề mail
  $mail->Subject = 'Tiêu đề mail';
  $mail->Body    = 'Nội dung mail This is the HTML message body <b>in bold!</b>';
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
//  echo 'Message has been sent';
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
