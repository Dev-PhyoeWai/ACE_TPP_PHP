
<?php
	global $conn;
	require("Database.php");
	
	$qry = "CREATE DATABASE startup";
	if($conn->query($qry) === TRUE) {
		echo "Database created successfully";
	}else{
		echo "Error creating database: " . $conn->error;
	}
	$conn->close();
	
?>
