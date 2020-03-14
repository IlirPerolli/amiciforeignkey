<?php

date_default_timezone_set('Etc/UTC');

// Edit this path if PHPMailer is in a different location.
require './PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();

/*
 * Server Configuration
 */
$name = "Ilir Perolli";
$email = "ilir_perolli@live.com";
$mail->Host = 'tls://smtp.gmail.com:587';
$mail->Port = 587; // Which port to use, 587 is the default port for TLS security.
$mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
$mail->SMTPAuth = true; // Whether you need to login. This is almost always required.
$mail->Username = "amicillogaria@gmail.com"; // Your Gmail address.
$mail->Password = "sedivalla"; // Your Gmail login password or App Specific Password.
/*
 * Message Configuration
 */
$mail->isHTML(true);
$mail->setFrom('amicillogaria@gmail.com', 'amici llogaria'); // Set the sender of the message.
$mail->addAddress('ilir_perolli@live.com', 'Ilir Perolli'); // Set the recipient of the message.
$mail->Subject = 'Llogaria u krijua me sukses'; // The subject of the message.

/*
 * Message Content - Choose simple text or HTML email
 */
 
// Choose to send either a simple text email...
$mail->Body = "<p><b>Llogaria juaj tashme u be aktive.</b></p><p>Tashme mund te hyni ne llogarine tuaj ne linkun:</p><p>http://amici.epizy.com</p><p><b>#amiciteam</b></p>";

// ... or send an email with HTML.
//$mail->msgHTML(file_get_contents('contents.html'));
// Optional when using HTML: Set an alternative plain text message for email clients who prefer that.
//$mail->AltBody = 'This is a plain-text message body'; 

// Optional: attach a file
//$mail->addAttachment('images/phpmailer_mini.png');

if ($mail->send()) {
    echo "Mesazhi u dergua me sukses!";
} else {
    echo "Problem me dergimin e mesazhit: " . $mail->ErrorInfo;
}