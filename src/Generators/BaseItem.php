<?php

namespace Mk\Feed\Generators;


use Mk, Nette;

/**
 * Class BaseItem
 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\Generators\Zbozi
 */
abstract class BaseItem implements Mk\Feed\Generators\IItem
{

	/* Použití smartobject viz php 7.2 to nette 2.4 */
	use \Nette\SmartObject;
	/**
	 * Validate item
	 * @return bool return true if item is valid
     */
	public function validate() {

		$reflection = new Nette\Reflection\ClassType(get_called_class());

		foreach ($reflection->getProperties(\ReflectionProperty::IS_PUBLIC) as $v) {
			if ($v->getAnnotation('required')) {
				if (!isset($this->{$v->getName()})) {
					return FALSE;
				}
			}
		}

		return TRUE;
	}

}
