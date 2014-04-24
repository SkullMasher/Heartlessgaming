<?php
/**
* Input validation.
*/
class Validate {

	private $_passed	= false;
	private $_errors	= array();
	private $_db		= null;

	public function __construct() {
		$this->_db = db::getInstance();
	}
		// Check if the form supplied match our need
	public function check($source, $items = array()) {
		foreach ($items as $item => $rules) {
			foreach ($rules as $rule => $rule_value) {

				$value = trim($source[$item]);
				$item = escape($item);

				if ($rule === 'required' && empty($value)) {
					$this->addError("Le champ {$item} n'est pas rempli.");
				} elseif(!empty($value)) {
					switch ($rule) {
						case 'min':
							if (strlen($value) <= $rule_value) {
								$this->addError(" Le {$item} doit faire plus de {$rule_value} caractères.");
							}
							break;
						case 'max':
							if (strlen($value) >= $rule_value) {
								$this->addError("Le {$item} doit faire moins de {$rule_value} caractères.");
							}
							break;
						case 'matches':
							if ($value != $source[$rule_value]) {
								$this->addError("Les {$rule_value}s ne correspondent pas.");
							}
							break;
						case 'unique':
							$check = $this->_db->get($rule_value,array($item, '=', $value));
							if ($check->count()) {
								$this->addError("{$item} existe déjà, choisissez en un autre.");
							}
							break;
					}
				}
			}
		}

		if (empty($this->_errors)) {
			$this->_passed = true;
		}

		return $this;
	}

	private function addError($error) {
		$this->_errors[] = $error;
	}
	public function errorExists() {
		return (!empty($this->_error)) ? true : false;
	}
	public function errors() {
		return $this->_errors;
	}
	public function passed() {
		return $this->_passed;
	}
}