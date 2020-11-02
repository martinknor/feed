<?php

declare(strict_types=1);

namespace Mk\Feed\Generators\Google;


use Mk\Feed\Generators\BaseGenerator;

/** @see https://support.google.com/merchants/answer/188494 */
abstract class Generator extends BaseGenerator
{
	protected function getTemplate(string $name): string
	{
		$reflection = new \ReflectionClass(__CLASS__);

		return dirname($reflection->getFileName()) . '/latte/' . $name . '.latte';
	}
}
