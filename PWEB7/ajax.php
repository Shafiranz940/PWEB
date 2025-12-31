<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (!empty($_POST['name']) && !empty($_POST['email'])) {

    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // ===== SMTP GMAIL =====
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'shafiranz1235@gmail.com'; // EMAIL PENGIRIM
        $mail->Password   = 'kncrugjucouyyrsl';     // APP PASSWORD (tanpa spasi)
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // ===== EMAIL =====
        $mail->setFrom('iashagaa69@gmail.com', 'Contact Form');
        $mail->addAddress('iashagaa69@gmail.com'); // penerima
        $mail->addReplyTo($email, $name);

        $mail->isHTML(true);
        $mail->Subject = 'AllPHPTricks Contact Form Email';
        $mail->Body    = "
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Message:</strong><br>$message</p>
        ";

        $mail->send();

        echo "<span class='success'>
            Thank you for contacting us, we will get back to you shortly.
        </span>";

    } catch (Exception $e) {
        echo "<span style='color:red;font-weight:bold;'>
            Mail Error: {$mail->ErrorInfo}
        </span>";
    }
}
?>