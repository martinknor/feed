<?php

declare(strict_types=1);

namespace Mk\Feed\Generators\Zbozi;


use Mk\Feed\Generators\BaseGenerator;

/** @see http://napoveda.seznam.cz/cz/zbozi/specifikace-xml-pro-obchody/specifikace-xml-feedu/ */
abstract class Generator extends BaseGenerator
{
	protected function getTemplate(string $name): string
	{
		$reflection = new \ReflectionClass(__CLASS__);

		return dirname($reflection->getFileName()) . '/latte/' . $name . '.latte';
	}
}
