<?php
// Include the PHPMailer class
include('PHPMailer/class.phpmailer.php');

// Retrieve the email template required
//$message = file_get_contents('email_templates/H4D-Charity/charity_merchant.html');
$message = 'Hello';

// Replace the % with the actual information
$password = 'yourPassword';
//$message = str_replace('%username%', $username, $message);
//$message = str_replace('%password%', $password, $message);

// Setup PHPMailer
$mail = new PHPMailer();
$mail->IsSMTP();

// This is the SMTP mail server
//$mail->Host = 'ssl://smtp.gmail.com';
$mail->Host = 'ssl://smtp.mail.yahoo.com';

$mail->Port = '465';

// Remove these next 3 lines if you dont need SMTP authentication
$mail->SMTPAuth = true;
$mail->Username = 'emonkhan129@yahoo.com';
$mail->Password = $password;

// Set who the email is coming from
$mail->SetFrom('mail@yahoo.com', 'Mohon');

$emails = array('mail1@gmail.com', 'mail2@yahoo.com');



// Set the subject
$mail->Subject = 'Test mail';

//Set the message
$mail->MsgHTML($message);
//$mail->AltBody(strip_tags($message));

foreach ($emails as $key => $value) {
	//Set who the email is sending to
	$mail->AddAddress($value);

	// Send the email
	if(!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Email sent successfully !!<br>";
	}
}



?>