
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ace_tpp_startup";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	// For users table
	$sql = "CREATE TABLE IF NOT EXISTS users (
		id INT AUTO_INCREMENT PRIMARY KEY,
		username VARCHAR(255) NOT NULL,
		email VARCHAR(50) NOT NULL,
		password VARCHAR(150) NOT NULL,
		create_date DATETIME DEFAULT CURRENT_TIMESTAMP,
		update_date DATETIME NULL,
		delete_date DATETIME NULL
	)";
	
	if ($conn->query($sql) === TRUE) {
		echo "Table users created successfully";
	} else {
		echo "Error creating table: " . $conn->error;
	}
	
	// For notes table
	$sql = "CREATE TABLE IF NOT EXISTS notes (
		id INT AUTO_INCREMENT PRIMARY KEY,
		user_id INT NOT NULL,
		title VARCHAR(255) NOT NULL,
		body TEXT NOT NULL,
		create_date DATETIME DEFAULT CURRENT_TIMESTAMP,
		update_date DATETIME DEFAULT NULL,
		delete_date DATETIME NULL,
		FOREIGN KEY (user_id) REFERENCES users(id)
	)";
	
	if ($conn->query($sql) === TRUE) {
		echo "Table notes created successfully";
	} else {
		echo "Error creating table: " . $conn->error;
	}
	
	$conn->close();
?>

