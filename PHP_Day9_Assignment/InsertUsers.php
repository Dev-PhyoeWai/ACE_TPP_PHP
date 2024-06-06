<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ace_tpp_startup";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	// Prepare and bind
	$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $username, $email, $hashed_password);
	
	//	Set parameters and execute
	$username = $_POST['username'];
	$email = $_POST['email'];
	$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$stmt->execute();
	
	echo "New record created successfully";
	
	$stmt->close();
	$conn->close();
?>
