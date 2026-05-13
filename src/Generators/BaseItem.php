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

    use Nette\SmartObject;

	/**
	 * Validate item
	 * @return bool return true if item is valid
     */
	public function validate() {
		$reflection = new \ReflectionClass($this);

		foreach ($reflection->getProperties(\ReflectionProperty::IS_PUBLIC) as $v) {
			$docComment = $v->getDocComment();

			if ($docComment && strpos($docComment, '@required') !== FALSE) {
				if (!isset($this->{$v->getName()})) {
					return FALSE;
				}
			}
		}

		return TRUE;
	}
}
