<?php
$array = $callclass->_get_setup_backend_settings_detail_for_country($conn, $countryId);
$fetch = json_decode($array, true);
$smtpHost = $fetch[0]['smtpHost'];
$smtpUsername = $fetch[0]['smtpUsername'];
$smtpPassword = $fetch[0]['smtpPassword'];
$smtpPort = $fetch[0]['smtpPort'];
$senderName = $fetch[0]['senderName'];
$supportEmail = $fetch[0]['supportEmail'];
$currentDate = date("l, d F Y");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../mail/PHPMailer/src/PHPMailer.php';
require '../../mail/PHPMailer/src/SMTP.php';
require '../../mail/PHPMailer/src/Exception.php';

$mail = new PHPMailer(true);

try {

    $mail->SMTPDebug = SMTP::DEBUG_OFF;  // Disable verbose debug output
    $mail->isSMTP();  // Set mailer to use SMTP
    $mail->Host       = $smtpHost;  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;  // Enable SMTP authentication
    $mail->Username   = $smtpUsername;  // SMTP username
    $mail->Password   = $smtpPassword;  // SMTP password
    $mail->SMTPSecure = 'ssl';  // Enable SSL encryption
    $mail->Port       = $smtpPort;  // TCP port to connect to

    $mail->SMTPOptions = [
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' =>true
        ]
    ];  
    $mail->isHTML(true);
    //// sender and replyTo
    $mail->setFrom($smtpUsername, $senderName);
    $mail->addReplyTo($supportEmail, $senderName); // Reply-to address
    

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sendTo=$emailAddress;
$recieverName=$fullName;
$subject="Reset Password OTP -- $otp";

$message='
<div style="width:90%; margin:auto; height:auto;">
  <img src="cid:mail_header" width="100%">
    <div style="padding:15px; font-size:16px;">
      <p>Dear <b>'.$fullName.'</b>,</p>
      <p>We received a request to reset your password for your account on International Exam Application. To proceed with resetting your password, please use the following One-Time Password (OTP):</p>
      <h2 style="color:#333; text-align:center; background:#f4f4f4; padding:10px 0;">'.$otp.'</h2>
      <p>This OTP is valid for the next 15 minutes. If you did not request a password reset, please ignore this email or contact our support team immediately.</p>
      <p>Thank you,<br>International Exam Application Team</p>
    <div style="min-height:30px; background:#333; text-align:left; color:#FFF; line-height:20px; padding:20px 10px 20px 50px;">
      &copy; All Right Reserved. <br>' . $senderName . '
    </div>
</div>';


    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = strip_tags($message);  // Fallback for non-HTML clients
    
    /// copy this emails
    $mail->addAddress($sendTo, $recieverName);  // Recipient email and name
    $mail->addAddress($supportEmail, $senderName);  // Support email
    //$mail->addAddress("afootechglobal@gmail.com", "AfooTECH Global");  // Additional recipient

    // Attach images
    $mail->addEmbeddedImage('../../mail/img/mail_header.jpg', 'mail_header');
    
    // Send the email
    if(!$mail->send()){
        echo 'Not Working';
    }

} catch (Exception $e) {
    // Handle PHPMailer exceptions
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>