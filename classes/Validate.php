<?php 

class Validate{
	private $_passed = false,
			$_errors = array(),
			$_db = null;

	public function __construct(){
		$this->_db = DB::getInstance();
	}

	public function check($source , $items = array()){
		foreach ($items as $item => $rules) {
			foreach ($rules as $rule => $rule_value) {
				//echo "{$item} {$rule} must be {$rule_value}<br>";
				//$item = username
				//$rule = min , max , unique
				//$rule_value = true, 2 , 20
				$value = $source[$item];
				echo $value;
			}
		}
	}
}