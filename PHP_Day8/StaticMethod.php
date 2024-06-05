<?php
	class StaticMethod{
		public static function test(){
			echo "Hello world";
		}
		public function __construct()
		{
			self::test();
		}
	}
	StaticMethod::test();
	new StaticMethod();
	
	class A{
		public static function start(){
			echo "Hello world from other class A";
		}
	}
	class B{
		public function message(){
			A::start();
		}
	}
	$obj = new B();
	echo $obj->message();
	
	echo "<br>";
	class Domain{
		protected static function getWebName()
		{
			return "http://aceplussolution.com";
		}
	}
	class DomainAPS extends Domain{
		public $websiteName;
		public function __construct(){
			$this->websiteName = parent::getWebName();
		}
	}
	$domain = new DomainAPS();
	echo $domain->websiteName;
	
	echo "<br>";
	## ----------------------------------- static properties	------------------------- ##
	class PI{
		static $value = 3.14159;
		public function staticValue()
		{
			return self::$value;
		}
	}
	$pi = new PI();
	echo $pi->staticValue();
	
	echo "<br>";
	
	class PII{
		static $val = 3.14159;
	}
	class x extends PII{
		public function xstatic(){
			return parent::$val;
		}
	}
	echo x::$val;
	echo "<br>";
	$x = new x();
	echo $x->xstatic();
?>
