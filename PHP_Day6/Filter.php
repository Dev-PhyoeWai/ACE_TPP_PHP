<?php

?>
<html>
<body>
	<table>
		<tr>
			<td>Filter Name</td>
			<td>Filter ID</td>
		</tr>
		<?php
			foreach (filter_list() as $id => $filter) {
				echo '<tr> <td>' . $filter . '</td><td>'. filter_id($filter) . '</td> </tr>';
			}
		?>
	</table>

	<?php
		
		$str = "<h1>Hello World!</h1>";
		echo $str;
		echo filter_var($str, FILTER_SANITIZE_STRING);
		
		echo "<br>";
		
		$num = 100;
		echo filter_var($num, FILTER_SANITIZE_NUMBER_INT);
		if(filter_var($num, FILTER_VALIDATE_INT) === 0 ||
			!filter_var($num, FILTER_VALIDATE_INT) === false) {
			echo (" Integer is valid");
		}else{
			echo (" Integer is NOT valid");
		}
		
		echo "<br>";
//		FILTER_VALIDATE_IP
		$ip = "127.0.0.1";
		if(!filter_var($ip, FILTER_VALIDATE_IP) === false){
			echo ("$ip is a valid ip address!");
		}else{
			echo ("$ip is NOT valid ip address.");
		}
	
		echo "<hr>";
//
		$email = "johndoe@example.com";
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false){
			echo ("$email is a valid email address!");
		}else{
			echo ("$email is NOT valid email address.");
		}
	
		echo "<hr>";
		
//		callback functions
		function myCallBack($item){
			return strlen($item);
		}
		$strings = ["apple", "banana", "orange", "pear", "cherry"];
		$lengths = array_map("myCallBack", $strings);
		print_r($lengths);
	
		echo "<hr>";
		
		function exclaim($str){
			return $str . "!";
		}
		function ask($str){
			return $str . "?";
		}
		
		function printMessage($message,$format){
			echo $format($message);
		}
		printMessage("Happy New Year " , "exclaim");
		echo "<br>";
		printMessage("Happy New Year " , "ask");
	?>
</body>
</html>
