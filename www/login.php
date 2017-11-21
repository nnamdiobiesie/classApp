<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
	<?php
	$page_title = "Login";
		include ('includes/header.php');
		include('includes/db.php');
		include('includes/files.php');





					$errors = [];

			if(array_key_exists('login', $_POST)){
					
					if(empty($_POST['email'])){

							//ENABLES ERROR MESSAGE TO APPEAR ABOVE THE FORM FIELD
							$errors['email'] =  "Please enter your email address";

						}

							if(empty($_POST['password'])){


								$errors['password'] = "Please enter your password";
							}

							if(empty($errors)) {

									$clean = array_map('trim', $_POST);



									$data = adminLogin($conn, $clean);


									if($data[0]) {

										$details = $data[1];


										$_SESSION['aid'] = $details['admin_id'];
										$_SESSION['name'] = $details['first_name'].' '.$details['last_name'];


											header ("Location:add_category.php");


									}else{


												header("location: login.php?msg='Invalid email or passowrd");



									}


								

							}




						}








	?>
	
	<div class="wrapper">
		<h1 id="register-label">Admin Login</h1>
		<hr>
		<form id="register"  action ="login.php" method ="POST">
			<div>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>

			<input type="submit" name="login" value="login">
		</form>

		<h4 class="jumpto">Don't have an account? <a href="register.php">register</a></h4>
	</div>

	<?php
		include ('includes/footer.php');

	?>
</body>
</html>