<?php
	
	session_start();

	if(isset($_SESSION['user_id'])) {
		header('Location: my-goals.php');
	}

	require 'database.php';

	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$records = $conn->prepare('SELECT id, email, password FROM users WHERE email=:email');
		$records->bindParam(':email', $_POST['email']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$message = '';

		if (count((array)$results) > 0 && password_verify($_POST['password'], $results['password'])) {
			$_SESSION['user_id'] = $results['id'];
			header('Location: my-goals.php');
		} else {
			$message = 'Verify email or password and try again';
		}
	}

?>


<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/login.css">
	</head>
	<body>
		<div class="top-content">
				<div class="name">
					<a href="home.php"><img src="images/6e94695575a2c897135f7cc0b86800eb.png" width=105%; height=40%;></a>
					<h4><a href="home.php" style="text-decoration:none">beFit</a></h4>
							<a href="login.php" class="tag-a">Log in</a>
							<p> | </p>
							<a href="user-registration.php" class="tag-a-1">Sign up</a>
				</div>
				<div class="tabs-container">
					<a href="home.php"><button class="active">Home</button></a>
					<div class="not-tab-active">
						<a href="about.php"><button>About us</button></a><a href="contact.php"><button>Contact us</button></a>
					</div>
				</div>
			</div>

		<form class="formulario" style="font-family:Century Gothic;" action="login.php" method="post">
			<div class="in-form">
				<p style="font-size:1.2rem;">Login</p>
				<label class="login" style="font-size:0.9rem;">Email address</label>
				<br>
				<input style="width:86%; height:1.5rem; font-size:0.781rem;" class="form--field" type="text" name="email" placeholder="Enter email" required>
				<br>
				<label class="login" style="font-size:0.9rem;">Password</label>
				<br>
				<input class="form--field" style="width:86%; height:1.5rem; font-size:0.781rem;" type="password" name="password" placeholder="Enter password" required>
				<div class="table--div">
					<div class="row--div">
						<div class="cell--div">
							<input type="checkbox" class="form--check">
						</div>
						<div class="cell--div">
							<label>Remember me</label>
						</div>
					</div>
				</div>
				<input type="submit" value="Submit">
				<a href="contact.php">Forgot password?</a>
				<br>
				<a href="user-registration.php">Create account</a>
			</div>
		</form>

		<div class="message">
			<?php if(!empty($message)) : ?>
				<p><?= $message ?></p>
			<?php endif; ?>
		</div>

	</body>
</html>

