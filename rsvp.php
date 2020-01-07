<?php
$subject = "Customer Inquiry from Website"; // Subject of your email
$to = 'contact@lukegreaves.net';  //Recipient's E-mail
$emailTo = $_REQUEST['email'];

$first_name = $_REQUEST['first-name'];
$last_name = $_REQUEST['last-name'];
$email = $_REQUEST['email'];
$number = $_REQUEST['number'];
$date = $_REQUEST['date'];
$location = $_REQUEST['location'];
$reference = $_REQUEST['reference'];
$msg = $_REQUEST['message'];

$email_from = $name.'<'.$email.'>';

$headers = "MIME-Version: 1.1";
$headers .= "Content-type: text/html; charset=iso-8859-1";
$headers .= "Reply to: " . $first_name . " " . $last_name . " at" . $email . "\r\n"; // Sender's E-mail
$headers .= "Return-Path:"."From:" . $email;

$message .= "Hi," . "\n" . "\n";
$message .= "I am reaching out from your website. I would love to learn more about your date availability and pricing." . "\n" . "Please see my details below:" . "\n" . "\n";
$message .= 'Name : ' . $first_name . " " . $last_name . "\n";
$message .= 'Email Address : ' . $email . "\n";
$message .= 'Phone Number : ' . $number . "\n";
$message .= 'Wedding Date : ' . $date . "\n";
$message .= 'Wedding Location : ' . $location . "\n" . "\n";
$message .= 'Where did I hear about Sorella Collective? : ' . $reference . "\n" . "\n";

$message .= 'Best Regards,' . "\n" . $first_name . " " . $last_name . "\n" . "\n";

$message .= 'To respond to this customer enquiry, reply to ' . $email;

if (mail($to, $subject, $message, $headers))
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