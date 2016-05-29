<?php
	$getArticleName = $_POST['articleName'];
	$getContent = $_POST['articleDetail'];
	$getGenre = $_POST['choose-genre'];
	$getAuthor = $_POST['author'];
	$getCover = $_POST['createPic'];

	$username = "root";
	$password = "";
	$dbname = "articlewebsite";
	$hostname = "localhost";
	
	$connection = new mysqli($hostname,$username,$password,$dbname);
	$connection->set_charset('utf8');
	
	switch ($getGenre) {
				case 'experience':
					$genre = "G001";
					break;
				case 'short story':
					$genre = "G002";
					break;
				case 'review':
					$genre = "G003";
					break;
				case 'knowledge':
					$genre = "G004";
					break;
	}	

	$queryuserId = "SELECT userId FROM user WHERE username = '$getAuthor'";

	$userId= $connection->query($queryuserId);

	$row = $userId->fetch_assoc();

	$userId = $row['userId'];

	$queryCreateArticle = "INSERT INTO stories(userId,storyName,genreId,storyDetail,storyDate,storyCover) VALUES ('$userId','$getArticleName','$genre','$getContent',CURDATE(),'$getCover')";

	if($result = $connection->query($queryCreateArticle)){
		echo "seccess";
		
	}
	else {
		echo "Error: " . $result . "<br>" . $connection->error;
	}
	header('Location: http://localhost/storyteller-demo/create.php');



?>