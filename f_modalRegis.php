<?php
	function modalRegis ($pagename){
		echo '
		<div class="modal fade" id="forgotPass" role="dialog">
			<div class="modal-dialog modal-lg">
				<form action="'.$pagename.'" method="POST">
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
		</div>';
	}
?>