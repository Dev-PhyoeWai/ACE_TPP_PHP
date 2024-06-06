
<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "startup";

## ----------------------------------- MY Sqli OOP	-------------------------------------- ##
	$conn = new mysqli($servername, $username, $password , $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	return $conn;

## ----------------------------------- Procedual	-------------------------------------- ##
//	$conn = mysqli_connect($servername, $username, $password , $dbname);
	# check connection

//	if(!$conn){
//		die("Connection failed: " . mysqli_connect_error());
//	}
//	echo "connected successfully";

	## ----------------------------------- PDO	-------------------------------------- ##
//	try{
//		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//
//		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//		echo "Connected successfully";
//	}catch(PDOException $e){
//		echo "Connection failed: " . $e->getMessage();
//	}
	
?>