<?php
/**
 * xbsoft base class
 *
 * @category php
 * @package xb.base
 * @author enze.wei <[enzewei@gmail.com]>
 * @copyright 2017 xbsoft
 * @license http://xbsoft.net/licenses/mit.php MIT License
 * @version 1.0.3-stable
 * @link http://docs.xbsoft.net/base
 */
namespace xb;

class Base {
	
	/*
	 * object locate
	 */
	public static $service = [];
	
	/**
	 * create object
	 * [php >= 5.6]
	 *
	 * @param mix $class [string|callable]
	 * @param boolean $singleton
	 * @param mix $args
	 *
	 * @return object
	 */
	public static function createObject($class, $singleton = true, ...$args) {
		
		/*
		 * singleton
		 */
		if (true === $singleton) {
			if (true === isset(static::$service[$class])) {
				return static::$service[$class];
			}
		}
		
		/*
		 * namespace or callable
		 */
		if (true === is_string($class)) {
			static::$service[$class] = new $class(...$args);
		} else if (true === is_callable($class)) {
			static::$service[$class] = call_user_func($class, $args);
		}

		return static::$service[$class];
	}
}