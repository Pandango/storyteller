<?php

	$username = "root";
	$password = "";
	$dbname = "articlewebsite";
	$hostname = "localhost";
	
	$connection = new mysqli($hostname,$username,$password,$dbname);
	
	$query = "SELECT * FROM stories JOIN user ON stories.userId = user.userId JOIN storygenre ON stories.genreId = storygenre.genreId ORDER BY storyLike DESC LIMIT 0,3";

	$result = $connection->query($query);

	while ($data = $result->fetch_assoc()) {
		$storyName = $data['storyName'];
		$storygenre= $data['genre'];
		$storyDetail = $data['storyDetail'];
		$storyDate = $data['storyDate'];
		$storyLike = $data['storyLike'];
		$storyAuthor = $data['username'];
		$storyCover = $data['storyCover'];

		echo '<div class="float col-md-4">
				<div class="ui card left " style="margin-bottom:5px;">
					<div class="image">
					    <img src="images\articleCover\default-cover.png">
					</div>
				<div class="content">
				<a class="header">'.$storyName.'</a>';		   
		echo	'<div class="description">'.$storyDetail.'</div>';
		echo	'</div>
				<div class="extra content">
					<span class="right floated">'.$storyDate.'</span>';
		echo	'<div class="left floated author">
					      <img class="ui avatar image" src="images\user\default.png">'.$storyAuthor.
					'</div>
				</div>		
			</div>
		</div>';
	}
		$result->free();


	// print_r($data['storyName']);

?>