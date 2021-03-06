<?php
	require_once 'f_checkuser.php';	

	if(isset($_SESSION['userId'])){
		$userId = $_SESSION['userId'];	
		require 'f_modalRegis.php';
	}					
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<link rel="stylesheet" type="text/css" href="style_sheet.css">

<!-- 		<link rel="stylesheet" type="text/css" href="style_sheet_panda.css"> -->

		<!-- Jquery-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	    <!-- Custom Fonts -->
	    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css"

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<script src="http://www.w3schools.com/lib/w3data.js"></script>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

		<link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
		<script src="semantic/semantic.min.js"></script>
		<script src="carousel.js"></script>

		<script src="http://www.w3schools.com/lib/w3data.js"></script>

		<title>Colony Story | Home</title>
	</head>
	<body >
		<div id="container">
			<?php
			if(isset($_SESSION['userId'])){
				$username = "root";
				$password = "";
				$dbname = "articlewebsite";
				$hostname = "localhost";
			
				$connection = new mysqli($hostname,$username,$password,$dbname);
				$connection->set_charset('utf8');


				$queryUserProfile = "SELECT * FROM userprofile WHERE userId = $userId LIMIT 1";

				$result = $connection->query($queryUserProfile);

				$row = $result->fetch_assoc();

				$userPicture = $row['userPicture'];
				$userCover = $row['userCover'];
				$description = $row['description'];
				$totalStories = $row['totalStories'];
				$following= $row['following'];
				$followers = $row['followers'];	 		 		
				
				require('f_checkResetPass.php');		

				modalRegis('home.php');
			}		

			?>
			<!-- Header -->
			<div class="nav nav-bg">
				<div class="w-con">
					<div class="col-md-2"><a href="home.php"><img src="images/cs_logo.png" style="max-height:40px; position:relative; top:-10px;"></a></div>
					<div class="col-md-1"></div>
					<div class="col-md-4 nav-search-con">

						<form action="search.php" methos="GET">
							<input type="text" class="nav-search" name="search" placeholder="Search...">
							<button type="submit"style="border: 0; padding: 0; display: inline; background: none;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
						</form>
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
									<a href="create.php" class="nav-link">Create</a>
								</div>';
							echo '<div class="col-md-1 dropdown">
									<a href="">
									<img class="ui avatar image" src="'.$userPicture.'">
									</a>
									<div class="dropdown-content">
										<a href="profile.php">User Profile</a>
										<a data-toggle="modal" data-target="#forgotPass">Setting</a>
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
		<h3 style="margin-top:30px;">Popular Article</h3>
		<hr>
		<div id="myCarousel" class="carousel slide">
			<div class="carousel-inner">
					<div class="item active">
						<div class="row">
						<div w3-include-html="f_findPopular.php"></div>
						</div>
					</div>
					<div class="item">
							<div class="row">
							<div w3-include-html="f_findPopulartNext.php"></div>
							</div>
					</div>
			</div>
				<a style="width: 20px; background:transparent;" class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="icon-prev" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a style="width: 20px; background:transparent;" class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="icon-next" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
		</div>	
		<h3>Latest Article</h3>
		<hr>	
			<div w3-include-html="f_findLatest.php"></div>
			<div style="margin:50px;"></div>			
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

		<!-- Modal -->
<!-- 		<div class="modal fade" id="forgotPass" role="dialog">
			<div class="modal-dialog modal-lg">
				<form action="home.php" method="POST">
				  <div class="modal-content">
				    <div class="modal-header">
				      <button type="button" class="close" data-dismiss="modal">&times;</button>
				      <h4 class="modal-title">Reset Password?</h4>
				    </div>
				    <div class="modal-body">
				    <div class="content-container">
				      	<div class="form-group" style="margin-top: 30px;">
							<p class="text-content">Email :</p>
							<input type="text" class="form-control" name="email" placeholder="Username">
						</div>
				      	<div class="form-group" style="margin-top: 10px;">
							<p class="text-content">New Password :</p>
							<input type="password" class="form-control" name="newPass" placeholder="password">
						</div>
				      	<div class="form-group" style="margin-top: 10px; margin-bottom:30px;">
							<p class="text-content">Confirm New Password :</p>
							<input type="password" class="form-control" name="sendConf" placeholder="password">
						</div>		    	
				    </div>
						
				    </div>
				    <div class="modal-footer">
				    	<button type="submit" class="btn btn-default">Reset Password</button>
				     	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div>
				  </div>
				</form>
			</div>
		</div> -->

		<script>
			w3IncludeHTML();
		</script>
	</body>


</html>