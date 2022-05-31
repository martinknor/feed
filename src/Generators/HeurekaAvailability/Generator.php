<?php

declare(strict_types=1);

namespace Mk\Feed\Generators\HeurekaAvailability;


use Mk\Feed\Generators\BaseGenerator;

/** @see http://sluzby.heureka.cz/napoveda/xml-feed/ */
abstract class Generator extends BaseGenerator
{
	protected function getTemplate(string $name): string
	{
		$reflection = new \ReflectionClass(__CLASS__);

		return dirname($reflection->getFileName()) . '/latte/' . $name . '.latte';
	}
}
