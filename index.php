<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$from = 'Web for woman Contact Form';
		$to = 'hola@webforwoman.com';
		$subject = 'Message from web for woman Contact form';

		$body ="From: $name\n E-Mail: $email\n Message:\n $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Por favor introduce tu Nombre.';
		}

		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Por favor ingresa una direccion de correo valida.';
		}

		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Por favor escribe tu mensaje.';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Gracias! Estare en contacto</div>';
	} else {
		$result='<div class="alert alert-danger">Lo siento hubo un error al enviar tu mensaje. Por favor intentalo de nuevo.</div>';
	}
}
	}
?>
