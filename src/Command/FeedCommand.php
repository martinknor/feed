<?php

declare(strict_types=1);

namespace Mk\Feed\Command;


use Nette\DI\Container;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

final class FeedCommand extends Command
{
	private Container $container;

	/** @var mixed[] */
	private array $config;


	public function __construct(array $config, Container $container)
	{
		parent::__construct();

		$this->container = $container;
		$this->config = $config;
	}


	protected function configure(): void
	{
		$this->setName('Feed:export')
			->setDescription('Export product feed')
			->addOption('show', 's', InputOption::VALUE_NONE, 'Print available exports')
			->addOption('feed', 'f', InputOption::VALUE_IS_ARRAY | InputOption::VALUE_OPTIONAL);
	}


	protected function execute(InputInterface $input, OutputInterface $output)
	{
		if ($input->getOption('show')) {
			$output->writeln('Available exports:');
			foreach ($this->config['exports'] as $k => $v) {
				if ($v) {
					$output->writeln('- ' . $k);
				}
			}
		}
		if (\count($feeds = $input->getOption('feed') ?: array_keys($this->config['exports'])) > 0) {
			foreach ($feeds as $feed) {
				if (!isset($this->config['exports'][$feed]) || !$this->config['exports'][$feed]) {
					$output->writeln('Generator for ' . $feed . ' doesn\'t exist');
				}
				$generator = $this->container->getService('feed.' . $feed);
				$generator->save($feed . '.xml');
				$output->writeln('Feed ' . $feed . ' done');
			}
		}
	}
}
