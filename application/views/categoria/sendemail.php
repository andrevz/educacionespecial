<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sendemail Script</title>
</head>
<body>

<!-- Reminder: Add the link for the 'next page' (at the bottom) -->
<!-- Reminder: Change 'YourEmail' to Your real email -->

<?php

$ip = $_POST['ip'];
$httpref = $_POST['httpref'];
$httpagent = $_POST['httpagent'];
$visitor = $_POST['visitor'];
$visitorphone = $_POST['visitorphone'];
$visitormail = $_POST['visitormail'];
$notes = $_POST['notes'];

if (preg_match('/http:/i', $notes)) {
die ("Do NOT try that! ! ");
}
if(!$visitormail == "" && (!strstr($visitormail,"@") || !strstr($visitormail,".")))
{
echo "<h2>Use Back - Enter valid e-mail</h2>\n";
$badinput = "<h2>Feedback was NOT submitted</h2>\n";
echo $badinput;
die ("Go back! ! ");
}

if(empty($visitor) || empty($visitormail) || empty($notes )) {
echo "<h2>Use Back - fill in all fields</h2>\n";
die ("Use back! ! ");
}

$todayis = date("l, F j, Y, g:i a") ;

$notes = stripcslashes($notes);

$message = " $todayis [EST] \n
Message: $notes \n
Phone: $visitorphone \n
From: $visitor ($visitormail)\n
Additional Info : IP = $ip \n
Browser Info: $httpagent \n
Referral : $httpref \n
";

$from = "From: $visitormail\r\n";

mail("compartir@supernet.com.bo", "Nuevo Mensaje - Centro de Educacion Especial", $message, $from);

?>

<p align="center">
Fecha: <?php echo $todayis ?>
<br />
Gracias : <?php echo $visitor ?> ( <?php echo $visitormail ?> )
<br />

<br />
Mensaje:<br />
<?php $notesout = str_replace("\r", "<br/>", $notes);
echo $notesout; ?>
<br />
<?php echo $ip ?>

<br /><br />
<a href="contacto"> Continuar </a>
</p>

</body>
</html>