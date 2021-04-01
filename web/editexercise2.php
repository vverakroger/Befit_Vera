<?php
	require 'database.php';

	$id=$_POST['id'];
	$name=$_POST['name'];
	$calories=$_POST['calories'];
	$minutes=$_POST['minutes'];

	$sql = "UPDATE exercises SET name = '$name', kcals = '$calories', mins = '$minutes' WHERE id = '$id'";

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