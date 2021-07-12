<?php

declare(strict_types=1);

namespace Mk\Feed\Generators\Custom;


use Mk\Feed\Generators\BaseGenerator;

abstract class Generator extends BaseGenerator
{
	protected function getTemplate(string $name): string
	{
		$reflection = new \ReflectionClass(__CLASS__);

		return dirname($reflection->getFileName()) . '/latte/' . $name . '.latte';
	}
}
