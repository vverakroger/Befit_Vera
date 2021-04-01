<?php
	require 'database.php';

	$id=$_POST['id'];
	$name=$_POST['name'];
	$calories=$_POST['calories'];
	$grams=$_POST['grams'];

	$sql = "UPDATE foods SET name = '$name', kcals = '$calories', grs = '$grams' WHERE id = '$id'";

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