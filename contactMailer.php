<?php
	require_once"PHPMailer/PHPMailerAutoload.php";
	
//Connecting to SMTP Server
//PHPMailer Object
	
$mail = new PHPMailer;

$mail->isSMTP();
$mail->IsHTML(true);
$mail->SMTPAuth = true;
$mail->SMTPDebug = false;

$mail->Host = "smtp.gmail.com";
$mail->Username = "aces.proxy.mail";
$mail->Password = "proxy.aces";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->header = 'Content-type: text/html;  charset=iso-8859-1';

//Done Connecting

	$name    = $_POST['name'];
	$email   = $_POST['email'];
	$phone   = $_POST['phone'];
	$message = $_POST['message'];
	
	
	//From
	$mail->From = $email;
	$mail->FromName = $name;

	$mail->addReplyTo('aces.proxy.mail@gmail.com','Reply Address');
	$mail->addAddress('aces.dypiet@gmail.com','Enquiry From Website');
	$mail->addAddress('aces.proxy.mail@gmail.com','Enquiry From Website');
	
	$mail->Subject = "Enquiry From Website";
	$mail->Body = "<br><b>Name:</b> ".$name."<br><b>Contact:</b>".$phone."<br><b>Email:</b>".$email."<br><br>".$message;
	
	
	if($mail->send()){
		$_SESSION['mail_sent'] = 1;
	}	
	header('Location:contact.html');
?>
	