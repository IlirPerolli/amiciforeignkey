<?php
function unapproved_account_mail($email, $name,$viti,$username,$mosha){
date_default_timezone_set('Etc/UTC');

// Edit this path if PHPMailer is in a different location.
require './PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'tls://smtp.gmail.com:587';
$mail->Port = 587; // Which port to use, 587 is the default port for TLS security.
$mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
$mail->SMTPAuth = true; // Whether you need to login. This is almost always required.
$mail->Username = "amicillogaria@gmail.com"; // Your Gmail address.
$mail->Password = "sedivalla"; // Your Gmail login password or App Specific Password.
$mail->setFrom('amicillogaria@gmail.com', 'amici llogaria'); // Set the sender of the message.
$mail->addAddress($email, $name); // Set the recipient of the message.
$mail->isHTML(true);
$mail->Subject = 'Llogaria u krijua me sukses'; // The subject of the message.
$mail->Body = "<p>Faleminderit per regjistrimin tuaj.</p><p>Se shpejti llogaria juaj do te behet aktive pasi te konfirmohet nga njeri prej administratoreve.</p><p>Te dhenat personale:</p><p><b>Emri dhe mbiemri:</b> $name</p><p><b>Data e lindjes:</b> $mosha</p><p><b>Viti akademik:</b> $viti</p><p><b>Email:</b> $email</p><p><b>Username:</b> $username</p><p><b>#amiciteam</b></p>";
if ($mail->send()) {
   // echo "Mesazhi u dergua me sukses!";
} else {
   // echo "Problem me dergimin e mesazhit: " . $mail->ErrorInfo;
}
}

function approved_account_mail($email, $name){
date_default_timezone_set('Etc/UTC');

// Edit this path if PHPMailer is in a different location.
require './PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'tls://smtp.gmail.com:587';
$mail->Port = 587; // Which port to use, 587 is the default port for TLS security.
$mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
$mail->SMTPAuth = true; // Whether you need to login. This is almost always required.
$mail->Username = "amicillogaria@gmail.com"; // Your Gmail address.
$mail->Password = "sedivalla"; // Your Gmail login password or App Specific Password.
$mail->setFrom('amicillogaria@gmail.com', 'amici llogaria'); // Set the sender of the message.
$mail->addAddress($email, $name); // Set the recipient of the message.
$mail->isHTML(true);
$mail->Subject = 'Llogaria u verifikua me sukses'; // The subject of the message.
$mail->Body = "<p><b>Llogaria juaj tashme u be aktive.</b></p><p>Tashme mund te hyni ne llogarine tuaj ne linkun:</p><p><a href='amici.epizy.com'> amici.epizy.com </a></p><p><b>#amiciteam</b></p>";
if ($mail->send()) {
    //echo "Mesazhi u dergua me sukses!";
} else {
   // echo "Problem me dergimin e mesazhit: " . $mail->ErrorInfo;
}
}

function reset_password($email, $token){
date_default_timezone_set('Etc/UTC');

// Edit this path if PHPMailer is in a different location.
require './PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'tls://smtp.gmail.com:587';
$mail->Port = 587; // Which port to use, 587 is the default port for TLS security.
$mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
$mail->SMTPAuth = true; // Whether you need to login. This is almost always required.
$mail->Username = "amicillogaria@gmail.com"; // Your Gmail address.
$mail->Password = "sedivalla"; // Your Gmail login password or App Specific Password.
$mail->setFrom('amicillogaria@gmail.com', 'amici llogaria'); // Set the sender of the message.
$mail->addAddress($email); // Set the recipient of the message.
$mail->isHTML(true);
$mail->Subject = 'Rikthe fjalekalimin'; // The subject of the message.
$mail->Body = "<p>Pershendetje,</p><p>Per te rikthyer fjalekalimin klikoni ne linkun ne vijim:</p><p>amici.epizy.com/forgot_password.php?email=$email&token=$token </p> <p><i>*Nese nuk keni bere kerkese per rikthimin e fjalekalimit, thjeshte injoroni kete email. </i> </p> <p> <b> #amiciteam </b></p>";
if ($mail->send()) {
   //array_push($success, "Ju lutem kontrolloni emailin");
} else {
   // echo "Problem me dergimin e mesazhit: " . $mail->ErrorInfo;
}
}




?>