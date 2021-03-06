<?php
	require_once 'f_checkuser.php';	
	$getGenre = $_GET['article'];
	if(isset($_SESSION['userId'])){
		$userId = $_SESSION['userId'];
	}
		
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		
		<link rel="stylesheet" type="text/css" href="style_sheet_panda.css">

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

		<title></title>
	</head>
	<body>
	<div id="container">
		<?php
		if(isset($userId)){
				$username = "root";
				$password = "";
				$dbname = "articlewebsite";
				$hostname = "localhost";
				
				$connection = new mysqli($hostname,$username,$password,$dbname);

				$queryUserProfile = "SELECT * FROM userprofile WHERE userId = $userId LIMIT 1";

				$result = $connection->query($queryUserProfile);

				$row = $result->fetch_assoc();

				$userPicture = $row['userPicture'];
				$userCover = $row['userCover'];
				$description = $row['description'];
				$totalStories = $row['totalStories'];
				$following= $row['following'];
				$followers = $row['followers'];
		 
			require_once 'f_checkResetPass.php';
		}
 		


		?>
		<!-- Header -->
		<div class="nav nav-bg">
			<div class="w-con">
				<div class="col-md-2"><img src="images/cs_logo.png" style="max-height:40px; position:relative; top:-10px;"></div>
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
		
		<h3 style="margin-top:30px;"><?=$getGenre?></h3>
		<hr>
			<?php
				$getGenre = $_GET['article'];
				$username = "root";
				$password = "";
				$dbname = "articlewebsite";
				$hostname = "localhost";
				
				$connection = new mysqli($hostname,$username,$password,$dbname);
				
				$query = "SELECT * FROM stories JOIN user ON stories.userId = user.userId JOIN storygenre ON stories.genreId = storygenre.genreId JOIN userprofile ON user.userId = userprofile.userId WHERE genre = '$getGenre' ORDER BY storyLike DESC LIMIT 0,10";

				if($result = $connection->query($query));
				{
					while ($data = $result->fetch_assoc()) {
						echo '<a style="color:#262626;" href="read-article.php?storyId='.$data['storyId'].'"><div class="content-card-latest">					
						<div style="width:300px; height:248px; background-size:cover; background-position:center; overflow:hidden; float:left; background-image:url('."'".$data['storyCover']."'".')">
							
						</div>';

						switch ($data["genre"]) {
									case 'Experience':
										$genreIcon = "fa fa-flag";
										break;
									case 'Short story':
										$genreIcon = "fa fa-book";
										break;
									case 'Review':
										$genreIcon = "fa fa-eye";
										break;
									case 'Knowledge':
										$genreIcon = "fa fa-flask";
										break;
								}		

						echo '<div style="float:left; position:relative; width:560px; margin-top:20px; margin:20px;">
								<div class="content-genre">
									<i class="'.$genreIcon.'" aria-hidden="true"></i>
									<span style="padding-left:5px;">'.$data["genre"].'</span>
								</div>';

						echo			"<div style='height:180px;'>
											<h2 class='content header'>".$data['storyName']."</h2>";
						echo				"<div style='height : 100px;'><span>".$data['storyDetail']."</span></div>";
						echo			'<hr>
										</div>	
									<div style="position:absolute; clear: both; float: left; bottom:0px;">
										<div style="display:inline;">'.
										'<img class="ui avatar image" src="'.$data['userPicture'].'">'.$data['username'].'</div>'.
									'</div>	
									<div style="bottom:0px; text-align:right; padding:5px;">'.$data['storyDate'].'</div>																		
								</div>				
						</div></a>';					}
									$result->free();
							}

							$connection->close();
			?>

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
		<script>
			w3IncludeHTML();
		</script>
	</body>


</html>