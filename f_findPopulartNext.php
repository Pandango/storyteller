<?php

	$username = "root";
	$password = "";
	$dbname = "articlewebsite";
	$hostname = "localhost";
	
	$connection = new mysqli($hostname,$username,$password,$dbname);
	
	$query = "SELECT * FROM stories JOIN user ON stories.userId = user.userId JOIN storygenre ON stories.genreId = storygenre.genreId ORDER BY storyLike DESC LIMIT 3,3";

	$result = $connection->query($query);

	while ($data = $result->fetch_assoc()) {
		echo '<div class="float col-md-4">
			<div class="ui card left " style="margin-bottom:5px;">
				<div class="image">
				    <img src="images\articleCover\default-cover.png">
				</div>
				<div class="content">
				<a class="header">'.
				    $data['storyName'].
				'</a>';		   
		echo	'<div class="description">'.
					      $data['storyDetail'].
				'</div>';
		echo	'</div>
				<div class="extra content">
					<span class="right floated">'.
						$data['storyDate'].
					'</span>';
		echo	'<div class="left floated author">
					      <img class="ui avatar image" src="images\user\default.png">'.$data['username'].
					'</div>
				</div>		
			</div>
		</div>';
	}
		$result->free();

	// $storyName = $row['storyName'];
	// $storygenre= $row['genre'];
	// $storyDetail = $row['storyDetail'];
	// $storyDate = $row['storyDate'];
	// $storyLike = $row['storyLike'];
	// $storyAuthor = $row['username'];
	// $storyCover = $row['storyCover'];

	// print_r($data['storyName']);

?>