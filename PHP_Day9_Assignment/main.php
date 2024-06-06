<?php
    require("ValidateDbUsers.php");
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['submit'])) {
			# validate entries
			$validation = new UserValidator($_POST);
			$errors = $validation->validateForm();
   
			$name = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
			$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
   
		}else {
			echo "<h2 style='color:#f80303'>* Error uploading file.</h2>";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Form and Notes Form</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
	<!-- user form -->
    <div class="container">
        <h2>User Form</h2>
            <form action="InsertUsers.php" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <label>Username</label><br>
                        <input type="text" name="username" value="<?php echo $_POST['username'] ?? '' ?>">
                        <div class="error">
							<?php echo $errors['username'] ?? '' ?>
                        </div>
                    </div>
                    <div class="input-box">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo $_POST['email'] ?? '' ?>">
                        <div class="error">
							<?php echo $errors['email'] ?? '' ?>
                        </div>
                    </div>
                    <div class="input-box">
                        <label>Password</label>
                        <input type="password" name="password" required>
                    </div>
                    <input type="submit" value="Submit" class="btn">
                </div>
            </form>
    </div>
	
	<!-- note form -->
    <div class="container">
        <h2>Notes Form</h2>
        <form action="InsertNotes.php" method="POST">
            <div class="user-details">
                <div class="input-box">
                    <label>User ID</label>
                    <input type="text" name="user_id" required>
                </div>
                <div class="input-box">
                    <label>Title</label>
                    <input type="text" name="title" required>
                </div>
                <div class="input-box">
                    <label>Body</label>
                    <textarea name="body" required rows="10" cols="109"></textarea>
                </div>
                <input type="submit" value="Submit" class="btn">
            </div>
        </form>
    </div>
	
</body>
</html>

