<?php
	$getEmail = $_POST['email'];
	$getUsername = $_POST['username'];
	$getPassword = $_POST['password'];

	$isSignUp = true;
	//$getComfirm = $_POST['confirm'];
 
 	if(isset($isSignUp)){
		$username = "root";
		$password = "";
		$dbname = "articlewebsite";
		$hostname = "localhost";
		
		$connection = new mysqli($hostname,$username,$password,$dbname);
		$connection->set_charset('utf8');
		
		$query = "INSERT INTO user(username,email,password) VALUES ('$getUsername','$getEmail','$getPassword')";

		if($result = $connection->query($query)){
			 echo "New record created successfully";
			 session_start();
				$_SESSION['username'] = $getUsername;
				$_SESSION['password'] = $getPassword;

				$queryNew = "SELECT * FROM user WHERE username = '$getUsername' AND email = '$getEmail'";
				$result = $connection->query($queryNew);
				$row = $result->fetch_assoc();


				$_SESSION['userId'] = $row['userId'];
				var_dump($_SESSION['userId']);
				header('Location: http://localhost/storyteller-demo/home.php');

		}
		else {
			echo "Error: " . $query . "<br>" . $connection->error;
		}
		
		
		
	}

?>