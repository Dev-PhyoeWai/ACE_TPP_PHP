<?php
//	class Fruit
//	{
//		// Properties
//		public $name;
//		public $color;
//
//		// Methods
//		function setName($name){
//			$this->name = $name;
//		}
//		function getName(){
//			return $this->name;
//		}
//		function setColor($color){
//			$this->color = $color;
//		}
//		function getColor(){
//			return $this->color;
//		}
//	}

//	$apple = new Fruit();
//	$apple->setName('Apple');
//	$apple->setColor('Red');
//	echo "Name: " . $apple->getName();
//	echo "<br>";
//	echo "Color: " . $apple->getColor();
//
//	echo "<hr>";
	
//	$mango = new Fruit();
//	$mango->setName('Mango');
//	$mango->setColor('Green');
//	echo "Name: " . $mango->getName();
//	echo "<br>";
//	echo "Color: " . $mango->getColor();
//
//	echo "<hr>";
//
//	$banana = new Fruit();
//	$banana->name = 'Banana';
//	$banana->color = 'Yellow';
//	echo "Name: " . $banana->name;
//	echo "<br>";
//	echo "Color: " . $banana->color;
	
//	class Car
//	{
//	}
//
//	var_dump($apple instanceof Fruit); # true
//	echo "<br>";
//	var_dump($apple instanceof Car); # false

	## -----------------------  ------------------------- ##

//	class Fruit{
//		public $name;
//		public $color;
//
//		function __construct($name, $color){
//			$this->name = $name;
//			$this->color = $color;
//		}
//		function getName(){
//			return $this->name;
//		}
//		function getColor(){
//			return $this->color;
//		}
//	}

	## -----------------------  ------------------------- ##

//class Fruit{
//	public $name;
//	public $color;
//
//	function __construct($name, $color){
//		$this->name = $name;
//		$this->color = $color;
//	}
//	function __destruct(){
//		echo "The fruit is {$this->name} and the color is {$this->color}";
//	}
//}

//	$apple = new Fruit("Apple", "Red");

	//	echo "Name: " . $apple->getName();
	//	echo "<br>";
	//	echo "Color: " . $apple->color;

	## ----------------------- Class with access modifier ------------------------- ##
//	class Fruit{
//		public $name;
//		protected $color;
//		private $weight;
//
//		function setName($n){	 #	public function (default)
//			$this->name = $n;
//		}
//		protected function setColor($n) 	#	private function
//		{
//			$this->color = $n;
//		}
//		private function setweight($n)	#	private function
//		{
//			$this->weight = $n;
//		}
//	}
//	$mango = new Fruit();
//	$mango->name = "Mango"; # OK
////	$mango->color = "Yellow"; # Error
////	$mango->weight = 300; # Error
//
//	echo $mango->name;

	## ----------------- Fruit Class With inherited --------------------- ##
	class Fruit{
		public $name;
		public $color;
		public function __construct($name,$color){
			$this->name = $name;
			$this->color = $color;
		}
		public function intro()
		{
			echo "The fruit is {$this->name} and the color is {$this->color}<br>";
		}
	}
	class Strawberry extends Fruit {
		public function message()
		{
			echo "Am I a fruit or a berry ?";
		}
	}
	$strawberry = new Strawberry("Strawberry","blue");
	$strawberry->message();
	$strawberry->intro(); # ERROR (if intro() function is protected)


//class Fruit{
//	public $name;
//	public $color;
//	public function __construct($name,$color){
//		$this->name = $name;
//		$this->color = $color;
//	}
//	protected function intro()
//	{
//		echo "The fruit is {$this->name} and the color is {$this->color}
//		 and weight is {$this->weight} gram. ";
//	}
//}
//	class Strawberry extends Fruit {
//	public $weight;
//	public function __construct($name,$color,$weight){
//		$this->name = $name;
//		$this->color = $color;
//		$this->weight = $weight;
//	}
//		public function message()
//		{
//			echo "Am I a fruit or a berry ? <br>";
//			$this->intro();
//		}
//	}
//	$strawberry = new Strawberry("Strawberry","blue", 50);
//	$strawberry->message();

	## ------------------------ const ---------------------------- ##
	# 1
//	class Fruit{
//		const MESSAGE = "Thanks for buying fruits!<br>";
//	}
//	echo Fruit::MESSAGE;
//	class Order{
//		const PAID = 6;
//		const PANDING = 7;
//	}
//	echo "Paid is : " . Order::PAID . " Panding is : " . Order::PANDING;
	# 2
//	class Cars{
//		const MESSAGE = "I am waiferkolar.";
//	}
//	echo Cars::MESSAGE;
//	class Order{
//		const PRICE = 10;
//		const WEIGHT = 20;
//	}
//	echo "Price is " . Order::PRICE . " Weight is " . Order::WEIGHT;


	## ------------------------ const echo self ---------------------------- ##
//	class Fruit{
//		const MESSAGE = "Thanks for buying fruits!<br>";
//		public function thankYou()
//		{
//			echo self::MESSAGE;
//		}
//	}
//	$goodbye = new Fruit();
//	$goodbye->thankYou();
//	echo $goodbye::MESSAGE;

//	class Cars{
//		const MESSAGE =  "Thanks for bying our cars!<br>";
//		public function thankYou(){
//			echo self::MESSAGE;
//		}
//	}
//	$goods = new Cars();
//	$goods->thankYou();
//	echo $goods::MESSAGE;
	
?>