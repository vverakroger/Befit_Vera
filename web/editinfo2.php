<?php
	require 'database.php';

	$id=$_POST['id'];
	$age=$_POST['age'];
	$height=$_POST['height'];
	$aweight=$_POST['weight'];
	$gweight=$_POST['goal'];
	$gdate=$_POST['finaldate'];
	$email=$_POST['email'];
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

	

	if (empty($_POST['password'])) {
		$sql = "SELECT password FROM users WHERE id = '$id'";
		$resultt = $conn->query($sql);
		$results = $resultt->fetch(PDO::FETCH_ASSOC);
		$password = $results['password'];
	}

	$sql = "UPDATE users SET age = '$age', height = '$height', weight = '$aweight', goal = '$gweight', finaldate = '$gdate', email = '$email', password = '$password' WHERE id = '$id'";

	$result = $conn->query($sql);

?>

<html>
	<?php if ($result) {
		header('Location: my-goals.php');
	} else { ?>

	<p>Error</p>
	<a href="my-goals.php" class="btn btn-primary">Back</a>
		
	<?php } ?>
</html>