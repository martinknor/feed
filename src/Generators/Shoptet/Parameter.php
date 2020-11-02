<?php

declare(strict_types=1);

namespace Mk\Feed\Generators\Shoptet;


class Parameter
{
	protected string $name;

	protected $value;

	protected ?string $unit;

	protected ?float $percentage;


	public function __construct($name, $value, ?string $unit = null, ?float $percentage = null)
	{
		$this->name = $name;
		$this->value = $value;
		$this->unit = $unit;
		$this->percentage = $percentage;
	}


	public function getName(): string
	{
		return $this->name;
	}


	public function getValue()
	{
		return $this->value;
	}


	public function getUnit(): ?string
	{
		return $this->unit;
	}


	public function getPercentage(): ?float
	{
		return $this->percentage;
	}
}
