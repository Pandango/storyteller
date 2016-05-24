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
	
	$query = "INSERT INTO user(username,email,password) VALUES ('$getUsername','$getEmail','$getPassword')";

	if($result = $connection->query($query)){
		 echo "New record created successfully";
		 session_start();
				$_SESSION['username'] = $getUsername;
				$_SESSION['password'] = $getPassword;

				
				// $query = "INSERT INTO user(username,email,password) VALUES ('$getUsername','$getEmail','$getPassword')";

				// $queryNew = "SELECT * FROM User JOIN userprofile ON user.userId = userprofile.userId WHERE username = '$getUsername' AND email = '$email'";
				// $result = $connection->query($queryNew);
				// $row = $result->fetch_assoc();

				// $_SESSION['userId'] = $row['userId'];
				//header('Location: http://localhost/storyteller-demo/home.php');
	}
	else {
		echo "Error: " . $query . "<br>" . $connection->error;
	}

	$connection->close();


	$username = "root";
	$password = "";
	$dbname = "articlewebsite";
	$hostname = "localhost";
	
	$connection = new mysqli($hostname,$username,$password,$dbname);

	$queryNew = "SELECT * FROM user WHERE username = '$getUsername' AND email = '$email'";
	$result = $connection->query($queryNew);
	$row = $result->fetch_assoc();


	$_SESSION['userId'] = 15;
	header('Location: http://localhost/storyteller-demo/home.php');
	var_dump($_SESSION);
	

	// $storyName = $row['storyName'];
	// $storygenre= $row['genre'];
	// $storyDetail = $row['storyDetail'];
	// $storyDate = $row['storyDate'];
	// $storyLike = $row['storyLike'];
	// $storyAuthor = $row['username'];
	// $storyCover = $row['storyCover'];

	// print_r($data['storyName']);

?>