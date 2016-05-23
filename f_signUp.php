<?php
	$getEmail = $_POST['email'];
	$getUsername = $_POST['username'];
	$getPassword = $_POST['password'];
	//$getComfirm = $_POST['confirm'];
 
	$username = "root";
	$password = "";
	$dbname = "articlewebsite";
	$hostname = "localhost";
	
	$connection = new mysqli($hostname,$username,$password,$dbname);
	
	$query = "INSERT INTO user(username,email,password) VALUES ('$getEmail','$getUsername','$getPassword')";

	if($result = $connection->query($query)){
		 echo "New record created successfully";
		 session_start();

				$_SESSION['username'] = $getUsername;
				$_SESSION['password'] = $getPassword;

		 header('Location: http://localhost/storyteller-demo/login.php');
	}
	else {
		echo "Error: " . $query . "<br>" . $connection->error;
	}

	$connection->close();

	// $storyName = $row['storyName'];
	// $storygenre= $row['genre'];
	// $storyDetail = $row['storyDetail'];
	// $storyDate = $row['storyDate'];
	// $storyLike = $row['storyLike'];
	// $storyAuthor = $row['username'];
	// $storyCover = $row['storyCover'];

	// print_r($data['storyName']);

?>