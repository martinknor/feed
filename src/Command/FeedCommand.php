<?php
declare(strict_types=1);

namespace Mk\Feed\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Nette\DI\Container;

#[AsCommand(name: 'Feed:export', description: 'Export product feed')]
class FeedCommand extends Command
{
	private Container $container;

	private array $config;

	public function __construct(array $config = [], Container $container)
	{
		parent::__construct();

		$this->container = $container;
		$this->config = $config;
	}

	protected function configure(): void
	{
		$this->addOption('show', 's', InputOption::VALUE_NONE, 'Print available exports')
			->addOption('feed', 'f', InputOption::VALUE_IS_ARRAY | InputOption::VALUE_OPTIONAL);
	}

	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$show = $input->getOption('show');
		$feeds = $input->getOption('feed');

		if ($show) {
			$output->writeln('Available exports:');

			foreach ($this->config['exports'] as $k => $v) {
				if ($v) {
					$output->writeln('- ' . $k);
				}
			}
		}

		$feeds = $feeds ?: array_keys($this->config['exports']);
		if (count($feeds)) {
			foreach ($feeds as $feed) {
				if (!isset($this->config['exports'][$feed]) || !$this->config['exports'][$feed]) {
					$output->writeln('Generator for ' . $feed . ' doesn\'t exist');
				}

				$generator = $this->container->getService('feed.' . $feed);

				$generator->save($feed . '.xml');
				$output->writeln('Feed ' . $feed . ' done');
			}
		}

		return Command::SUCCESS;
	}
}