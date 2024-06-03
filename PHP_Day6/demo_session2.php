<?php
	session_start();
?>
<html>
	<body>
		<?php
			$_SESSION ["favcolor"]= "yellow";
			echo "Fav color is : " . $_SESSION['favcolor'] . "<br>";
			echo "Fav animal is : " . $_SESSION['favanimal'] . "<br>";
			print_r($_SESSION);
			
			unset($_SESSION["favcolor"]);
			echo "<br>";
			print_r($_SESSION);
		?>
	</body>
</html>
