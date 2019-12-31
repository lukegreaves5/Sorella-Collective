<?php
$subject = "Customer Inquiry - Sorella Collective Website"; // Subject of your email
$to = 'contact@lukegreaves.net';  //Recipient's E-mail
$emailTo = $_REQUEST['email'];

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$number = $_REQUEST['number'];
$date = $_REQUEST['date'];
$location = $_REQUEST['wedding'];
$reference = $_REQUEST['reference'];
$msg = $_REQUEST['message'];

$email_from = $name.'<'.$email.'>';

$headers = "MIME-Version: 1.1";
$headers .= "Content-type: text/html; charset=iso-8859-1";
$headers .= "From: ".$name.'<'.$email.'>'."\r\n"; // Sender's E-mail
$headers .= "Return-Path:"."From:" . $email;

$message .= 'Name : ' . $name . "\n";
$message .= 'Email : ' . $email . "\n";
$message .= 'Phone Number : ' . $number . "\n";
$message .= 'Wedding Date : ' . $date . "\n";
$message .= 'Wedding Location : ' . $location . "\n";

if (mail($to, $subject, $message, $email_from))
{
	// Transfer the value 'sent' to ajax function for showing success message.
	echo 'sent';
}
else
{
	// Transfer the value 'failed' to ajax function for showing error message.
	echo 'failed';
}
?>