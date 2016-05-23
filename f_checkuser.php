<?php
	session_start();
	//check is record?
	if(isset($_POST['username'])){
		$getusername = $_POST['username'];
	}
	
	if(isset($_POST['password'])){
		$getpassword = $_POST['password'];
	}
	
	$username = "root";
	$password = "";
	$dbname = "articlewebsite";
	$hostname = "localhost";

	if(isset($getusername) && isset($getpassword)){
		$connection = new mysqli($hostname,$username,$password,$dbname);
		
		$query = "SELECT * FROM user WHERE username = '$getusername' AND password = '$getpassword'";

		$result = $connection->query($query);

		if($result->num_rows == 0){
			echo 'password or username wrong';
			exit();
		}

		$row = $result->fetch_assoc();

		$_SESSION['username'] = $row['username'];
		$_SESSION['password'] = $row['password'];
	}

?>