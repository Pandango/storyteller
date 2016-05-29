<?php
	$delStoryId= $_GET['delStoryId'];
	$username = "root";
	$password = "";
	$dbname = "articlewebsite";
	$hostname = "localhost";
	
	$connection = new mysqli($hostname,$username,$password,$dbname);
	$connection->set_charset('utf8');
	
	$query = "DELETE FROM stories WHERE storyId = $delStoryId";

	$result = $connection->query($query);

	header('Location: http://localhost/storyteller-demo/profile.php');
		
?>