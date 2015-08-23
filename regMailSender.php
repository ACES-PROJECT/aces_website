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

	//Extracting Token No
	$myfile = fopen("token.txt", "r") or die("Unable to open file!");
	$token = fread($myfile,filesize("token.txt"));
	fclose($myfile);

//Handling Game Events for token generation
$event = $_POST['event_of_candidate'];
if($event[0] == "G")
{
	$event = $event[0].$event[5].$event[6];
	echo"in if";
}
else
{
	$event = $event[0];
}
//From
$mail->From = $_POST["email_of_candidate"];
$mail->FromName = $_POST["name_of_candidate"];

$mail->addReplyTo('aces.proxy.mail@gmail.com','Reply Address');
$mail->addAddress('aces.acunetix15@gmail.com','Acunetix 2k15');
$mail->addAddress('aces.proxy.mail@gmail.com','Acunetix 2k15');

$body = "<br><b>Name:</b> ".$_POST['name_of_candidate']."<br><b>Contact:</b>".$_POST['contact_of_candidate']."<br><b>Event: </b>".$_POST['event_of_candidate']."<br><b>Email:</b>".$_POST["email_of_candidate"];
$mail->Subject = "Registration:  ".$_POST['event_of_candidate'];
$mail->Body = "<b>#Registration:</b><br>".$body."<br><b>Token: </b>ACX15".$event.$token;

if(!$mail->send())
{
	echo "<b><h3>Registration UNSUCCESSFUL!</h3></b><br>";
	echo "Please try again after some time!";
}
else 
{
	echo " ";
    echo "<b><h3>Registration SUCCESSFUL!</h3></b><br>";
	echo "Your Token Number Is:<b> ACX15".$event.$token."</b>";

	//Writing the next token number into the token file
	$myfile = fopen("token.txt", "w") or die("Unable to open file!");
	$token++;
	fwrite($myfile, $token);
	fclose($myfile);
	
	
	//Displaying Extra Content
	
	echo "<br><br><br>";
	echo "<b>NOTE: </b><br>";
	echo "1. Please note the token number. <i>Without the token number your registration will not be considered</i>.<br>";
	echo "2. As soon as you come for the event go to one of the registration counter, produce your token number and pay for the event.<br>";
	echo "3. Upon receipt of payment you will be provided with a <font color='red'>Event Receipt</font>. Please take care that you don't lose your receipt as you will not be provided another one.<br>";
}
?>
<br>
<br>
<form action = "index.html">
	<input type="submit" value="Back to Home Page"/>
</form>