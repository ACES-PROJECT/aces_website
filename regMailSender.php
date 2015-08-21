<?php
	require_once"PHPMailer/PHPMailerAutoload.php";
	
//Connecting to SMTP Server
//PHPMailer Object
	
$mail = new PHPMailer;

$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPDebug = 2;

$mail->Host = "smtp.gmail.com";
$mail->Username = "aces.proxy.mail";
$mail->Password = "proxy.aces";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;

//Done Connecting


//From
echo"<h1>".$_POST["email_of_candidate"]."</h1>";
$mail->From = $_POST["email_of_candidate"];
$mail->FromName = $_POST["name_of_candidate"];

$mail->addReplyTo('aces.proxy.mail@gmail.com','Reply Address');
$mail->addAddress('aces.proxy.mail@gmail.com','Acunetix 2k15');

$subject = "Name: ".$_POST['name_of_candidate']."\nContact: ".$_POST['contact_of_candidate']."\nEvent: ".$_POST['event_of_candidate'];
$mail->Subject = "Registration:\n\n".$subject;
$mail->Body = "This is the body of the email";
$mail->AltBody = "This is the body of the email";


var_dump($mail->send());
/*if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}*/

?>