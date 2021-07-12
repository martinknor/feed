<?php

declare(strict_types=1);

namespace Mk\Feed\Generators\Zbozi;


use Nette\Caching\Cache;
use Nette\Caching\IStorage;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\DelegatingLoader;
use Symfony\Component\Config\Loader\LoaderResolver;

final class CategoriesHelper
{
	public const CATEGORY_URL = 'http://napoveda.seznam.cz/soubory/Zbozi.cz/category_ID.xls';

	private ?Cache $cache = null;


	public function __construct(?IStorage $storage = null)
	{
		if ($storage !== null) {
			$this->cache = new Cache($storage, 'feed/zbozi-categories-helper');
		}
	}


	public function getCategories()
	{
		$categories = [];
		if (!$this->cache || !($categories = $this->cache->load('categories'))) {
			$file = sys_get_temp_dir() . '/file.xls';
			file_put_contents($file, file_get_contents(self::CATEGORY_URL));

			$loaders = [
				new Excel5FileLoader(new FileLocator()),
			];

			$resolver = new LoaderResolver($loaders);
			$loader = new DelegatingLoader($resolver);

			$data = $loader->load($file);
			#clear header
			unset($data[0]);

			foreach ($data as $row) {
				$categories[(int) $row[0]] = trim($row[2]);
			}
			asort($categories);
			unlink($file);

			if ($this->cache) {
				$this->cache->save('categories', $categories);
			}
		}

		return $categories;
	}
}
