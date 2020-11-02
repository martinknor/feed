<?php

declare(strict_types=1);

namespace Mk\Feed\Generators;


interface IItem
{
	public function validate(): bool;
}
