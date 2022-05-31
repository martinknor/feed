<?php

declare(strict_types=1);

namespace Mk\Feed\Generators\Zbozi;


class ShopDepot
{
	private int $id;


	public function __construct(int $id)
	{
		$this->id = $id;
	}


	public function getId(): int
	{
		return $this->id;
	}
}
