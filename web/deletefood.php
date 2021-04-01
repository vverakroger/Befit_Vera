<?php
	require 'database.php';

	$name=$_GET['name'];

	$sql = "DELETE FROM foods WHERE name = '$name'";

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