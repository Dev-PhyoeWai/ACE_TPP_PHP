<?php
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_NAME', 'test');
	define('DB_PASS', '');
	function dbConnect()
	{
		$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//		echo "<pre>" . print_r($db,true) . "</pre>";
//		errDebugger($db);
//		echo mysqli_connect_errno() > 0 ? "Connection error" : "Connection successful";
		if(mysqli_errno($db) > 0)
			die("Connection failed!!");
		else
			return $db;
	}
	function executeQuery($query){
		$db = dbConnect();
		$result = mysqli_query($db, $query);
//		errDebugger($result);
		echo "Number of rows are : " . mysqli_num_rows($result);
//		foreach($result as $item){
////			errDebugger($item);
//			echo "ID is : " . $item["id"] . "<br>";
//			echo "Name is : " . $item["name"] . "<br>";
//			echo "Email is : " . $item["email"] . "<br>";
//			echo "Password is : " . $item["password"] . "<hr>";
//		}
	}
	function errDebugger($data)
	{
		echo "<pre>" . print_r($data,true) . "</pre>";
	}

	$query = "SELECT * FROM users";
	executeQuery($query);
	
?>