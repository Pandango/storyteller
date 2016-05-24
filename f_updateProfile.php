<?php
	//var_dump($_FILES['coverImage']);

  if(isset($_POST['coverImage']))
  {
      $target_coverdir = "images/userCover"; //เซฟไฟล์ไว้ในโฟลเดอร์ไหน
      $target_coverfile = $target_coverdir ."/". basename($_FILES["coverImage"]["name"]); // URLของรูป รับชื่อไฟล์มา เป้นการgetfile
      $uploadcoverOk = 1;
      $imageCoverFileType = pathinfo($target_coverfile,PATHINFO_EXTENSION);
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
          $checkCover = getimagesize($_FILES["coverImage"]["tmp_name"]);
          if($checkCover !== false) {
              echo "File is an image - " . $checkCover["mime"] . ".";
              $uploadcoverOk = 1;
          } else {
              alert("File is not an image.");
              $uploadcoverOk = 0;
          }
      }

      // Allow certain file formats
      if($imageCoverFileType != "jpg" && $imageCoverFileType != "png" && $imageCoverFileType != "jpeg"
      && $imageCoverFileType != "gif" ) {
          echo "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
          $uploadcoverOk = 0;
      }
      // Check if $uploadcoverOk is set to 0 by an error
      if ($uploadcoverOk == 0) {
         $target_coverfile = "images/userCover/default.png";
         echo "<input type='hidden' id='photo-direction' name='photo-direction' value=".$target_coverfile.">";
           // echo "<img src='profile-picture/default.jpg' class='photo-circle-item'>";
      
      // if everything is ok, try to upload file
      } else {
          if (move_uploaded_file($_FILES["coverImage"]["tmp_name"], $target_coverfile)) {
          //     echo "The file ". basename( $_FILES["fileImage"]["name"]). " has been uploaded.";
          // echo "<p>You have uploaded</p>";
          echo "<input type='hidden' id='photo-direction' name='photo-direction' value=".$target_coverfile.">";
          } else {
            echo "<script> alert('Sorry, there was an error uploading your file.');</script>";
          }
      }
  }
		
?>
