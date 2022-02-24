<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Contact
	</title>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
	<?php require'header.php'; ?>
	<div id="main">
		<div id="contact-form">
			<form action="" method="">
				<label for="name">Name:</label>
				<input type="text" name="name" class="form-control">
				<label for="email">Email:</label>
				<input type="text" name="email" class="form-control">
				<label for="message">Message:</label>
				<textarea name="message" cols="45" rows="6" class="form-control"></textarea>
				<p class="submit">
					<input type="submit" name="submit" value="Submit">
				</p>
			</form>
		</div>
		
	</div>
	<?php require'footer.php'; ?>
</body>
</html>