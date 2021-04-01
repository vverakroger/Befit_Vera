<?php
	require 'database.php';

	$name = $_GET['name'];

	$sql = "SELECT * FROM foods WHERE name = '$name'";

	$result = $conn->query($sql);

	$row = $result->fetch(PDO::FETCH_ASSOC);
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
			<h3 style="text-align:left">Edit food</h3>
			<form class="form-horizontal" method="POST" action="editfood2.php" autocomplete="off">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" name="name" placeholder="Name" required>
						<br>
						<label for="calories">Calories</label>
						<input type="number" class="form-control" id="calories" value="<?php echo $row['kcals']; ?>" name="calories" placeholder="Kcals" required>
						<br>
						<label for="grams">Grams</label>
						<input type="number" class="form-control" id="grams" value="<?php echo $row['grs']; ?>" name="grams" placeholder="Grams" required>
						<br>
						<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
						<br>
						<a href="foods.php" class="btn btn-default">Back</a>
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