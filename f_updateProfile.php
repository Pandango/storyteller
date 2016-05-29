<?php  

  if(isset($_SESSION['userId'])){
    $userId = $_SESSION['userId'];
  }

  if(isset($_POST['description'])){
    $getDescription = $_POST['description'];
  }
  else{
    $getDescription = "";
  }

  if(isset($_POST['photoUpload'])){
    $getPhoto = $_POST['photoUpload'];
  }
  else{
    $getPhoto = "images/user/default.png";
  }

  if(isset($getDescription) && isset($getPhoto)){
      $username = "root";
      $password = "";
      $dbname = "articlewebsite";
      $hostname = "localhost";

      $connection = new mysqli($hostname,$username,$password,$dbname);
      $connection->set_charset('utf8');
        
      $query = "UPDATE userprofile SET userPicture='$getPhoto',description = '$getDescription' WHERE userId = $userId";

      $connection->query($query);

      $connection->close();    
  }    

		
?>
