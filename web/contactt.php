<html>
	<head>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/foodsandex.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/contactt.css">
		<script type="text/javascript" src="bootstrap/js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<title></title>
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
						<a href="foods.php"><button>Foods</button></a><a href="exercises.php"><button>Exercises</button></a><a href="dailyplanner.php"><button>My daily plan</button></a><a href="aboutt.php"><button>About us</button></a><a href="contactt.php"><button style="background-color:#99ff00">Contact us</button></a>
					</div>
				</div>
			</div>	
			<?php
				if (isset($_POST['submit'])) {
					?>
					<p style="margin-left:8.3rem; font-family:Century Gothic; margin-top:0.5rem;">Thank you for contacting us, we have received your<br>enquiry and will respond to you within 24 hours.</p>
					 <?php
				}
			?>
			<form class="formulario" method="post" action="contactt.php">
				<div class="form-back">
					<p>Contact us</p>
					<div class="form1and2">
						<div class="form-1">
							<label>First name</label>
							<br>
							<input class="form--field" style="width:10rem; height:1.35rem" name="First_Name" required>
							<br>
							<label>Last name</label>
							<br>
							<input class="form--field" style="width:10rem;" name="Last_Name" required>
							<br>
							<label>Email address</label>
							<br>
							<input class="form--field" type="email" style="width:15rem;" name="Email_Address" required>
							<br>
							<label>Message</label>
							<br>
							<textarea style="resize: none; font-size:0.8rem; width:16.5rem;" class="form--fieldd" name="Message" required></textarea>
							<br>
						</div>
							</div>
							<br>
							<input type="submit" name="submit" value="Submit">
						</div>
					</div>
				</div>
			</form>
	</body>
</html>