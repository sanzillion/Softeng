<?php
// Emails form data to you and the person submitting the form
// This version requires no database.
// Set your email below
$myemail = "sanzimagery@gmail.com"; // Replace with your email, please

// Receive and sanitize input
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['comment'];

// set up email
$msg = "New contact form submission!\nName: " . $name . "\nEmail: " . $email . "\nEmail: " . $email;
$msg = wordwrap($msg,70);
try {
	mail($myemail,"New Form Submission",$msg);
	mail($email,"Thank you for your form submission",$msg);
	echo "fuck!";
} catch (Exception $e) {
	echo $e->getMessage();
	echo "not fuck!";
}

?>
