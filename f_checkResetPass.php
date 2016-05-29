<?php

	if(isset($_SESSION['userId'])){
		$userId = $_SESSION['userId'];
	}

	if(isset($_POST['email'])){
		$email = $_POST['email'];
	}
	
	if(isset($_POST['newPass'])){
		$newPassword = $_POST['newPass'];
	}
	
	if(isset($_POST['sendConf'])){
		$confirmPass = $_POST['sendConf'];
	}
	
	if(isset($email) && isset($newPassword) && isset($confirmPass) && isset($userId)){
		if($newPassword == $confirmPass){
			$username = "root";
			$password = "";
			$dbname = "articlewebsite";
			$hostname = "localhost";

			$connection = new mysqli($hostname,$username,$password,$dbname);
			$connection->set_charset('utf8');
				
			$query = "SELECT * FROM user WHERE userId = '$userId' AND email = '$email'";

			$result = $connection->query($query);

			if($result->num_rows == 0){
			echo '<script type="text/javascript">alert("Email was wrong!");
				
				</script>';
								
			}

			$row = $result->fetch_assoc();

			$queryUpdatePass = "UPDATE user SET password='$newPassword' WHERE userId = '$userId' AND email = '$email'";

			if($connection->query($queryUpdatePass)){
				//succees
			}
			$connection->close();
			
		}	
		else {
			echo '<script type="text/javascript">alert("Password not same");
				
				</script>';
		}
	}else{
		
	}		
?>
