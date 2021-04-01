<?php
	session_start();

	require 'database.php';

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

	//BREAKFAST
	$resultbf = $conn->prepare("SELECT * FROM breakfast WHERE userid = '$user[id]'");   
	$resultbf->execute();
	if (isset($_POST['submitbf'])) {
		$search = $_POST['search'];
		$data1 = $conn->query("SELECT name,kcals,grs FROM foods WHERE LOWER(name) = LOWER('$search')");
		$data = $data1->fetch(PDO::FETCH_ASSOC);
		if ($data != null){
			$result = $conn->prepare("INSERT INTO breakfast (name,kcals,grs,userid) VALUES ('$data[name]','$data[kcals]','$data[grs]','$user[id]')"); 
			$result->execute();
		}	
		header('Location: dailyplanner.php');
	}


	//LUNCH
	$resultlun = $conn->prepare("SELECT * FROM lunch WHERE userid = '$user[id]'");   
	$resultlun->execute();
	if (isset($_POST['submitlun'])) {
		$search = $_POST['search'];
		$data1 = $conn->query("SELECT name,kcals,grs FROM foods WHERE LOWER(name) = LOWER('$search')");
		$data = $data1->fetch(PDO::FETCH_ASSOC);
		if ($data != null){
			$result3 = $conn->prepare("INSERT INTO lunch (name,kcals,grs,userid) VALUES ('$data[name]','$data[kcals]','$data[grs]','$user[id]')");   
			$result3->execute();
		}	
		header('Location: dailyplanner.php');
	}

	//SNACKS
	$resultsn = $conn->prepare("SELECT * FROM snacks WHERE userid = '$user[id]'");   
	$resultsn->execute();
	if (isset($_POST['submitsn'])) {
		$search = $_POST['search'];
		$data1 = $conn->query("SELECT name,kcals,grs FROM foods WHERE LOWER(name) = LOWER('$search')");
		$data = $data1->fetch(PDO::FETCH_ASSOC);
		if ($data != null){
			$result5 = $conn->prepare("INSERT INTO snacks (name,kcals,grs,userid) VALUES ('$data[name]','$data[kcals]','$data[grs]','$user[id]')");   
			$result5->execute();	
		}
		header('Location: dailyplanner.php');
	}

	//DINNER
	$result8 = $conn->prepare("SELECT * FROM dinner WHERE userid = '$user[id]'");   
	$result8->execute();
	if (isset($_POST['submitdi'])) {
		$search = $_POST['search'];
		$data1 = $conn->query("SELECT name,kcals,grs FROM foods WHERE LOWER(name) = LOWER('$search')");
		$data = $data1->fetch(PDO::FETCH_ASSOC);
		if ($data != null){
			$result7 = $conn->prepare("INSERT INTO dinner (name,kcals,grs,userid) VALUES ('$data[name]','$data[kcals]','$data[grs]','$user[id]')");    
			$result7->execute();
		}	
		header('Location: dailyplanner.php');
	}

	//ACTIVITIES
	$result10 = $conn->prepare("SELECT * FROM activities WHERE userid = '$user[id]'");   
	$result10->execute();
	if (isset($_POST['submitact'])) {
		$search = $_POST['search'];
		$data1 = $conn->query("SELECT name,kcals,mins FROM exercises WHERE LOWER(name) = LOWER('$search')");
		$data = $data1->fetch(PDO::FETCH_ASSOC);
		if ($data != null){
			$result7 = $conn->prepare("INSERT INTO activities (name,kcals,mins, userid) VALUES ('$data[name]','$data[kcals]','$data[mins]','$user[id]')");    
			$result7->execute();	
		}
		header('Location: dailyplanner.php');
	}
	
?>
