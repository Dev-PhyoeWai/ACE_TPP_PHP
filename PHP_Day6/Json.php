<?php
	$age = ["Peter"=>34,"John"=>34,"Jane"=>34,"Johnny"=>34];
	$cars = ["Ford", "BMW", "Toyota"];
	echo json_encode($age);
	echo json_encode($cars);
	
	echo "<br>";
	
	$jsonObjs = '{"Peter":34,"John":34,"Jane":34,"Johnny":34}';
	var_dump(json_decode($jsonObjs));
	$obj = json_decode($jsonObjs);
//	echo $obj->Peter;
//	echo $obj->John;
//	echo $obj->Jane;
	foreach ($obj as $key => $value) {
		echo $key . ": " . $value . "<br>";
	}
	
	echo "<br>";
	
	var_dump(json_decode($jsonObjs , true));
	$arr = json_decode($jsonObjs,true);
//	echo $arr["Peter"];
//	echo $arr["John"];
//	echo $arr["Jane"];
	foreach ($arr as $key => $value) {
		echo $key . ": " . $value . "<br>";
	}
	
?>
