<?php

if(isset($_FILES['fileImage'])){

    $target_dir = "images/user"; //เซฟไฟล์ไว้ในโฟลเดอร์ไหน
    $target_file = $target_dir ."/". basename($_FILES["fileImage"]["name"]); // URLของรูป รับชื่อไฟล์มา เป้นการgetfile
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileImage"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            alert("File is not an image.");
            $uploadOk = 0;
        }
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
       $target_file = "images/user/default.png";
       echo "<input type='hidden' id='photo-direction' name='photo-direction' value=".$target_file.">";
         // echo "<img src='profile-picture/default.jpg' class='photo-circle-item'>";
    
    // if everything is ok, try to upload file
       
    } else {
        if (move_uploaded_file($_FILES["fileImage"]["tmp_name"], $target_file)) {
        //     echo "The file ". basename( $_FILES["fileImage"]["name"]). " has been uploaded.";
        // echo "<p>You have uploaded</p>";
        echo "<input type='hidden' id='photo-direction' name='photo-direction' value=".$target_file.">";
        } else {
          echo "<script> alert('Sorry, there was an error uploading your file.');</script>";
        }
    }
  }

?>

