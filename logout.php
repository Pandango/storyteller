<?php
	session_start();
	session_destroy();
	header('Location: http://localhost/storyteller-demo/home.php');
?>