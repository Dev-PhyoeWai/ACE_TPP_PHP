<?php
	function mySetCookie(){
		setcookie("user", "Mg Mg", time()+60 , "/");
	}
//	mySetCookie();
	function myTestCookie(){
		setcookie("test_cookie", "test", time()+60 , "/");
	}
//	myTestCookie();

	function deleteCookie(){
		setcookie("user", "Mg Mg", time()-3600 , "/");
	}
//	deleteCookie();
?>
<html>
	<body>
	<?php
//		function myGetCookie(){
//			if(!isset($_COOKIE["user"])){
//				echo "Cookie named is not set.";
//				echo "Cookie 'user' is deleted.";
//			}else {
//				echo "Cookie " . $_COOKIE["user"] . " is set.";
//				echo "Value is " . $_COOKIE["user"];
//			}
//		}
//		myGetCookie();
	
		function countCookie(){
			if(count($_COOKIE) > 0){
				echo "Cookies are enabled." . count($_COOKIE);
				var_dump($_COOKIE);
			}else {
				echo "Cookies are disabled.";
			}
		}
		countCookie();
	?>
	</body>
</html>
