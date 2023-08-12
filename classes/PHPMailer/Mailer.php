<?php
require_once 'src/PHPMailer.php';
require_once 'src/Exception.php';
require_once 'src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Mailer{
    public function email($email,$body,$subject,$name)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->CharSet = 'UTF-8';
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'thanhkudo1o11998@gmail.com';                     // SMTP username
            $mail->Password = 'ovlrzdbjsmcginui';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            $mail->setFrom('thanhkudo1o11998@gmail.com', 'Việc Làm Theo Giờ');
            $mail->addAddress("$email","$name");     // Add a recipient

//            $mail->addReplyTo('info@example.com');
//            $mail->addCC('cc@example.com');
//            $mail->addBCC('bcc@example.com');

            //đính kèm file
            //$mail->addAttachment('');         // Add attachments

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = '';
            $mail->send();
            return true;
        } catch (Exception $e) {
            echo "Không thể gửi tới địa chỉ mail này ! {$mail->ErrorInfo}";
        }
    }
}




