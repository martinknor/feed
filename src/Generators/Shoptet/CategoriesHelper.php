<?php

declare(strict_types=1);

namespace Mk\Feed\Generators\Shoptet;


use Nette\Caching\Cache;
use Nette\Caching\IStorage;

final class CategoriesHelper
{
	public const CATEGORY_URL = 'http://www.heureka.cz/direct/xml-export/shops/heureka-sekce.xml';

	public const CATEGORY_SK_URL = 'http://www.heureka.sk/direct/xml-export/shops/heureka-sekce.xml';

	private Cache $cache;

	private bool $sk;


	public function __construct(IStorage $storage = null)
	{
		if ($storage) {
			$this->cache = new Cache($storage, __CLASS__);
		}
		$this->sk = false;
	}


	public function setSk(bool $sk): CategoriesHelper
	{
		$this->sk = $sk;

		return $this;
	}


	public function getCategories(): array
	{
		$categories = [];
		if (!$this->cache || !($categories = $this->cache->load('categories'))) {
			$dom = new \DOMDocument();
			$dom->loadXML(file_get_contents($this->sk ? self::CATEGORY_SK_URL : self::CATEGORY_URL));
			$xpath = new \DOMXPath($dom);
			/** @var \DOMElement[] $_categories */
			$_categories = $xpath->query(".//CATEGORY");

			foreach ($_categories as $category) {
				$categoryIdElement = $xpath->query($category->getNodePath() . '/CATEGORY_ID');
				$id = isset($categoryIdElement[0]) ? (int) $categoryIdElement[0]->nodeValue : null;

				$categoryFullNameElement = $xpath->query($category->getNodePath() . '/CATEGORY_FULLNAME');
				$_cat = isset($categoryFullNameElement[0]) ? (string) $categoryFullNameElement[0]->nodeValue : null;

				if ($id && $_cat) {
					$_cat = str_replace('Heureka.cz | ', '', $_cat);
					$categories[$id] = $_cat;
				}
			}
			asort($categories);
			if ($this->cache) {
				$this->cache->save('categories', $categories);
			}
		}

		return $categories;
	}
}
