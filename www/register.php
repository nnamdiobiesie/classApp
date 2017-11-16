<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
	<?php
$page_title = "Register";
include ('includes/header.php');

include('includes/db.php');

	?>

	<?php

					$errors = [];

			if(array_key_exists('register', $_POST)){
					
					if(empty($_POST['fname'])){

							//ENABLES ERROR MESSAGE TO APPEAR ABOVE THE FORM FIELD
							$errors['fname'] =  "Please enter your firstname";

						}

							if(empty($_POST['lname'])){


								$errors['lname'] = "Please enter your lastname";
							}

							if(empty($_POST['email'])){

								$errors['email'] = "Please enter your email";

							}


							if(empty($_POST['password'])){

									$errors['password'] = "Please enter your password";

							}


							if(empty($_POST['pword'])){

									$errors['password'] = "Please enter your password";

							}



							if(empty($errors)){

									// database stuff
								//REMOVES ALL WHITE SPACES IN YOUR. AND RETURNS A NEW ARRAY THAT HAS BEEN TRIMMED.
								$clean = array_map('trim', $_POST);


								/// TAKES INPUTTED PASSWORD AND ENCRYPTS IT.
								$hash = password_hash($clean['password'], PASSWORD_BCRYPT);

										//PREPARE - THIS PREPARES A STATEMENT FOR EXECUTION. before you do anything in your database, you must first prepare
								$stmt = $conn->prepare("INSERT INTO admin(first_name, last_name, email, hash) VALUES(:f, :l, e:, h:)");
																													//PLACEHOLDERS USED TN THE PROCESS OF PASSING OUR VALUES

								$data = [
									":f" => $clean['fname'],
									":l" =. $clean['lname'],
									":e" => $clean['email'],
									":h" => $hash

								];


								$stmt->execute($data);


							}else {

									/*foreach($errors as $err) {

										echo $err.'</br>'; 
									} */

							}


			}

	?>
	
	<div class="wrapper">
		<h1 id="register-label">Register</h1>
		<hr>
		<form id="register"  action ="register.php" method ="POST">
			<div>


			<?php 

					//ENABLES ERROR MESSAGE TO APPEAR ABOVE THE FORM FIELD

			if(isset($errors['fname'])) {echo '<span class=err>'.$errors['fname'].'</span>';}?>
				<label>first name:</label>
				<input type="text" name="fname" placeholder="first name">
			</div>
			<div>
			<?php
			if(isset($errors['lname'])) {echo '<span class=err>'.$errors['lname'].'</span>';}?>

			
				<label>last name:</label>	
				<input type="text" name="lname" placeholder="last name">
			</div>

			<div>
			<?php
			if(isset($errors['email'])) {echo '<span class=err>'.$errors['email'].'</span>';}?>

		
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
			<?php
			if(isset($errors['password'])) {echo '<span class=err>'.$errors['password'].'</span>';}?>

			
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>
 
			<div>
			<?php
			if(isset($errors['password'])) {echo '<span class=err>'.$errors['password'].'</span>';}?>
			
				<label>confirm password:</label>	
				<input type="password" name="pword" placeholder="password">
			</div>

			<input type="submit" name="register" value="register">
		</form>

		<h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
	</div>

	<?php

		include ('includes/footer.php');

	?>
</body>
</html>