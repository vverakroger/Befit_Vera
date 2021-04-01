<?php

	session_start();
	require 'database.php';

	if (isset($_SESSION['user_id'])) {
		$records = $conn->prepare('SELECT age, height, weight, goal, finaldate, email, password, id FROM users WHERE id=:id');
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
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="bootstrap/js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<title></title>
	</head>
	<body>
		<div class="container">
			<br>
			<h3 style="text-align:left">Edit user info</h3>
			<form class="form-horizontal" method="POST" action="editinfo2.php" autocomplete="off">
						<label for="age">Age</label>
						<input type="number" class="form-control" id="age" value="<?php echo $results['age']; ?>" name="age" placeholder="y/o">
						<br>
						<label for="height">Height</label>
						<input type="number" class="form-control" id="height" value="<?php echo $results['height']; ?>" name="height" placeholder="Cms">
						<br>
						<label for="weight">Actual weight</label>
						<input type="number" class="form-control" id="weight" value="<?php echo $results['weight']; ?>" name="weight" placeholder="Kg">
						<br>
						<label for="goal">Goal weight</label>
						<input type="number" class="form-control" id="goal" value="<?php echo $results['goal']; ?>" name="goal" placeholder="Kg">
						<br>
						<label for="finaldate">Goal date</label>
						<input type="date" class="form-control" id="finaldate" value="<?php echo $results['finaldate']; ?>" name="finaldate" placeholder="Enter goal date">
						<br>
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" value="<?php echo $results['email']; ?>" name="email" placeholder="Enter email">
						<br>
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" value="" name="password" placeholder="Enter new password or leave blank">
						<br>
						<input type="hidden" id="id" name="id" value="<?php echo $results['id']; ?>" />
						<br>
						<a href="my-goals.php" class="btn btn-default">Back</a>
						<style type="text/css">
							.button {
								color: #fff;
								border: 0;
								padding: 0.4rem;
								border-radius: 0.2rem;
								background-color: green;
							}
							.button:hover {
								background-color: #145211;
							}
						</style>
						<button type="submit" class="button">Save</button>
			</form>
		</div>
	</body>
</html>