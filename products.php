<?php
    session_start();
	require'configure.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
	<?php require'header.php'; ?>
	<div id="main">
		<div id="products">
			<?php 
				display($products);
			?>
		</div>
		<div id="product-table">
			
		</div>
		<div id="total">
			
		</div>
		<div id="clearCart">
			
		</div>
	</div>
	<?php require'footer.php'; ?>

	<script src="script.js"></script>
</body>
</html>