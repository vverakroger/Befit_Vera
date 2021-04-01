<?php

// ini_set('display_errors', 'On');
// error_reporting(-1);

session_start();
if(isset($_SESSION['user_id'])) {
		header('Location: my-goals.php');
	}

require 'database.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['age']) && !empty($_POST['height']) && !empty($_POST['weight']) && !empty($_POST['goal']) && !empty($_POST['finaldate']) && !empty($_POST['name'])) {
	$sql = "INSERT INTO users (name, email, password, age, sex, height, weight, goal, finaldate) VALUES (:name, :email, :password, :age, :sex, :height, :weight, :goal, :finaldate)";

	$stmt = $conn->prepare($sql);

	$age 	= (int) $_POST["age"];
	$goal 	= (int) $_POST["goal"];
	$sex = (int) $_POST["sex"];
	$height = (int) $_POST["height"];
	$weight = (int) $_POST["weight"];
	
	$stmt->bindParam(':email', $_POST['email']);
	$stmt->bindParam(':name', $_POST['name']);
	$stmt->bindParam(':finaldate', $_POST['finaldate']);

	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	
	$stmt->bindParam(':password', $password);
	$stmt->bindParam(':age', $age);
	$stmt->bindParam(':goal', $goal);
	$stmt->bindParam(':sex', $sex);
	$stmt->bindParam(':height', $height);
	$stmt->bindParam(':weight', $weight);

	$exc = $stmt->execute();

	if ($exc) {
		$message = 'Successfully created new user!';
	} else {
		$message = 'There must have been an issue creating your account';
	}
}

?>

<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/user-registration.css">
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
		
		<div class="message">
			<?php if(!empty($message)): ?>
				<p><?= $message ?> <a class="msg" href="login.php">Log in</a></p>
			<?php endif; ?>
		</div>
		<style type="text/css">
			.msg{
				text-decoration:none;
				color: #86de02;
				font-size:0.97rem;
			}

			.msg:hover{
				text-decoration: underline;
				color: #65a605;
			}
		</style>

			<form class="formulario" action="user-registration.php" method="post">
				<div class="form-back">
					<p>Signup</p>
					<div class="form1and2">
						<div class="form-1">
							<label>Name</label>
							<br>
							<input class="form--field" type="text" name="name" required>
							<br>
							<br>
							<label>Goal date</label>
							<br>
							<input style="width:87%; height:1.4rem" class="form--field" type="date" name="finaldate" required>
							<br>
							<br>
							<label>Email address</label>
							<br>
							<input class="form--field" type="text" name="email" required>
							<br>
							<br>
							<label>Password</label>
							<br>
							<input class="form--field" type="password" name="password" required>
							<br>
							<br>
							<label>Confirm password</label>
							<br>
							<input type="password" class="form--field" required>	
						</div>
						<div class="form-2">
							<label>Age</label>
							<br>
							<input class="form--field" type="number" name="age" required> 
							<br>
							<br>
							<label>Height</label>
							<br>
							<input class="form--field" type="number" name="height" required> <small>cm</small>
							<br>
							<br>
							<label>Actual weight</label>
							<br>
							<input class="form--field" type="number" name="weight" required> <small>kg</small>
							<br>
							<br>
							<label>Goal weight</label>
							<br>
							<input class="form--field" type="number" name="goal" required> <small>kg</small>
							<br>
							<br>
							<div class="form-group">
							    <label for=/"exampleFormControlSelect1">Sex</label>
							    <select style="width:60.2%; height:1.4rem;" class="form-control" id="exampleFormControlSelect1" name="sex">
							      <option value="1">Female</option>
							      <option value="2">Male</option>
							    </select>
							</div>
							<br>
							<br>
							<input type="submit" value="Submit">
						</div>
					</div>
				</div>
			</form>
	</body>
</html>