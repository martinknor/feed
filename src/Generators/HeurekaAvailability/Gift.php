<?php

declare(strict_types=1);

namespace Mk\Feed\Generators\HeurekaAvailability;


class Gift
{
	protected string $name;


	public function __construct(string $name)
	{
		$this->name = $name;
	}


	public function getName(): string
	{
		return $this->name;
	}
}
