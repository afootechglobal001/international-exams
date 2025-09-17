
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
    $sendTo=$smtpUsername;
    $recieverName=$fullName;	
    $subject="$recieverName Review";

    $message='
    <div style="width:90%; margin:auto; height:auto;">
    <img src="cid:mail_header" width="100%">
    <div style="padding:15px; font-family:16px;">
        <p>Hi <strong>'.$senderName.'</strong>,</p>

        <p>
            A new testimony has been submitted and is awaiting your review. Below are the details:
        </p>

        <p>
            <strong>Full Name:</strong> '.$fullName.' <br>
            <strong>Email Address:</strong> '.$emailAddress.' <br>
            <strong>Phone Number:</strong> '.$mobileNumber.' <br>
            <strong>Testimony:</strong> '.$testimony.'
        </p>
        <p><strong>EDUGRADE SERVICES</strong>, we deliver high-quality education and training, equipping students with knowledge, skills, and strong moral values to excel and thrive in their academic journey and beyond. <br/> 
        <strong>Be Inspired,</strong><br/> 
            <img src="cid:logo" width="150px" style="padding:5px; background:#fff; border-radius:4px; margin-top:10px;"></p>
        </div>
        <div style="min-height:30px;background:#333;text-align:left;color:#FFF;line-height:20px;padding:20px 10px 20px 50px;">
            &copy; All Right Reserve.<br>' . $appName . '
        </div>
    </div>';


    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = strip_tags($message);  // Fallback for non-HTML clients
    
    /// copy this emails
    $mail->addAddress($smtpUsername, $fullName);  // Recipient email and name
    $mail->addAddress($supportEmail, $senderName);  // Support email
    // $mail->addAddress("afootechglobal@gmail.com", "AfooTECH Global");  // Additional recipient

    // Attach images
    $mail->Subject = $subject;
    $mail->addEmbeddedImage('../../mail/img/mail_header.jpg', 'mail_header');
    $mail->addEmbeddedImage('../../mail/img/logo.png', 'logo');

    // Send the email
    if(!$mail->send()){
        echo 'Not Working';
    }

} catch (Exception $e) {
    // Handle PHPMailer exceptions
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>