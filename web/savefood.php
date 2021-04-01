<?php
	require 'database.php';

	$name=$_POST['name'];
	$calories=$_POST['calories'];
	$quantity=$_POST['quantity'];

	$sql = "INSERT INTO foods (name, kcals, grs) VALUES ('$name', '$calories', '$quantity')";

	$result = $conn->query($sql);
?>

<html>
	<?php if ($result) {
		header('Location: foods.php');
	} else { ?>

	<p>Error</p>
	<a href="foods.php" class="btn btn-primary">Back</a>
		
	<?php } ?>
</html>