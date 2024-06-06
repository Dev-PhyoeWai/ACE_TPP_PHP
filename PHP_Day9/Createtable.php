<?php
	require "Database.php";
	global $conn;

	$qry = "CREATE TABLE  guests(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
	
	if($conn->query($qry) === TRUE) {
		echo "Table created successfully";
	}else{
		echo "Error creating table: " . $conn->error;
	}
	$conn->close();
?>
