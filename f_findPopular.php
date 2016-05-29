<?php

	$username = "root";
	$password = "";
	$dbname = "articlewebsite";
	$hostname = "localhost";
	
	$connection = new mysqli($hostname,$username,$password,$dbname);
	$connection->set_charset('utf8');

	$query = "SELECT * FROM stories JOIN user ON stories.userId = user.userId JOIN storygenre ON stories.genreId = storygenre.genreId JOIN userprofile ON user.userId = userprofile.userId ORDER BY storyLike DESC LIMIT 0,3";


	$result = $connection->query($query);

	while ($data = $result->fetch_assoc()) {
		$storyId = $data['storyId'];
		$storyName = $data['storyName'];
		$storygenre= $data['genre'];
		$storyDetail = $data['storyDetail'];
		$storyDate = $data['storyDate'];
		$storyLike = $data['storyLike'];
		$storyAuthor = $data['username'];
		$storyCover = $data['storyCover'];

		echo '<div class="float col-md-4">
				<div class="ui card left " style="margin-bottom:5px; margin-left:auto; margin-right:auto;">
					<div style="widht:260px; height:215px;" class="image">
					    <img style="max-width:100%; max-height:100%;" src="'.$storyCover.'">
					</div>
				<div class="content">
				<a class="header" href="read-article.php?storyId='.$storyId.'">'.$storyName.'</a>';		   
		echo	'<div class="description">'.$storyDetail.'</div>';
		echo	'</div>
				<div class="extra content">
					<span class="right floated">'.$storyDate.'</span>';
		echo	'<div class="left floated author">
					      <img class="ui avatar image" src="'.$data['userPicture'].'">'.$storyAuthor.
					'</div>
				</div>		
			</div>
		</div>';
	}
		$result->free();
?>