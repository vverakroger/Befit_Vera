<?php

	session_start();
	require 'database.php';

	if(!isset($_SESSION['user_id'])) {
		header('Location: home.php');
	}

	if (isset($_SESSION['user_id'])) {
		$records = $conn->prepare('SELECT id, name, email, password, age, weight, height, sex, goal, finaldate FROM users WHERE id=:id');
		$records->bindParam(':id', $_SESSION['user_id']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$user = null;

		if (count($results) > 0) {
			$user = $results;
		}
	}

?>

<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/my-goals.css">
	</head>
	<body>
			<div class="top-content">
				<div class="name">
					<a href="my-goals.php"><img src="images/6e94695575a2c897135f7cc0b86800eb.png" width=105%; height=40%;></a>
					<h4><a href="my-goals.php" style="text-decoration:none;">beFit</a></h4>
					<a href="logout.php" class="logout">Log out</a>
				</div>
				<div class="tabs-container">
					<a href="my-goals.php"><button class="tab-active">My goals</button></a>
					<div class="not-tab-active">
						<a href="foods.php"><button>Foods</button></a><a href="exercises.php"><button>Exercises</button></a><a href="dailyplanner.php"><button>My daily plan</button></a><a href="aboutt.php"><button>About us</button></a><a href="contactt.php"><button>Contact us</button></a>
					</div>
				</div>
			</div>	
			
		<?php
			if (($user['weight'] == $user['goal']) && ($user['finaldate'] == date("Y-m-d"))) {
				?>
				<p style="background-color:#99ff00; color: #fff; width: 33.5rem; margin-left:4rem; margin-bottom:0; margin-top:0.8rem; padding:0.5rem;"><small style="color:red">IMPORTANT: </small>You have achieved your goal, well done! Update your goal weight and date to start a new plan.</p> 
				<?php
			}

			if (($user['weight'] == $user['goal']) && ($user['finaldate'] != date("Y-m-d"))) {
				?>
				<p style="background-color:#99ff00; color: #fff; width: 33.5rem; margin-left:4rem; margin-bottom:0; margin-top:0.8rem; padding:0.5rem;"><small style="color:red">IMPORTANT: </small>You have achieved your goal, well done! Update your goal weight and date to start a new plan.</p> 
				<?php
			}

			if (($user['finaldate'] == date("Y-m-d")) && ($user['weight'] != $user['goal'])){
				?>
				<p style="background-color:#99ff00; color: #fff; width: 33.5rem; margin-left:4rem; margin-bottom:0; margin-top:0.8rem; padding:0.5rem;"><small style="color:red">IMPORTANT: </small>You did not achieve your goal. Change your goal date to start a new plan, don't give up!</p>
				<?php
				}
		?>

			<div class="message">
			<?php if(!empty($user)): ?>
				Welcome back <?php echo $user['name']; ?>!
				<a style="float:right; font-size:0.9rem;" href="editinfo.php">Edit info</a>
			</div>
				<table style="text-align:left">
					<tr>
						<th>Age: </th>
						<td><?php echo $user['age']; ?> years old</th>
							
					</tr>
					<tr>
						<th>Height: </th>
						<td><?php echo $user['height']; ?> cm</th>
					</tr>
					<tr>
						<th>Sex: </th>
						<td><?php if ($user['sex'] == 1) {
										echo "Female";
										} else {
										echo "Male";
										}?></th>
					</tr>
					<tr>
						<th>Actual weight: </th>
						<td><?php echo $user['weight']; ?> kg</th>
					</tr>
					<tr>
						<th>Goal weight: </th>
						<td><?php echo $user['goal']; ?> kg</th>
					</tr>

					<tr>
						<th>Goal date: </th>
						<td><?php echo $user['finaldate']; ?></th>
					</tr>

					<tr>
						<th>Daily calories: </th>
						<td><?php require 'function-calc.php';?> kcal <p style="font-size:0.95rem; margin:0; font-family:Century Gothic;">(Weekly frequency: <?php echo $mas; echo bcdiv($weeklyfreq, '1', 2); ?>)</p></th>
					</tr>
				</table>
				<a style="font-family:Century Gothic;" class="click" href="dailyplanner.php">Click here to see your daily plan!</a>

			<?php endif; ?>
	</body>
</html>




