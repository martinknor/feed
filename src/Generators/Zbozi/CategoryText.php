<?php

declare(strict_types=1);

namespace Mk\Feed\Generators\Zbozi;


class CategoryText
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
