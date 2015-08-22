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
$mail->addAddress('aces.dypiet@gmail.com','Acunetix 2k15');
$mail->addAddress('aces.proxy.mail@gmail.com','Acunetix 2k15');

$body = "<b>Name:</b> ".$_POST['name_of_candidate']."<br><b>Contact: </b>".$_POST['contact_of_candidate']."<br><b>Event: </b>".$_POST['event_of_candidate']."<br>";
$mail->Subject = "Registration:  ".$_POST['event_of_candidate'];
$mail->Body = "<b>#Registration</b><br><br>".$body;
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