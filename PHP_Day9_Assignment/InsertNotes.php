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
	$stmt = $conn->prepare("INSERT INTO notes (user_id, title, body) VALUES (?, ?, ?)");
	$stmt->bind_param("iss", $user_id, $title, $body);
	
	// Set parameters and execute
	$user_id = $_POST['user_id'];
	$title = $_POST['title'];
	$body = $_POST['body'];
	$stmt->execute();
	
	echo "New record created successfully";
	
	$stmt->close();
	$conn->close();
?>
