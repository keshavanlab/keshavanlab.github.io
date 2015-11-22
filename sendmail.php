<?php
	
	// Send Email Using SMTP Authentication
	
	if ($_POST['name'] && $_POST['email'] && $_POST['subject'] && $_POST['message']) {
		
		require_once "Mail.php";
		
		$from = $_POST['name'] . ' <' . $_POST['email'] . '>';
		$to = 'siddhartharun@verizon.net';			// Insert the Recipient Email here
		$subject = $_POST['subject'];
		$body = $_POST['message'];

		$host = 'smtp.gmail.com';								// Insert the Email Host here
		$username = 'impactlab1@gmail.com';					// Insert the SMTP Username here
		$password = 'keshavan2015';							// Insert the SMTP Password here

		$headers = array( 'From' => $from, 'To' => $to, 'Subject' => $subject );
		$smtp = Mail::factory( 'smtp', array( 'host' => $host, 'auth' => true, 'username' => $username, 'password' => $password ) );
		$mail = $smtp->send($to, $headers, $body);
		
		if (PEAR::isError($mail)) {
			header('HTTP/1.1 500 Internal Server Error');
		} else {
			header('HTTP/1.1 200 OK');
		}
		
	}
	
?>