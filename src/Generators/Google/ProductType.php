<?php

declare(strict_types=1);

namespace Mk\Feed\Generators\Google;


class ProductType
{
	protected string $text;


	public function __construct(string $text)
	{
		$this->text = $text;
	}


	public function getText(): string
	{
		return $this->text;
	}
}

