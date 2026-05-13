<?php

declare(strict_types=1);

namespace Mk\Feed\DI;

use Mk\Feed\Command\FeedCommand;
use Mk\Feed\Generators\Google\Generator;
use Mk\Feed\Storage;
use Nette;
use Nette\Schema\Expect;

/**
 * Class FeedExtension
 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\DI
 */
class FeedExtension extends Nette\DI\CompilerExtension
{
	public function getConfigSchema(): Nette\Schema\Schema
	{
		return Expect::structure([
			'exportsDir' => Expect::string('%wwwDir%'),
			'exports' => Expect::array(),
		]);
	}

	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();
		$config = $this->config;

		$builder->addDefinition($this->prefix('storage'))
		        ->setFactory(Storage::class, [$config->exportsDir]);
		$builder->addDefinition($this->prefix('command'))
		        ->setFactory(FeedCommand::class, [(array)$config]);


	}
}
