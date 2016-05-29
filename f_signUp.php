<?php
	$getEmail = $_POST['email'];
	$getUsername = $_POST['username'];
	$getPassword = $_POST['password'];
	$getComfirm = $_POST['confirm-password'];

	if($getPassword == $getComfirm){	

		$username = "root";
		$password = "";
		$dbname = "articlewebsite";
		$hostname = "localhost";
		
		$connection = new mysqli($hostname,$username,$password,$dbname);
		$connection->set_charset('utf8');

		$queryisRegisted = "SELECT * FROM user WHERE username = '$getUsername' AND email = '$getEmail'";
		$queryisEmailUsaged = "SELECT * FROM user WHERE email = '$getEmail'";
		$queryisUserUsaged = "SELECT * FROM user WHERE username = '$getUsername'";

		$resultisRegited = $connection->query($queryisRegisted);
		$resultisEmailUsaged = $connection->query($queryisEmailUsaged);
		$resultisUserUsaged = $connection->query($queryisUserUsaged);

		if($resultisRegited ->num_rows == 0 && $resultisEmailUsaged -> num_rows == 0 && $resultisUserUsaged -> num_rows == 0){
			$isSignUp = true;
			//exit();
		}
		else{
			echo '<script type="text/javascript">alert("This user or Email already registed!")
			window.location = "register.php";
			</script>';	
		}	
		
	 	if(isset($isSignUp)){
			
			
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
					header('Location: home.php');
					//exit();

			}
			else {
				echo "Error: " . $query . "<br>" . $connection->error;
			}	
		}
	}
	else{
		echo '<script type="text/javascript">alert("Password and confirm password not same")
		window.location = "register.php";
		</script>';				
	}

	
?>