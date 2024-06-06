<?php
	require "Database.php";
	global $conn;
//	$sql = "INSERT INTO guests(name,email) VALUES('Mg Mg','mgmg@email.com');";
//	$sql .= "INSERT INTO guests(name,email) VALUES('Hla Hla','hlahla@email.com');";
//	$sql .= "INSERT INTO guests(name,email) VALUES('Yadanar','yadanar@email.com');";
//	$sql .= "INSERT INTO guests(name,email) VALUES('Phyoe','phyoe@email.com');";
//
//	if($conn->multi_query($sql) === TRUE) {
////		$last_id = $conn->insert_id;
////		echo "New record created successfully. Last inserted ID is $last_id";
//		echo "New record created successfully";
//	}else{
//		echo "Error: " . $sql . "<br>" . $conn->error;
//	}
//
	
	# prepare and bind
//	$stmt = $conn->prepare("INSERT INTO guests(name,email) VALUES(?,?)");
//	$stmt->bind_param("ss",$name,$email);
//
//	$name = "Mary Moe";
//	$email = "mary@gmail.com";
//	$stmt->execute();
//
//	$name = "Julie";
//	$email = "julie@gmail.com";
//	$stmt->execute();
//
//	## set parameters and execute
//
//	$stmt->close();

//	$sql = "SELECT * FROM `guests` ORDER BY name";
//	$result = $conn->query($sql);
//
//	if($result->num_rows > 0){
//		echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>RegisterDate</th></tr>";
//
//		while($row = $result->fetch_assoc()){
//			echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"]
//				. "</td><td>" . $row["email"] . "</td><td>" .
//				$row["register_date"] . "</td></tr>";
//		}
//		echo "</table>";
//
//	}else{
//		echo "0 results";
//	}
	
//	$sql = "DELETE FROM guests WHERE id=3";
	$sql = "UPDATE guests SET name = 'Mya Mya' WHERE id = 5";
	if($conn->query($sql) === TRUE) {
		echo "record deleted successfully";
	}else{
		echo "Error: deleting record " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>
