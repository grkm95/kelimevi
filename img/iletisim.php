<?php

if ( ! empty($_POST['contact']))
{
	$valid = array
	(
		'name'    => array('/^[\w\d\._\-]+$/iD', 'Your name isn\'t filled out correctly.'),
		'email'   => array('/^[-_a-z0-9\'+*$^&%=~!?{}]++(?:\.[-_a-z0-9\'+*$^&%=~!?{}]+)*+@(?:(?![-.])[-a-z0-9.]+(?<![-.])\.[a-z]{2,6}|\d{1,3}(?:\.\d{1,3}){3})(?::\d++)?$/iD', 'You must provide a valid email.'),
		'message' => array('/(.+){10,}/', 'You can\'t send a blank message.'),
	);
	
	$errors = array();
	
	foreach ($valid as $field => $data)
	{
		$regex = $data[0];
		$message = $data[1];
		
		$input = trim($_POST[$field]);
		
		if (empty($input) OR ! preg_match($regex, $input))
		{
			$errors += array($field => $message);
		}
	}
	
	$result = empty($errors) ? 'success' : 'errors';
	
	echo json_encode(array
	(
		'result' => $result,
		'errors' => $errors,
	));
	exit;
}

?>
<html>
<head>
<title></title>
<link rel="stylesheet" href="ayar.css"/>
<link rel="stylesheet" href="ayar.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js">
 
		/**
		 * Just a simple function to enable / disable our submit button
		 * It lets the user know we're working on the request, and something is actually happening.
		 */
		(function() {
			$.fn.toggleButton = function() {
				var $this = $(this),
					disabled = $this.attr('disabled');
					
				( ! disabled) ? $this.html('Submitting...').attr('disabled', 'disabled')
							  : $this.html('Send!').attr('disabled', '');
					
				return this;
			}
		})();
		
		// Shortcut to $(document).ready()
		$(function() {
			
			// Attach function to the 'submit' event of the form
			$('#contact').submit(function() {
				var self = $(this), 		 // Caches the $(this) object for speed improvements
					post = self.serialize(); // Amazing function that gathers all the form fields data
											 // and makes it usable for the PHP
				
				// Disable the submit button
				self.find('button').toggleButton();
				
				// Send our Ajax Request with the serialized form data
				$.post('index.php', post, function(data) {
					// Since we returned a Json encoded string, we need to eval it to work correctly
					var data = eval('(' + data + ')');
					
					// If everything validated and went ok
					if (data.result == 'success') {
						// Fade out the form and add success message
						$('#contact').fadeOut(function() {
							$(this).remove();
							$('<div class="message success"><h4>Thanks for your email!</h4></div>')
								.hide()
								.appendTo($('#form'))
								.fadeIn();
						});
					}
					else {
						// Hide any errors from previous submits
						$('span.error').remove();
						$(':input.error').removeClass('error');
						
						// Re-enable the submit button
						$('#contact').find('button').toggleButton();
						
						// Loop through the errors, and add class and message to each field
						$.each(data.errors, function(field, message) {
							$('#' + field).addClass('error').after('<span class="error">' + message + '</span>');
						});
					}
				});
				
				// Don't let the form re-load the page as would normally happen
				return false;
			});
			
		});
	</script>

</head>
<body>
	 <div id="container">
		<table border="2">
		<tr>
			<h1>İletişim Formu</h1>
		<div id="form">
			<form id="contact" method="post" action="">
			<th>
			<label for="name">Ad-Soyad:</label><input type="text" name="name" id="name" class="input" />
			<label for="email">Mail:</label>
				<input type="text" name="email" id="email" class="input"/>
				<br>
				<th><label for="message">Mesajınız:</label></th>
				<td><textarea name="message" id="message" rows="4" cols="40" class="input"></textarea></td>
			
				<input type="hidden" name="contact" value="1" /></th></tr></table>
				<p><button type="submit">Gönder!</button></p>
			</form>
	
	</div>
	</body>
	</head>
	</html>