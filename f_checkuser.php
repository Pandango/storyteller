<?php
	if(!isset($isSignUp)){
		session_start();
		//check is record?
		if(isset($_POST['username'])){
			$getusername = $_POST['username'];
		}
		
		if(isset($_POST['password'])){
			$getpassword = $_POST['password'];
		}
		
		$usernameDB = "root";
		$password = "";
		$dbname = "articlewebsite";
		$hostname = "localhost";

		if(isset($getusername) && isset($getpassword) && !isset($_POST['cancle'])){
			$connection = new mysqli($hostname,$usernameDB,$password,$dbname);
			$connection->set_charset('utf8');
			
			$query = "SELECT * FROM user WHERE username = '$getusername' AND password = '$getpassword'";

			$result = $connection->query($query);

			if($result->num_rows == 0){
				echo '<script type="text/javascript">wrongPass();</script>';
			}

			$row = $result->fetch_assoc();

			$_SESSION['userId'] = $row['userId'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['password'] = $row['password'];

			$connection->close();
		}
	}	
	

?>

