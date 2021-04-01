<?php

	require 'database.php';
	//REQUIRED USER INFORMATION
	if (isset($_SESSION['user_id'])) {
		$records = $conn->prepare('SELECT id, age, height, sex, goal, finaldate, weight FROM users WHERE id=:id');
		$records->bindParam(':id', $_SESSION['user_id']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$user = null;

		if (count($results) > 0) {
			$user = $results;
		}
	}

	$goal 	= $user['goal'];
	$height = $user['height'];
	$age	= $user['age'];
	$sex	= $user['sex'];
	$finaldate	= $user['finaldate'];
	$weight	= $user['weight'];

	$date = date("Y-m-d");

	//WEIGHT AMOUNT (KG)
	$weightdiff = abs($weight - $goal); 

	//DAYS TO GOAL CALCULATION 
	$datetime1 = date_create($date);
    $datetime2 = date_create($finaldate);
	$interval = date_diff($datetime1, $datetime2);
	$days = $interval->format('%a');

	//TOTAL TO LOSE
	if ($days != 0) {
		$totaltolose = (7000 * $weightdiff) / $days;
	}else{
		$totaltolose = 0;
	}
	

	if($sex == 2){
		//MEN DAILY CALORIES CALCULATION
		$calories=(66+(13.7* $weight)+(5* $height)-(6.75* $age))*1.2 /*(LITTLE OR NO EXERCISE)*/;

		if ($weight > $goal) {
			$total = round($calories - $totaltolose);
		}else if($weight < $goal){
			$total = round($calories + $totaltolose);
		}else{
			$total = round($calories);
		}
		
		echo "$total";
	}
	else{
		//WOMEN DAILY CALORIES CALCULATION
		$calories=(655+(9.6* $weight)+(1.8* $height)-(4.7* $age))*1.2 /*(LITTLE OR NO EXERCISE)*/;
		
		if ($weight > $goal) {
			$total = round($calories - $totaltolose);
		}else if($weight < $goal){
			$total = round($calories + $totaltolose);
		}else{
			$total = round($calories);
		}
		
		echo "$total";
	}

	$mas = "";
	//WEEKLY FREQUENCY
	if ($weight > $goal) {
			$weeklyfreq = "-".($totaltolose*7) / 7000;
		}else if($weight < $goal){
			$mas = "+";
			$weeklyfreq = ($totaltolose*7) / 7000;
		}else{
			$weeklyfreq = 0;
		}
?>