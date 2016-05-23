<?php

	$username = "root";
	$password = "";
	$dbname = "articlewebsite";
	$hostname = "localhost";
	
	$connection = new mysqli($hostname,$username,$password,$dbname);
	
	$query = "SELECT * FROM stories JOIN user ON stories.userId = user.userId JOIN storygenre ON stories.genreId = storygenre.genreId WHERE storyId='$getStoryId' LIMIT 1";

	if($result = $connection->query($query)){
		$data = $result->fetch_assoc() {
		$storyName = $data['storyName'];
		$storygenre= $data['genre'];
		$storyDetail = $data['storyDetail'];
		$storyDate = $data['storyDate'];
		$storyLike = $data['storyLike'];
		$storyAuthor = $data['username'];
		$storyCover = $data['storyCover'];
	}
	$result->free();

	$connection->close();

	print_r($result);

?>