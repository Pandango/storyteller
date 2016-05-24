<?php
	$delStoryId= $_GET['delStoryId'];
	$username = "root";
	$password = "";
	$dbname = "articlewebsite";
	$hostname = "localhost";
	
	var_dump($delStoryId);
	$connection = new mysqli($hostname,$username,$password,$dbname);
	
	$query = "DELETE FROM stories WHERE storyId = $delStoryId";

	$result = $connection->query($query);

	header('Location: http://localhost/storyteller-demo/profile.php');
		
?>