<?php

	$username = "root";
	$password = "";
	$dbname = "articlewebsite";
	$hostname = "localhost";
	
	$connection = new mysqli($hostname,$username,$password,$dbname);
	$connection->set_charset('utf8');

	$query = "SELECT * FROM stories JOIN user ON stories.userId = user.userId JOIN storygenre ON stories.genreId = storygenre.genreId JOIN userprofile ON user.userId = userprofile.userId ORDER BY storyDate DESC";

	if($result = $connection->query($query));
	{
		while ($data = $result->fetch_assoc()) {
		echo '<a style="color:#262626;" href="read-article.php?storyId='.$data['storyId'].'"><div class="content-card-latest">					
					<div style="width:300px; height:248px; background-size:cover; background-position:center; overflow:hidden; float:left; background-image:url('."'".$data['storyCover']."'".')">
						
					</div>';

			switch ($data["genre"]) {
						case 'Experience':
							$genreIcon = "fa fa-flag";
							break;
						case 'Short story':
							$genreIcon = "fa fa-book";
							break;
						case 'Review':
							$genreIcon = "fa fa-eye";
							break;
						case 'Knowledge':
							$genreIcon = "fa fa-flask";
							break;
					}		

			echo '<div style="float:left; position:relative; width:590px; margin-top:20px; margin:20px;">
					<div class="content-genre">
						<i class="'.$genreIcon.'" aria-hidden="true"></i>
						<span style="padding-left:5px;">'.$data["genre"].'</span>
					</div>';

			echo			"<div style='height:180px;'>
								<h2 class='content header'>".$data['storyName']."</h2>";
			echo				"<div style='height : 100px;'><span class='card-content'>".$data['storyDetail']."</span></div>";
			echo			'<hr>
							</div>	
						<div style="position:absolute; clear: both; float: left; bottom:0px;">
							<div style="display:inline;">'.
							'<img class="ui avatar image" src="'.$data['userPicture'].'">'.$data['username'].'</div>'.
						'</div>	
						<div style="bottom:0px; text-align:right; padding:5px;">'.$data['storyDate'].'</div>																		
					</div>				
			</div></a>';
		}
			$result->free();
	}

	$connection->close();
?>