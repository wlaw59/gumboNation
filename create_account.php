<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="fade.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<?php
    session_start();
    if (isset($_SESSION['messages'])) {
      foreach ($_SESSION['messages'] as $message) {
        echo "<div class='" . $_SESSION['class'] . " message'>{$message}</div>";
      }
    }
    unset($_SESSION['messages']);
?>



<html>
	<head>
	</head>
	<body>
		<br/>
		<div>
			<h1 id = "center_text">Create your account</h1>
			<p id = "center_text">Only boxes with * are required</p>
		</div>
		<br/>
		<form method="post" action="create_account_handler.php">
		<div class="input_box">
			<label for="email">Email*</label>
			<input type="text" id="email" name="email">
		</div>
		<div class="input_box">
			<label for="passwordv">Password*</label>
			<input type="password" id="passwordv" name="passwordv">
		</div>
		<div class="input_box">
			<label for="password">Verify Password*</label>
			<input type="password" id="password" name="password">
		</div>
		<div class="input_box">
			<label for="name1">Full Name</label>
			<input type="text" id="name1" name="name1">
		</div>
		<div class="input_box" id = "submit_div">
			<input id = "submit" type="submit" value="Create Account">
		</div>
		

		</form>
		
		<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
	</body>
</html>



