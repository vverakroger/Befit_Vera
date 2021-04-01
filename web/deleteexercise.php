<?php
	require 'database.php';

	$name=$_GET['name'];

	$sql = "DELETE FROM exercises WHERE name = '$name'";

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