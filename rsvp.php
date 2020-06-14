<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home/sorellacollectiveco/PHPMailer/src/Exception.php';
require '/home/sorellacollectiveco/PHPMailer/src/PHPMailer.php';
require '/home/sorellacollectiveco/PHPMailer/src/SMTP.php';

$to = 'info@sorellacollectiveco.com';  //Recipient's E-mail
$emailTo = $_REQUEST['email'];

$first_name = $_REQUEST['first-name'];
$last_name = $_REQUEST['last-name'];
$email = $_REQUEST['email'];
$number = $_REQUEST['number'];
$date = $_REQUEST['date'];
$location = $_REQUEST['location'];
$reference = $_REQUEST['reference'];
$msg = $_REQUEST['message'];

$message .= '<p>Hi Sorella Collective,</p>';
$message .= '<p>I am reaching out from your website. I would love to learn more about your date availability and pricing.' . '<br><br>' . 'Please see my details below:' . '</p>';
$message .= '<ul style="list-style:none"><li><b>Full Name</b>: ' . $first_name . " " . $last_name . "</li>";
$message .= '<li><b>Email Address</b>: ' . $email . '</li>';
$message .= '<li><b>Phone Number</b>: ' . $number . '</li>';
$message .= '<li><b>Wedding Date</b>: ' . $date . '</li>';
$message .= '<li><b>Wedding Location</b>: ' . $location . '</li></ul>';
$message .= '<p>Where did I hear about Sorella Collective? ' . $reference . '</p>';
$message .= '<p>Best Regards,' . "<br>" . $first_name . " " . $last_name . '</p>';
$message .= '<p><i>To respond to this customer enquiry, reply to <a href="mailto"' . $email . '">' . $email . '</a></i></p>';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.dreamhost.com';                   // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $to;                                // SMTP username
    $mail->Password = 'Sorellas2020!';                    // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($to); //This is the email your form sends From
    $mail->addAddress($to); // Add a recipient address
    $mail->addReplyTo($email, $first_name . " " . $last_name);

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Customer Inquiry';
    $mail->Body    = $message;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo 'sent';
    // Transfer the value 'sent' to ajax function for showing success message.

    } catch (Exception $e) {
        // Transfer the value 'failed' to ajax function for showing error message.
        echo 'failed'; //. $mail->ErrorInfo;
    }
?>

