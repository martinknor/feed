<?php

declare(strict_types=1);

namespace Mk\Feed\Generators\Zbozi;


/** @see http://napoveda.seznam.cz/cz/zbozi/specifikace-xml-pro-obchody/specifikace-xml-feedu/#PARAM */
class Parameter
{
	protected string $name;

	protected string $value;

	protected ?string $unit;


	public function __construct(string $name, string $value, ?string $unit)
	{
		$this->name = $name;
		$this->value = $value;
		$this->unit = $unit;
	}


	public function getName(): string
	{
		return $this->name;
	}


	public function getValue(): string
	{
		return $this->value;
	}


	public function getUnit(): ?string
	{
		return $this->unit;
	}
}
