<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/contact.css">
	</head>

	<body>
			<div class="top-content">
				<div class="name">
					<a href="home.php"><img src="images/6e94695575a2c897135f7cc0b86800eb.png" width=105%; height=40%;></a>
					<h4><a href="home.php" style="text-decoration:none">beFit</a></h4>
							<a href="login.php" class="tag-a">Log in</a>
							<p> | </p>
							<a href="user-registration.php" class="tag-a-1">Sign up</a>
				</div>
				<div class="tabs-container">
					<div class="not-tab-active">
						<a href="home.php"><button>Home</button></a>
					</div>
					<div class="not-tab-activee">
						<a href="about.php"><button>About us</button></a>
					</div>
					<button class="tab-active">Contact us</button>
				</div>
			</div>
			<?php
				if (isset($_POST['submit'])) {
					?>
					<p style="margin-left:8.3rem; font-family:Century Gothic;">Thank you for contacting us, we have received your<br>enquiry and will respond to you within 24 hours.</p>
					 <?php
				}
			?>
			<form class="formulario" method="post" action="contact.php">
				<div class="form-back">
					<p>Contact us</p>
					<div class="form1and2">
						<div class="form-1">
							<label>First name</label>
							<br>
							<input class="form--field" style="width:10rem; height:1.35rem" name="First_Name" required>
							<br>
							<br>
							<label>Last name</label>
							<br>
							<input class="form--field" style="width:10rem;" name="Last_Name" required>
							<br>
							<br>
							<label>Email address</label>
							<br>
							<input class="form--field" style="width:15rem;" type="email" name="Email_Address" required>
							<br>
							<br>
							<label>Message</label>
							<br>
							<textarea style="resize: none; font-size:0.8rem; width:16.5rem;" class="form--fieldd" name="Message" required></textarea>
							<br>
						</div>
							</div>
							<br>
							<input name="submit" type="submit" value="Submit">
						</div>
					</div>
				</div>
			</form>
	</body>
</html>



