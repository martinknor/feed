<?php

declare(strict_types=1);

namespace Mk\Feed\Generators;


interface IGenerator
{

	/**
	 * @return mixed
	 */
	public function generate();

	/**
	 * @return mixed
	 */
	public function save(string $filename);
}
