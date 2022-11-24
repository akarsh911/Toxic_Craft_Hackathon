<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp-mail.outlook.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'akarshsriv09@outlook.com';
$mail->Password = 'mi@Premium#119$911';
$mail->setFrom('akarshsriv09@outlook.com', 'Akarsh');
$mail->addReplyTo('akarsh91140@gmail.com', 'Akarsh');
$mail->addAddress('akarsh91140@gmail.com', 'Receiver Name');
$mail->Subject = 'Checking if PHPMailer works';
$mail->msgHTML(file_get_contents('../html/message.html'), __DIR__);
$mail->Body = 'This is just a plain text message body';
//$mail->addAttachment('attachment.txt');
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'The email message was sent.';
}