<?php
	require "Database.php";
	global $conn;
	$sql = "INSERT INTO guests(name,email) VALUES('MaMa','mama@email.com')";
	if($conn->query($sql) === TRUE) {
		$last_id = $conn->insert_id;
		echo "New record created successfully. Last inserted ID is $last_id";
	}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>
