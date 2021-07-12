<?php

declare(strict_types=1);

namespace Mk\Feed\Generators\Custom;


class Parameter
{
	protected string $name;

	protected $value;

	protected $unit;


	public function __construct($name, $value, $unit = null)
	{
		$this->name = $name;
		$this->value = $value;
		$this->unit = $unit;
	}


	public function getName()
	{
		return $this->name;
	}


	public function getValue()
	{
		return $this->value;
	}


	public function getUnit()
	{
		return $this->unit;
	}
}
