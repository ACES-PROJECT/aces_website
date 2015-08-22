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

	//Extracting Token No
	$myfile = fopen("token.txt", "r") or die("Unable to open file!");
	$token = fread($myfile,filesize("token.txt"));
	echo $token;
	fclose($myfile);

//From
$mail->From = $_POST["email_of_candidate"];
$mail->FromName = $_POST["name_of_candidate"];

$mail->addReplyTo('aces.proxy.mail@gmail.com','Reply Address');
$mail->addAddress('aces.acunetix15@gmail.com','Acunetix 2k15');
$mail->addAddress('aces.proxy.mail@gmail.com','Acunetix 2k15');

$body = "<b>Name:</b> ".$_POST['name_of_candidate']."<br><b>Contact: </b>".$_POST['contact_of_candidate']."<br><b>Event: </b>".$_POST['event_of_candidate']."<br><b>Email:</b> ".$_POST["email_of_candidate"]."<br>";
$mail->Subject = "Registration:  ".$_POST['event_of_candidate'];
$mail->Body = "<b>#Registration</b><br><br>".$body."<b>Token Number: </b> ACX15".$_POST['event_of_candidate'][0].$token;



if(!$mail->send())
{
	echo "";
}
else 
{
	echo " ";
    echo "<bRegistration SUCCESSFUL!</b>";
	echo "Your Token Number Is:<b> ACX15".$_POST['event_of_candidate'][0].$token."</b>";

	//Writing the next token number into the token file
	$myfile = fopen("token.txt", "w") or die("Unable to open file!");
	$token++;
	fwrite($myfile, $token);
	fclose($myfile);
}

?>