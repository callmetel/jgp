<form class="request-booking right">
	<input type="text" placeholder="NAME" name="name">
	<input type="email" placeholder="EMAIL" name="email">
	<input type="submit" value="REQUEST AUDITION FORM" class="button booking-btn">
</form>
<?php

if(isset($_POST['button_pressed']))
{
	$to      = 'nobody@example.com';
	$subject = 'the subject';
	$message = 'hello';
	$headers = 'From: webmaster@example.com' . "\r\n" .
	'Reply-To: webmaster@example.com' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();

	mail($to, $subject, $message, $headers);

	echo 'Email Sent.';
}

?>