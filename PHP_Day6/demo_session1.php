<?php
	//	Start the session
	session_start();
?>
<html>
	<body>
		<?php
			//set session variables
			$_SESSION ["favcolor"] = "green";
			$_SESSION ["favanimal"] = "cat";
			echo "Session variables are set.";
		?>
	</body>
</html>
