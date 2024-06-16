<?php

/**
 * PHPMailer Autoloader
 */
require './vendor/phpmailer/phpmailer/PHPMailerAutoload.php';


/**
 * Configure PHPMailer with your SMTP server settings
 */
$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'mail.smtp.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'salimchaieri51@gmail.com';
$mail->Password = 'SOumaya11221+';
$mail->SMTPSecure = 'tls';


/**
 * Enable SMTP debug messages
 */
$mail->SMTPDebug = 2;


/**
 * Send an email
 */
$mail->setFrom('salimchaieri51@gmail.com');
$mail->addAddress('xayerisalim@gmail.com');
$mail->Body = 'This is a test message';

if ($mail->send()) {
	echo 'Message sent!';
} else {
    echo 'Mailer error: ' . $mail->ErrorInfo;
}
