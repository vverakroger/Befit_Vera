<?php

	session_start();

	if(isset($_SESSION['user_id'])) {
			header('Location: my-goals.php');
		}

	require 'database.php';

	if (isset($_SESSION['user_id'])) {
		$records = $conn->prepare('SELECT id, email, password FROM users WHERE id=:id');
		$records->bindParam(':id', $_SESSION['user_id']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$user = null;

		if (count($results) > 0) {
			$user = $results;
		}
	}


?>


<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/home.css">
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
					<a href="home.php"><button class="tab-active">Home</button></a>
					<div class="not-tab-active">
						<a href="about.php"><button>About us</button></a><a href="contact.php"><button>Contact us</button></a>
					</div>
				</div>
			</div>

			<div class="bottom-content">
				<h2>"Eat to live,<br>
				don't live to eat".</h2>
				<p>Join our community today and get access<br>
					to an unlimited amount of information<br>
					on foods, diets, exercises and more.<br> 
					Enter the fitness world, create your own<br>
					daily menu based on our recommendations,<br>
					achieve your goals, eat healthy, live happy!</p>
				<a href="user-registration.php"><button>Sign up for free</button></a> <br>
				<small>Already have an account?</small> <a href="login.php">Log in</a>
			</div>
	</body>
</html>

