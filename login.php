<?php
		require_once 'f_checkuser.php';
			//var_dump($_SESSION['username']);
			//var_dump($_SESSION['password']);
		if(isset($_SESSION['username']))
			header('Location: http://localhost/storyteller-demo/home.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel="stylesheet" type="text/css" href="style_sheet.css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
		<title></title>
	</head>
	<body>

		<div id="container">
		<!-- Header -->
		<div class="nav nav-bg">
			<div class="w-con">
				<div class="col-md-2"> LOGO </div>
				<div class="col-md-1"></div>
				<div class="col-md-4 nav-search-con">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					<input type="text" class="nav-search" placeholder="Search...">
				</div>
				<?php
					if(isset($_SESSION['username']))
						echo '<div class="col-md-1"></div>';						
					else
						echo '<div class="col-md-2"></div>';
				?>
				<div class="col-md-1">
					<a href="home.php" class="nav-link">Home</a>
				</div>
				<div class="col-md-1 dropdown">
					<a href="" class="nav-link drop-btn">Article</a>
					<div class="dropdown-content">
						<a href="article.php?article=Experience">Experience</a>
						<a href="article.php?article=Short%20story">Short Story</a>
						<a href="article.php?article=Review">Review</a>
						<a href="article.php?article=Knowledge">Knowledge</a>
					</div>
				</div>
				<?php
					if(isset($_SESSION['username'])){
						echo'<div class="col-md-1">
								<a href="" class="nav-link">Create</a>
							</div>';
						echo '<div class="col-md-1 dropdown">
								<a href="">
								<img class="ui avatar image" src="images\user\default.png">
								</a>
								<div class="dropdown-content">
									<a href="">User Profile</a>
									<a href="">Setting</a>
									<a href="logout.php">Log Out</a>
								</div>
							</div>';																		
					}
					else{
						echo '<div class="col-md-1"><a href="login.php" class="nav-link">Login</a></div>';
					}
				?>
			</div>
		</div>

		<!-- Content -->
		<div class="w-con main-container" id="body">
			<div class="login-container">
				<div class="login-header nav-bg">
					<div class="card-container text-header">Login</div>
				</div>
				<form action="login.php" method="POST">
				<div class="form-group">
						<div class="content-container" style="margin-top: 30px;">
							<p class="text-content">Username :</p>
							<input type="text" class="form-control" name="username" placeholder="Username">
						</div>
						<div class="content-container" style="margin-top: 20px;">
							<p class="text-content">Password :</p>
							<input type="text" class="form-control" name="password" placeholder="Password">
						</div>
						<div class="content-container">
							<div style="float:right;">
								<label class="text-content">
									<a href="#">Forgot Password ?</a>
								</label>
							</div>

							<div class="checkbox" style="width:400px">
								<label class="text-content">
									<input type="checkbox"> Remember Me
								</label>
							</div>
							
						</div>
						<div class="content-container" style="margin-top: 50px;">
							<button type="submit" class="login-btn">Log in</button>
							<a href="home.php" class="login-btn">
								Cancel
							</a>
						</div>
						<div class="content-container" style="margin-top: 20px;">
							<p class="text-content">
								If you didn't have any account, please 
								<a href="register.php">Register Here</a>
							</p>
						</div>
					</div>
				</form>
			</div>
		</div>

		<!-- Footer -->
			<div class="footer">
				<div class="w-con footer-container">
					<div class="col-md-3">
						<span>
							<a href="" class="footer-link">Home </a>	
						</span>
						<span class="text-footer"> /</span>
						<span>
							<a href="" class="footer-link">Article</a>
						</span>
					</div>
					<div class="col-md-7"></div>
					<div class="col-md-2" style="text-align: right; padding-right: 0px;">
						<a href="" class="footer-btn">
							<i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i>
						</a>&nbsp;
						<a href="" class="footer-btn">
							<i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i>
						</a>					
					</div>
					
				</div>
				<div class="w-con">
					<div class="col-md-3">
						<p class="text-footer-miner">Copyright (c) 2016 </p>
					</div>
					<div class="col-md-6"></div>
					<div class="col-md-1" style="text-align: right;">
						<i class="fa fa-envelope-o fa-2x" style="color: #FCE8E1;" aria-hidden="true"></i>
					</div>
					<div class="col-md-2" style="padding-left: 0px;">
						<a href="" class="text-footer-miner footer-btn">something@mail.com </a>
					</div>
				</div>
				
			</div>
		</div>

	</body>
</html>