<?php
	require 'database.php';
	$sql = "SELECT * FROM foods";
	$result = $conn->query($sql);
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
						<a href="foods.php"><button style="background-color:#99ff00">Foods</button></a><a href="exercises.php"><button>Exercises</button></a><a href="dailyplanner.php"><button>My daily plan</button></a><a href="aboutt.php"><button>About us</button></a><a href="contactt.php"><button>Contact us</button></a>
					</div>
				</div>
			</div>	
		<br>
		<a class="button" href="newfood.php">Add food</a>
		<br>
		<br>
		<div class="scroll_vertical">
		<div class="tablee">
		<table class="table table-striped" style="text-align:left">
			<thead> 
				<tr>
					<th>Name</th>
					<th>Calories</th>
					<th>Grams</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
				<tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['kcals']; ?></td>
					<td><?php echo $row['grs']; ?></td>
					<td><a style="text-decoration:none" href="editfood.php?name=<?php echo $row['name']; ?>"><span class="edit">Edit</span></a></td>
					<td><a style="text-decoration:none" href="#" data-href="deletefood.php?name=<?php echo $row['name']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="delete">Delete</span></a></td>
				</tr>
					<?php } ?>
			</tbody>
		</table>
		</div>
		</div>
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
		
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	

	</body>
</html>