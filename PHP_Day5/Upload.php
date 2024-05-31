<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 0;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

//        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {

                echo "File is an image - " . $check["mime"] . ".";
//                echo "<img src='uploads/unit.jpg' alt='image'/>";
                $uploadOk = 1;

                if($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                if($imageFileType != "jpg" && $imageFileType != "png" &&
                   $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG and JPEG files are allowed.";
                    $uploadOk = 0;
                }

            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
//      }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        }else {
            if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) .
                     "  has been uploaded.";
                echo "<img src='uploads/data.jpg' alt='image'/>";
            } else{
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
?>

    <form action="Upload.php" method="POST" enctype="multipart/form-data">
        Select image to upload: <br> <br>
        <input type="file" name="fileToUpload" id="fileToUpload" multiple />  <br> <br>
        <input type="submit" value="Upload" name="submit" />
    </form>
