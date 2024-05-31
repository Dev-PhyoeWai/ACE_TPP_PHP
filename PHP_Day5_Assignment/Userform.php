<?php

$nameErr = $emailErr = $genderErr = $websiteErr = $imgErr = "";
$name = $email = $gender = $comment = $website = $fileToUpload = "";

function testInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["username"])) {
        $nameErr = "* Username is required";
    } else {
        $name = testInput($_POST["username"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "*Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "* Email is required";
    } else {
        $email = testInput($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["gender"])) {
        $genderErr = "* Gender is required";
    } else {
        $gender = testInput($_POST["gender"]);
    }

    if (empty($_POST["website"])) {
        $websiteErr = "* Website is required";
    } else {
        $website = testInput($_POST["website"]);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
            $websiteErr = "*Invalid URL";
        }
    }
    # ---------------------------------------------------------------------------
    # comment check
    if (!empty($_POST["comment"])) {
        $comment = testInput($_POST["comment"]);
    }
    # ---------------------------------------------------------------------------
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                $imgErr = "*Sorry, your file is too large.";
                $uploadOk = 0;
            }
            if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
                $imgErr = "*Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
        } else {
            $imgErr = "*File is not an image.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $imgErr = "*Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $imgErr = "*No file was uploaded.";
    }

    // If no errors, save data to file
    if (empty($nameErr) && empty($emailErr) && empty($genderErr) && empty($websiteErr) && empty($imgErr)) {
        $data = "$name,$email,$website,$comment,$gender,$target_file\n";
        file_put_contents('users.txt', $data, FILE_APPEND);

        echo "<h1 style='color: greenyellow; text-align: center; margin-top: 20px;'>Register Successful</h1>";

        $name = $email = $gender = $comment = $website = $fileToUpload = "";
    }
}
?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Registration Form</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Name</span>
                <input type="text" name="username" placeholder="Enter your name" value="<?php echo $name; ?>"/>
                <span style="color: red"><?php echo $nameErr; ?></span>
            </div>
            <div class="input-box">
                <span class="details">Email</span>
                <input type="email" name="email" placeholder="Enter your email" value="<?php echo $email; ?>"/>
                <span style="color: red"><?php echo $emailErr; ?></span>
            </div>
            <div class="input-box">
                <span class="details">Password</span>
                <input type="password" name="password"/>
            </div>
            <div class="input-box">
                <span class="details">Website</span>
                <input type="text" name="website" placeholder="Enter your website" value="<?php echo $website; ?>"/>
                <span style="color: red"><?php echo $websiteErr; ?></span>
            </div>
            <div class="input-box">
                <span class="details">Comment</span>
                <textarea name="comment" rows="5" cols="50"><?php echo $comment; ?></textarea>
            </div>
            <div class="gender-details">
                <div class="g-title">
                    <span class="gender-title">Gender</span>
                </div>
                <div class="category">
                    <div class="g-category">
                        <span class="gender">Male</span>
                        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male" checked/>
                    </div>
                    <div class="g-category">
                        <span class="gender">Female</span>
                        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female"/>
                    </div>
                    <div class="g-category">
                        <span class="gender">Other</span>
                        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other"/>
                    </div>
                    <span style="color: red"><?php echo $genderErr; ?></span>
                </div>
            </div>
            <div class="file-field">
                <input type="file" name="fileToUpload" id="fileToUpload" />
                <span style="color: red"><?php echo $imgErr; ?></span>
            </div>
            <input class="btn" type="submit" value="Register"/>
        </div>
    </form>
</div>

<!-- Display registered users -->
<div class="registered-users">
    <h2 class="table-title">Registered Users</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Website</th>
            <th>Comment</th>
            <th>Gender</th>
            <th>Image</th>
        </tr>
        <?php
        if (file_exists('users.txt')) {
            $files = fopen('users.txt', 'r');
            while (($user = fgetcsv($files)) !== false) {
                echo "<tr>";
                foreach ($user as $field) {
                    if (str_contains($field, "uploads")) {
                        echo "<td><img width='30px' height='30px' src='" . htmlspecialchars($field) . "' alt='" . htmlspecialchars($field) . "' /></td>";
                    } else {
                        echo "<td>" . htmlspecialchars($field) . "</td>";
                    }
                }
                echo "</tr>";
            }
            fclose($files);
        }
        ?>
    </table>
</div>
</body>
</html>
