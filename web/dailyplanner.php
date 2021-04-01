<?php
	require 'search.php';

	//session_start();
	require 'database.php';


	if(!isset($_SESSION['user_id'])) {
		header('Location: home.php');
	}

	if (isset($_SESSION['user_id'])) {
		$records = $conn->prepare('SELECT id, email, password, age, weight, height, sex, goal, finaldate FROM users WHERE id=:id');
		$records->bindParam(':id', $_SESSION['user_id']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$user = null;

		if (count($results) > 0) {
			$user = $results;
		}
	}

	if ($user['finaldate'] == date("Y-m-d")){
		if ($user['weight'] == $user['goal']) {
			header('Location: success.php');
		}else{
			header('Location: failure.php');
		}
	}

	if ($user['weight'] == $user['goal']) {
		header('Location: success.php');
	}


?>


<html>
	<head>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/foodsandex.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="bootstrap/js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<title></title>
	</head>
	<body>

<style type="text/css">
* {
	box-sizing: border-box;
}

body {
	margin: 0;
	background-repeat: no-repeat;
	background-image: url("https://cookstorming.com/wp-content/uploads/2015/03/Fotolia_99776874_Subscription_Monthly_M.jpg");
}

h4 {
	text-align: left;
	font-size: 3.2rem;
	font-weight: bold;
	font-style: oblique;
	font-family: Lucida Handwriting; 
	margin-bottom: 0;
	margin-top: 1.3rem;
}

.name {
	display: flex;
	margin-left: 5rem;
}

.logout:hover {
	color: #99ff00;
	transition-duration: 0.5s;
}

.logout {
	margin-left: 60.5rem;
	padding-top: 3.6rem;
	color: #fff;
	font-family: Century Gothic;
	cursor: pointer;
	font-size: 0.95rem;
	text-decoration: none;
}

.name img {
	margin-top: 1.8rem;
}

.name a {
	width: 60px;
	height: 80px;
	cursor: pointer;
	color: #000;
}

.tabs-container {
	font-family: Arial;
	display: flex;
	background-color: rgba(173, 255, 51, 0.8);
	margin: 0;
	max-width: 85.4rem;
	height: 2.2rem;
	margin-top: 0.3rem;
	margin-bottom: 3rem;
}

.not-tab-active button:hover {
	background-color: #99ff00;
	transition-duration: 0.5s;
}

.not-tab-active button {
	background-color: rgba(173, 255, 51, 0.1);
	border: 0;
	width: 10rem;
	height: 2.2rem;
	font-size: 1rem;
	cursor: pointer;
	color: #fff;
}

.tab-active {
	margin-left: 5rem;
	background-color: rgba(173, 255, 51, 0.1);
	border: 0;
	width: 10rem;
	font-size: 1rem;
	height: 2.2rem;
	color: #fff;
}

	.table1 {
		width: 40%;
		margin-left: 5rem;
		margin-top: 4rem;
		text-align: left;
		font-family: Century Gothic;
		position: relative;
		overflow: hidden;
		max-height: 150px;
		height: 150px;
		overflow-y: scroll;

	}

	.tables {
		display: flex;
		height: 157px;
		
		
	}

	.table2 {
		margin: 0 auto;
		margin-top: 0.5rem;
		height: 150px;
	}

	input {
		font-size: 13px;

	}

	.message{
		background-color: rgba(255, 255, 255, 0.9);
		text-align: center;
		margin-left: 13.5rem;
		font-family: Century Gothic;
	}

	.restart:hover {
	background-color: #7acc00;
	color: #fff;
	text-decoration: none;
	}

	.restart {
		background-color:#99ff00;
		text-decoration:none;
		color: #fff;
	}

</style>
			<div class="top-content">
				<div class="name">
					<a href="my-goals.php"><img src="images/6e94695575a2c897135f7cc0b86800eb.png" width=105%; height=40%;></a>
					<h4><a href="my-goals.php" style="text-decoration:none;">beFit</a></h4>
					<a href="logout.php" class="logout">Log out</a>
				</div>
				<div class="tabs-container">
					<a href="my-goals.php"><button class="tab-active">My goals</button></a>
					<div class="not-tab-active">
						<a href="foods.php"><button>Foods</button></a><a href="exercises.php"><button>Exercises</button></a><a href="dailyplanner.php"><button style="background-color:#99ff00">My daily plan</button></a><a href="aboutt.php"><button>About us</button></a><a href="contactt.php"><button>Contact us</button></a>
					</div>
				</div>
			</div>	

			<a class="restart" href="restart.php" style="height:2rem; margin-bottom:0rem; font-size:1rem; border:none; border-radius:0.3rem; padding:0.4rem; margin-left:43.4rem">Restart</a>
    
			<div class="tables">
				<div class="table1" style="margin-top:0.5rem;">
				<table class="table table-striped">
					<thead style="color: #fff"> 
						<tr style="background-color: #99ff00">
							<th>Breakfast: <form action="search.php" method="post" style="display:inline-block; margin:0; width:412px"><input type="submit" name="submitbf" class="btn btn-default" value="+" style="background-color:white; float:right; padding:5px; height:18px; width:18px; margin-top:3px; line-height:0.4; padding-right:15px"></input><input style="width:25%; height: 1.5rem; float:right; margin-right:4px" type="search" name="search" placeholder="Search food" required></form></th>
						</tr>
					</thead>
					<tbody style="background-color: rgba(255, 255, 255, 0.9); display:inline-block; width: 100%">
						<?php while ($row = $resultbf->fetch(PDO::FETCH_ASSOC)) { ?>
					<tr>
						<td style="width: 100%"><?php echo $row['name']; ?></td>
						<td style="width: 100%"><?php echo $row['kcals']; ?>kcal</td>
						<td style="width: 100%"><?php echo $row['grs']; ?>grams</td>
						<td><a style="text-decoration:none" href="#" data-href="deletebrandact.php?name=<?php echo $row['name']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="delete">Delete</span></a></td>
					</tr>
					<?php } ?>
					</tbody>
				</table>
				</div>
				<div class="table2">
				<table class="table table-striped">
					<thead style="color: #fff"> 
						<tr style="background-color: #99ff00">
							<th>Daily kcal</th>
							<th>Ttl kcal</th>
							<th>A. weight</th>
							<th>G. weight</th>
							<th>Actual date</th>
							<th>Goal date</th>
						</tr>
					</thead>
					<tbody style="background-color: rgba(255, 255, 255, 0.9)">
						<tr>
							<td><?php require 'function-calc.php';?> kcal</td>
							<td><?php require 'total-cal.php';?> kcal</td>
							<td><?php echo $user['weight'];?> kg</td> 
							<td><?php echo $user['goal'];?> kg</td>
							<td><?php echo date("Y-m-d"); ?></td>
							<td><?php echo $user['finaldate'];?></td>
							
							<div class="message">
								<?php if(!empty($message)): ?>
								<p><?= $message ?></p>
								<?php endif; ?>
							</div>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
			
			<div style="margin-top:4rem; overflow-y: scroll; width:40%; margin-left:5rem; height:150px">
				<table class="table table-striped">
					<thead style="color: #fff"> 
						<tr style="background-color: #99ff00">
							<th>Lunch: <form action="search.php" method="post" style="display:inline-block; margin:0; width:439px"><input type="submit" name="submitlun" class="btn btn-default" value="+" style="background-color:white; float:right; padding:5px; padding-top:1px; height:18px; width:18px; margin-top:3px; line-height:0.4; padding-right:15px"></input><input style="width:23.5%; font-family:Century Gothic; height: 1.5rem; float:right; margin-right:4px; float:right" type="search" name="search" placeholder="Search food" required></form></th>
						</tr>
					</thead>
					<tbody style="background-color: rgba(255, 255, 255, 0.9); display:inline-block; width: 100%">
						<?php while ($row = $resultlun->fetch(PDO::FETCH_ASSOC)) { ?>
					<tr>
						<td style="width: 100%"><?php echo $row['name']; ?></td>
						<td style="width: 100%"><?php echo $row['kcals']; ?>kcal</td>
						<td style="width: 100%"><?php echo $row['grs']; ?>grams</td>
						<td><a style="text-decoration:none" href="#" data-href="deletelunch.php?name=<?php echo $row['name']; ?>" data-toggle="modal" data-target="#confirm-delete"><span style="font-family:Century Gothic;" class="delete">Delete</span></a></td>
					</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="table1">
				<table class="table table-striped">
					<thead style="color: #fff"> 
						<tr style="background-color: #99ff00">
							<th>Snacks: <form action="search.php" method="post" style="display:inline-block; margin:0; width:427.5px"><input type="submit" name="submitsn" class="btn btn-default" value="+" style="background-color:white; float:right; padding:5px; height:18px; width:18px; margin-top:3px; line-height:0.4; padding-right:15px"></input><input style="width:25%; height: 1.5rem; float:right; margin-right:4px" type="search" name="search" placeholder="Search food" required></form></th>
						</tr>
					</thead>
					<tbody style="background-color: rgba(255, 255, 255, 0.9); display:inline-block; width: 100%">
						<?php while ($row = $resultsn->fetch(PDO::FETCH_ASSOC)) { ?>
					<tr>
						<td style="width: 100%"><?php echo $row['name']; ?></td>
						<td style="width: 100%"><?php echo $row['kcals']; ?>kcal</td>
						<td style="width: 100%"><?php echo $row['grs']; ?>grams</td>
						<td><a style="text-decoration:none" href="#" data-href="deletesnacks.php?name=<?php echo $row['name']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="delete">Delete</span></a></td>
					</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="table1">
				<table class="table table-striped">
					<thead style="color: #fff"> 
						<tr style="background-color: #99ff00">
							<th>Dinner: <form action="search.php" method="post" style="display:inline-block; margin:0; width:433px"><input type="submit" name="submitdi" class="btn btn-default" value="+" style="background-color:white; float:right; padding:5px; padding-top:1px; padding-bottom:1px; height:18px; width:18px; margin-top:3px; line-height:0.4; padding-right:15px"></input><input style="width:23.5%; font-family:Century Gothic; height: 1.5rem; float:right; margin-right:4px; float:right" type="search" name="search" placeholder="Search food" required></form></th>
						</tr>
					</thead>
					<tbody style="background-color: rgba(255, 255, 255, 0.9); display:inline-block; width: 100%">
						<?php while ($row = $result8->fetch(PDO::FETCH_ASSOC)) { ?>
					<tr>
						<td style="width: 100%"><?php echo $row['name']; ?></td>
						<td style="width: 100%"><?php echo $row['kcals']; ?>kcal</td>
						<td style="width: 100%"><?php echo $row['grs']; ?>grams</td>
						<td><a style="text-decoration:none" href="#" data-href="deletedinner.php?name=<?php echo $row['name']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="delete">Delete</span></a></td>
					</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="table1">
				<table class="table table-striped">
					<thead style="color: #fff"> 
						<tr style="background-color: #99ff00">
							<th>Exercises: <form action="search.php" method="post" style="display:inline-block; margin:0; width:412px"><input type="submit" name="submitact" class="btn btn-default" value="+" style="background-color:white; float:right; padding:5px; height:18px; width:18px; margin-top:3px; line-height:0.4; padding-right:15px"></input><input style="width:25%; height: 1.5rem; font-size: 12px; float:right; margin-right:4px" type="search" name="search" placeholder="Search activity" required></form></th>
						</tr>
					</thead>
					<tbody style="background-color: rgba(255, 255, 255, 0.9); display:inline-block; width: 100%">
						<?php while ($row = $result10->fetch(PDO::FETCH_ASSOC)) { ?>
					<tr>
						<td style="width: 100%"><?php echo $row['name']; ?></td>
						<td style="width: 100%"><?php echo $row['kcals']; ?>kcal</td>
						<td style="width: 100%"><?php echo $row['mins']; ?>min</td>
						<td><a style="text-decoration:none" href="#" data-href="deletebrandact.php?name=<?php echo $row['name']; ?>" data-toggle="modal" data-target="#confirm-delete2"><span class="delete">Delete</span></a></td>
					</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
			<br>

			<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel"></h4>
					</div>
					
					<div class="modal-body">
						Delete food?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<a class="btn btn-danger btn-ok">Delete</a>
					</div>
				</div>
			</div>
		</div>


		<div class="modal fade" id="confirm-delete2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel"></h4>
					</div>
					
					<div class="modal-body">
						Delete activity?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<a class="btn btn-danger btn-ok">Delete</a>
					</div>
				</div>
			</div>
		</div>

		<script>
		$('#confirm-delete').on('show.bs.modal', function(e) {
			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
			
			$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
		});
		$('#confirm-delete2').on('show.bs.modal', function(e) {
			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
			
			$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
		});
		</script>	
	</body>
</html>




