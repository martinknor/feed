<?php

declare(strict_types=1);

namespace Mk\Feed\Generators;


abstract class BaseItem implements IItem
{
	public function validate(): bool
	{
		$reflection = new \ReflectionClass($this);

		foreach ($reflection->getProperties(\ReflectionProperty::IS_PUBLIC) as $v) {
			if ($v->getAnnotation('required') && !isset($this->{$v->getName()})) {
				return false;
			}
		}

		return true;
	}
}
