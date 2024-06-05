<?php
class UserValidator
{
	private $data;
	private $files;
	private $errors = [];
	private static $fields = ['name', 'price', 'weight', 'image'];
	
	public function __construct($post_data, $file_data)
	{
		$this->data = $post_data;
		$this->files = $file_data;
	}
	
	public function validateForm()
	{
		foreach (self::$fields as $field) {
			if (!array_key_exists($field, $this->data) && !array_key_exists($field, $this->files)) {
				trigger_error("* $field is not present in data");
				return;
			}
		}
		$this->validateUsername();
		$this->validatePrice();
		$this->validateWeight();
		$this->validateImage();
		return $this->errors;
	}
	
	private function validateUsername()
	{
		$val = trim($this->data['name']);
		if (empty($val)) {
			$this->addError('name', '* Name cannot be empty');
		} elseif (!preg_match("/^[a-zA-Z-' ]*$/", $val)) {
			$this->addError('name', '* Name must be a valid name');
		}
	}
	
	private function validatePrice()
	{
		$val = trim($this->data['price']);
		if (empty($val)) {
			$this->addError('price', '* Price cannot be empty');
		} elseif (!filter_var($val, FILTER_VALIDATE_INT)) {
			$this->addError('price', '* Invalid price');
		}
	}
	
	private function validateWeight()
	{
		$val = trim($this->data['weight']);
		if (empty($val)) {
			$this->addError('weight', '* Weight cannot be empty');
		} elseif (!filter_var($val, FILTER_VALIDATE_INT)) {
			$this->addError('weight', '* Invalid weight');
		}
	}
	
	private function validateImage()
	{
		if ($this->files['image']['error'] != 0) {
			$this->addError('image', '* Error uploading image');
		}
	}
	
	private function addError($key, $val)
	{
		$this->errors[$key] = $val;
	}
}
?>
