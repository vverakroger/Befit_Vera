<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">
		<script type="text/javascript" src="bootstrap/js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<title></title>
	</head>
	<body>
		<div class="container">
			<br>
			<h3 style="text-align:left">Add exercise</h3>
			<form class="form-horizontal" method="POST" action="saveexercise.php" autocomplete="off">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
						<br>
						<label for="calories">Calories</label>
						<input type="number" class="form-control" id="calories" name="calories" placeholder="Kcals" required>
						<br>
						<label for="minutes">Time</label>
						<input type="number" class="form-control" id="minutes" name="minutes" placeholder="Mins" required>
						<br>
						<br>
						<a href="exercises.php" class="btn btn-default">Back</a>
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
						<button type="submit" class="button">Add</button>
			</form>
		</div>
	</body>
</html>