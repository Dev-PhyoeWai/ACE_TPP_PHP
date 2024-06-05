<?php
	// parent class
	abstract class Car{
		public $name;
		public function __construct($name){
			$this->name = $name;
		}
		abstract public function intro(): string;
	}
	
	// child class
	class Audi extends Car{
		public function intro(): string{
			return "Choose German quality ! I am an {$this->name}!";
		}
	}
	class Volvo extends Car{
		public function intro(): string{
			return "Proud to be Sweden ! I am a {$this->name}!";
		}
	}
	class Citroen extends Car{
		public function intro(): string{
			return "French extravagance ! I am a {$this->name}!";
		}
	}
	// Create abjects from the child classes
	$audi = new Audi("Audi");
	echo $audi->intro();
	echo "<hr>";
	
	$volvo = new Volvo("Volvo");
	echo $volvo->intro();
	echo "<hr>";
	
	$citroen = new Citroen("Citroen");
	echo $citroen->intro();
	echo "<hr>";
	
	## ------------------------- prefix class ---------------------------- ##
	abstract class ParentClass{
		// abstract method with an argument
		abstract protected function prefixName($name);
	}
//	class ChildClass extends ParentClass{
//		public function prefixName($name){
//			if($name === "Aung Aung"){
//				$prefix = "U";
//			}elseif ($name === "Aye Aye"){
//				$prefix = "Daw";
//			}else{
//				$prefix = "";
//			}
//			return "{$prefix} {$name}";
//		}
//	}

	class ChildClass extends ParentClass{
		public function prefixName($name, $separator = "." , $great ="Dear"){
			if($name === "Aung Aung"){
				$prefix = "Mr";
			}elseif ($name === "Aye Aye"){
				$prefix = "Ms";
			}else{
				$prefix = "";
			}
			return "{$great} {$prefix} {$separator} {$name}";
		}
	}
	$class = new ChildClass;
	echo $class->prefixName("Aung Aung");
	echo "<br>";
	echo $class->prefixName("Aye Aye");
	echo "<br>";
	echo $class->prefixName("Hla Hla");

?>
