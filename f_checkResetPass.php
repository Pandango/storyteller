		<!-- Modal -->
		<div class="modal fade" id="forgotPass" role="dialog">
		<div class="modal-dialog modal-lg">
			<form action="create.php" method="POST">
			  <div class="modal-content">
			    <div class="modal-header">
			      <button type="button" class="close" data-dismiss="modal">&times;</button>
			      <h4 class="modal-title">Reset Password?</h4>
			    </div>
			    <div class="modal-body">
			    <div class="content-container">
			      	<div class="form-group" style="margin-top: 30px;">
						<p class="text-content">Email :</p>
						<input type="text" class="form-control" name="email" placeholder="Username">
					</div>
			      	<div class="form-group" style="margin-top: 10px;">
						<p class="text-content">New Password :</p>
						<input type="password" class="form-control" name="newPass" placeholder="password">
					</div>
			      	<div class="form-group" style="margin-top: 10px; margin-bottom:30px;">
						<p class="text-content">Confirm New Password :</p>
						<input type="password" class="form-control" name="sendConf" placeholder="password">
					</div>		    	
			    </div>
					
			    </div>
			    <div class="modal-footer">
			    	<button type="submit" class="btn btn-default">Reset Password</button>
			     	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			    </div>
			  </div>
			</form>
		</div>
		</div> 

<?php

	$getUser = $_SESSION['username'];
	if(isset($_POST['email'])){
		$email = $_POST['email'];
	}
	
	if(isset($_POST['newPass'])){
		$newPassword = $_POST['newPass'];
	}
	
	if(isset($_POST['sendConf'])){
		$confirmPass = $_POST['sendConf'];
	}
	
	if(isset($email) && isset($newPassword) && isset($confirmPass)){
		if($newPassword == $confirmPass){
			$username = "root";
			$password = "";
			$dbname = "articlewebsite";
			$hostname = "localhost";

			$connection = new mysqli($hostname,$username,$password,$dbname);
				
			$query = "SELECT * FROM user WHERE username = '$getUser' AND email = '$email'";

			$result = $connection->query($query);

			if($result->num_rows == 0){
				echo 'user or email is wrong';
				exit();				
			}

			$row = $result->fetch_assoc();

			$queryUpdatePass = "UPDATE user SET password='$newPassword' WHERE username = '$getUsername' AND email = '$email'";

			if($connection->query($queryUpdatePass)){
				echo "success";
			}
			$connection->close();
			
		}	
		else {
			echo "password not same";
		}
	}else{
		
	}		
?>
