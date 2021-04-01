<?php
	$records = $conn->prepare("SELECT ((SELECT COALESCE(SUM(kcals),0) FROM breakfast WHERE userid = '$user[id]')+(SELECT COALESCE(SUM(kcals),0) FROM lunch WHERE userid = '$user[id]')+(SELECT COALESCE(SUM(kcals),0) FROM snacks WHERE userid = '$user[id]')+(SELECT COALESCE(SUM(kcals),0) FROM dinner WHERE userid = '$user[id]'))-(SELECT COALESCE(SUM(kcals),0) FROM activities WHERE userid = '$user[id]') as total");
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	echo $results['total'];

?>

