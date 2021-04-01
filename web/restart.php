<?php
	require 'database.php';
	session_start();

	if (isset($_SESSION['user_id'])) {
		$records = $conn->prepare('SELECT id FROM users WHERE id=:id');
		$records->bindParam(':id', $_SESSION['user_id']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$user = null;

		if (count($results) > 0) {
			$user = $results;
		}
	}

	$sql = "DELETE FROM breakfast WHERE userid='$user[id]'";
	$result = $conn->query($sql);

	$sql = "DELETE FROM lunch WHERE userid = '$user[id]'";
	$result = $conn->query($sql);

	$sql = "DELETE FROM snacks WHERE userid = '$user[id]'";
	$result = $conn->query($sql);

	$sql = "DELETE FROM dinner WHERE userid = '$user[id]'";
	$result = $conn->query($sql);

	$sql = "DELETE FROM activities WHERE userid = '$user[id]'";
	$result = $conn->query($sql);


?>

<html>
	<?php if ($result) {
		header('Location: dailyplanner.php');
	} else { ?>

	<p>Error</p>
	<a href="dailyplanner.php" class="btn btn-primary">Back</a>
		
	<?php } ?>
</html>