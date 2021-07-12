<?php

declare(strict_types=1);

namespace Mk\Feed\DI;


use Mk\Feed\Command\FeedCommand;
use Mk\Feed\Storage;
use Nette\DI\CompilerExtension;
use Symfony\Component\Console\Command\Command;

final class FeedExtension extends CompilerExtension
{
	/** @var string[]|mixed[] */
	private array $defaults = [
		'exportsDir' => '%wwwDir%',
		'exports' => [],
	];


	public function loadConfiguration(): void
	{
		$builder = $this->getContainerBuilder();
		$config = $this->getConfig($this->defaults);

		$builder->addDefinition($this->prefix('storage'))
			->setFactory(Storage::class, [$config['exportsDir']]);

		foreach ($config['exports'] as $export => $class) {
			$builder->addDefinition($this->prefix($export))
				->setFactory($class);
		}
		if (class_exists(Command::class)) {
			$builder->addDefinition($this->prefix('command'))
				->setFactory(FeedCommand::class, [$config])
				->addTag('kdyby.console.command');
		}
	}
}
