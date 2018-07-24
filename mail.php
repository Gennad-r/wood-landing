<?php

$method = $_SERVER['REQUEST_METHOD'];
//$my_err = fopen("error_log", "w");
//fwrite($my_err, $method . "<br>");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


//Script Foreach
$c = true;
if ( $method === 'POST' ) {
	$project_name = trim($_POST["project_name"]);
	foreach ( $_POST as $key => $value ) {
		if ( $value != "" && $key != "project_name" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
		}
	}
} 

$message = "<table style='width: 100%;'>$message</table>";

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 2;   
    $mail->isSMTP();        
    $mail->Host = 'mail.adm.tools';
    $mail->SMTPAuth = true;               
    $mail->Username = 'sales.dept@woodmosaica.com';
    $mail->Password = 'p9RVT9bpi7I5';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    //Recipients
    $mail->setFrom('sales.dept@woodmosaica.com', "Worldwide");
    $mail->addAddress('salesdept.woodmosaic@gmail.com', 'To Wood owners');
    //$mail->addAddress('info@lotgate.com', 'Александру Зотикову');
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('gennad.r@gmail.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->CharSet = "utf-8"; 
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $project_name;
    $mail->Body    = $message;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
