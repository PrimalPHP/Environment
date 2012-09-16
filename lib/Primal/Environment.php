<?php

namespace Primal;

/**
 * Very simple class for managing environmental variables.
 *
 * @package default
 */

class Environment {
	protected $_data = array(
		'name'  => 'development',
	);

	/**
	 * Constructor, declared private to prevent external initialization
	 *
	 * @package default
	 */
	private function __construct() {}

	/**
	 * Singleton static variable
	 *
	 * @author Jarvis Badgley
	 */
    protected static $singleton;


	/**
	 * Static Singleton retrieval function
	 *
	 * @return Request
	 */
	static function Singleton() {
		return (!static::$singleton) ? static::$singleton = new static() : static::$singleton;
	}
	

	/**
	 * Getter & Setter Implementation
	 * Any value can be stored or retrieved by calling a function with the name, prefixed by get or set.
	 * Example:  $env->setConvertPath('/path/to/convert') or $env->getConvertPath()
	 * Set functions return $this to allow chaining
	 *
	 * @param string $name 
	 * @param array $args 
	 * @return void|$this
	 */
	public function __call($name, $args) {
		switch (substr($name, 0, 3)) {
			
		case 'get':
			$index = strtolower(substr($name, 3));
			return isset($this->_data[$index]) ? $this->_data[$index] : null;
			
		case 'set':
			$index = strtolower(substr($name, 4));
			$this->_data[$index] = $args[0];
			return $this;

		default:
			throw new \BadMethodCallException("Unknown function, Environment->$name.");
			
		}
	}


	
	public function __get($index) {
		$index = strtolower($index);
		return isset($this->_data[$index]) ? $this->_data[$index] : null;
	}
	
	public function __set($index, $value) {
		$this->_data[strtolower($index)] = $value;
	}
	
	public function __isset($index) {
		return isset($this->_data[strtolower($index)]);
	}
	
	
}
