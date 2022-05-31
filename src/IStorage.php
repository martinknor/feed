<?php

declare(strict_types=1);

namespace Mk\Feed;


interface IStorage
{
	public function __construct(string $dir);

	public function save(string $fileName, string $content): void;
}
