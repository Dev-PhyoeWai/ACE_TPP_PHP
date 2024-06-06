<?php
	class UserValidator
	{
		private $data;
		private $files;
		private $errors = [];
		private static $fields = ['username', 'email', 'password'];
		
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
			$this->validateEmail();
//			$this->validatePassword();
			return $this->errors;
		}
		private function validateUsername()
		{
			$val = trim($this->data['username']);
			if (empty($val)) {
				$this->addError('username', '* Name cannot be empty');
			} elseif (!preg_match("/^[a-zA-Z-' ]*$/", $val)) {
				$this->addError('username', '* Name must be a valid name');
			}
		}
		private function validateEmail()
		{
			$val = trim($this->data['email']);
			if (empty($val)) {
				$this->addError('email', '* Email cannot be empty');
			} elseif (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
				$this->addError('email', '* Invalid email');
			}
		}
//		private function validatePassword()
//		{
//			$val = trim($this->data['password']);
//			if (empty($val)) {
//				$this->addError('password', '* Password cannot be empty');
//			} elseif (!filter_var($val, FILTER_VALIDATE_INT)) {
//				$this->addError('password', '* Invalid password');
//			}
//		}
		private function addError($key, $val)
		{
			$this->errors[$key] = $val;
		}
	}
?>
