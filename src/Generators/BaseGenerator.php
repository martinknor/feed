<?php

declare(strict_types=1);

namespace Mk\Feed\Generators;


use Latte\Engine;
use Mk\Feed\FileEmptyException;
use Mk\Feed\ItemIncompletedException;
use Mk\Feed\Storage;

abstract class BaseGenerator implements IGenerator
{
	private bool $prepared = false; // if some products added

	/** @var resource|bool|null temp file */
	private $handle;

	private Storage $storage;


	public function __construct(Storage $storage)
	{
		$this->storage = $storage;
	}


	public function addItem(IItem $item)
	{
		if (!$this->prepared) {
			$this->prepare();
		}
		if (!$item->validate()) {
			throw new ItemIncompletedException('Item is not complete');
		}

		$latte = new Engine;
		$xmlItem = $latte->renderToString($this->getTemplate('item'), ['item' => $item]);
		fwrite($this->handle, $xmlItem);
	}


	/** Generate file by addItem from db for example. */
	abstract public function generate(): void;


	public function save(string $filename): void
	{
		$this->generate();
		if (!$this->prepared) {
			throw new FileEmptyException('File has not any items');
		}

		$this->prepareTemplate('footer');

		$size = ftell($this->handle);
		rewind($this->handle);
		$this->storage->save($filename, fread($this->handle, $size));

		fclose($this->handle);

		$this->prepared = false;
	}


	abstract protected function getTemplate(string $name): string;


	protected function prepare(): void
	{
		$this->handle = tmpfile();
		$this->prepareTemplate('header');
		$this->prepared = true;
	}


	protected function prepareTemplate(string $template): void
	{
		$file = $this->getTemplate($template);
		$footerHandle = fopen('safe://' . $file, 'rb');
		$footer = fread($footerHandle, filesize($file));
		fclose($footerHandle);
		fwrite($this->handle, $footer);
	}
}
