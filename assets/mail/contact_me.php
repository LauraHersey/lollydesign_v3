<?php
// Check for empty fields
if(empty($_REQUEST['name']) || empty($_REQUEST['email']) || empty($_REQUEST['phone']) || empty($_REQUEST['message']) || !filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_REQUEST['name']));
$email = strip_tags(htmlspecialchars($_REQUEST['email']));
$phone = strip_tags(htmlspecialchars($_REQUEST['phone']));
$message = strip_tags(htmlspecialchars($_REQUEST['message']));

// Create the email and send the message
$to = "laura@lollydesign.com"; // Add your email address in between the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "Website Contact Form:  $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nPhone: $phone\n\nMessage:\n$message";
$header = "From: noreply@lollydesign.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
