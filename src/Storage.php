<?php

declare(strict_types=1);

namespace Mk\Feed;


use Nette\Utils\FileSystem;

final class Storage implements IStorage
{
	private string $dir;


	public function __construct(string $dir)
	{
		$this->dir = $dir;
	}


	public function save(string $filename, string $content): void
	{
		FileSystem::createDir($this->dir);
		file_put_contents(realpath($this->dir) . DIRECTORY_SEPARATOR . $filename, $this->formatXml($content));
	}


	protected function formatXml(string $xml): string
	{
		$dom = new \DOMDocument('1.0');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($xml);

		return $dom->saveXML();
	}
}
