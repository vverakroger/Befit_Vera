<?php
	require 'database.php';

	$name=$_POST['name'];
	$calories=$_POST['calories'];
	$minutes=$_POST['minutes'];

	$sql = "INSERT INTO exercises (name, kcals, mins) VALUES ('$name', '$calories', '$minutes')";

	$result = $conn->query($sql);
?>

<html>
	<?php if ($result) {
		header('Location: exercises.php');
	} else { ?>

	<p>Error</p>
	<a href="exercises.php" class="btn btn-primary">Back</a>
		
	<?php } ?>
</html>