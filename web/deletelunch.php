<?php
require 'database.php';
$name=$_GET['name'];
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

	$sql = "DELETE FROM lunch WHERE userid='$user[id]' AND name = '$name'";
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