<?php

namespace Mk\Feed\Generators\Zbozi;


use Mk;
use Mk\Feed\Generators\BaseItem;

/**
 * Class Item
 *
 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\Generators\Zbozi
 * @see http://napoveda.seznam.cz/cz/zbozi/specifikace-xml-pro-obchody/specifikace-xml-feedu/ Documentation
 */
class Item extends BaseItem
{

	#required
	/** @var string @required */
	protected $productName;

	/** @var string @required */
	protected $description;

	/**  @var string @required */
	protected $url;

	/** @var float @required */
	protected $priceVat;

	/** @var \DateTime|int @required */
	protected $deliveryDate;

	/** @var Delivery|null */
	protected $delivery;


	/** @var Delivery[] */
	protected $deliveries;

	#recomanded

	/** @var string|null */
	protected $itemId;

	/** @var Image[] */
	protected $images;

	/** @var string|null */
	protected $ean;

	/** @var string|null */
	protected $isbn;

	/** @var string|null */
	protected $productNo;

	/** @var string|null */
	protected $itemGroupId;

	/** @var string|null */
	protected $manufacturer;

	#optional

	/** @var string|null */
	protected $brand;

	/** @var int|null */
	protected $categoryId;

	/** @var CategoryText[] */
	protected $categoryTexts = [];

	/** @var string|null */
	protected $product;

	/** @var string|null */
	protected $itemType = 'new';

	/** @var ExtraMessage[] */
	protected $extraMessages;

	/** @var ShopDepot[] */
	protected $shopDepots;

	/** @var bool */
	protected $visibility = true;

	/** @var string|null */
	protected $customLabel;

	/** @var string|null */
	protected $customLabel1;

	/** @var string|null */
	protected $maxCpc;

	/** @var float|null */
	protected $maxCpcSearch;

	/** @var Parameter[] */
	protected $parameters = [];

	#product database

	/** @var string|null */
	protected $productLine;

	/** @var float|null */
	protected $listPrice;

	/** @var \DateTime|null */
	protected $releaseDate;


	/**
	 * @param $url
	 * @return $this
	 */
	public function addImage($url)
	{
		$this->images[] = new Image($url);

		return $this;
	}


	/**
	 * @param $text
	 * @return $this
	 */
	public function addCategoryText($text)
	{
		$this->categoryTexts[] = new CategoryText($text);

		return $this;
	}


	/**
	 * @param $name
	 * @param $val
	 * @param null $unit
	 * @return Item
	 */
	public function addParameter($name, $val, $unit = null)
	{
		$this->parameters[] = new Parameter($name, $val, $unit);

		return $this;
	}


	public function addExtraMessage($type)
	{
		$this->extraMessages[] = new ExtraMessage($type);

		return $this;
	}


	public function addShopDepot($id)
	{
		$this->shopDepots[] = new ShopDepot($id);

		return $this;
	}


	/**
	 * @return ShopDepot[]
	 */
	public function getShopDepots()
	{
		return $this->shopDepots;
	}


	/**
	 * @return string
	 */
	public function getProductName()
	{
		return $this->productName;
	}


	/**
	 * @param string $productName
	 * @return Item
	 */
	public function setProductName($productName)
	{
		$this->productName = (string) $productName;

		return $this;
	}


	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}


	/**
	 * @param string $description
	 * @return Item
	 */
	public function setDescription($description)
	{
		$this->description = (string) $description;

		return $this;
	}


	/**
	 * @return string
	 */
	public function getUrl()
	{
		return $this->url;
	}


	/**
	 * @param string $url
	 * @return Item
	 */
	public function setUrl($url)
	{
		$this->url = (string) $url;

		return $this;
	}


	/**
	 * @return float
	 */
	public function getPriceVat()
	{
		return $this->priceVat;
	}


	/**
	 * @param float $priceVat
	 * @return Item
	 */
	public function setPriceVat($priceVat)
	{
		$this->priceVat = (float) $priceVat;

		return $this;
	}


	/**
	 * @return int|string
	 */
	public function getDeliveryDate()
	{
		return $this->deliveryDate instanceof \DateTime ? $this->deliveryDate->format('Y-m-d') : $this->deliveryDate;
	}


	/**
	 * @param int|\DateTime $deliveryDate
	 * @return Item
	 */
	public function setDeliveryDate($deliveryDate)
	{
		if (!is_int($deliveryDate) && !($deliveryDate instanceof \DateTime)) {
			throw new \InvalidArgumentException("Delivery date must be integer or DateTime");
		}
		$this->deliveryDate = $deliveryDate;

		return $this;
	}


	/**
	 * @return null|string
	 */
	public function getItemId()
	{
		return $this->itemId;
	}


	/**
	 * @param null|string $itemId
	 * @return Item
	 */
	public function setItemId($itemId)
	{
		$this->itemId = $itemId;

		return $this;
	}


	/**
	 * @return null|string
	 */
	public function getEan()
	{
		return $this->ean;
	}


	/**
	 * @param null|string $ean
	 * @return Item
	 */
	public function setEan($ean)
	{
		$this->ean = $ean;

		return $this;
	}


	/**
	 * @return null|string
	 */
	public function getIsbn()
	{
		return $this->isbn;
	}


	/**
	 * @param null|string $isbn
	 * @return Item
	 */
	public function setIsbn($isbn)
	{
		$this->isbn = $isbn;

		return $this;
	}


	/**
	 * @return null|string
	 */
	public function getProductNo()
	{
		return $this->productNo;
	}


	/**
	 * @param null|string $productNo
	 * @return Item
	 */
	public function setProductNo($productNo)
	{
		$this->productNo = $productNo;

		return $this;
	}


	/**
	 * @return null|string
	 */
	public function getItemGroupId()
	{
		return $this->itemGroupId;
	}


	/**
	 * @param null|string $itemGroupId
	 * @return Item
	 */
	public function setItemGroupId($itemGroupId)
	{
		$this->itemGroupId = $itemGroupId;

		return $this;
	}


	/**
	 * @return null|string
	 */
	public function getManufacturer()
	{
		return $this->manufacturer;
	}


	/**
	 * @param null|string $manufacturer
	 * @return Item
	 */
	public function setManufacturer($manufacturer)
	{
		$this->manufacturer = $manufacturer;

		return $this;
	}


	/**
	 * @return null|string
	 */
	public function getBrand()
	{
		return $this->brand;
	}


	/**
	 * @param null|string $brand
	 * @return Item
	 */
	public function setBrand($brand)
	{
		$this->brand = $brand;

		return $this;
	}


	/**
	 * @return int|null
	 */
	public function getCategoryId()
	{
		return $this->categoryId;
	}


	/**
	 * @param int|null $categoryId
	 * @return Item
	 */
	public function setCategoryId($categoryId)
	{
		$this->categoryId = $categoryId;

		return $this;
	}


	/**
	 * @return null|string
	 */
	public function getCategoryTexts()
	{
		return $this->categoryTexts;
	}


	/**
	 * @return null|string
	 */
	public function getProduct()
	{
		return $this->product;
	}


	/**
	 * @param null|string $product
	 * @return Item
	 */
	public function setProduct($product)
	{
		$this->product = $product;

		return $this;
	}


	/**
	 * @return null|string
	 */
	public function getItemType()
	{
		return $this->itemType;
	}


	/**
	 * @return boolean
	 */
	public function isVisibility()
	{
		return $this->visibility;
	}


	/**
	 * @param boolean $visibility
	 * @return Item
	 */
	public function setVisibility($visibility)
	{
		$this->visibility = $visibility;

		return $this;
	}


	/**
	 * @return null|string
	 */
	public function getCustomLabel()
	{
		return $this->customLabel;
	}


	/**
	 * @param null|string $customLabel
	 * @return Item
	 */
	public function setCustomLabel($customLabel)
	{
		$this->customLabel = $customLabel;

		return $this;
	}


	/**
	 * @return null|string
	 */
	public function getCustomLabel1()
	{
		return $this->customLabel1;
	}


	/**
	 * @param null|string $customLabel1
	 * @return Item
	 */
	public function setCustomLabel1($customLabel1)
	{
		$this->customLabel1 = $customLabel1;

		return $this;
	}


	/**
	 * @return null|string
	 */
	public function getMaxCpc()
	{
		return $this->maxCpc;
	}


	/**
	 * @param null|string $maxCpc
	 * @return Item
	 */
	public function setMaxCpc($maxCpc)
	{
		$this->maxCpc = $maxCpc;

		return $this;
	}


	/**
	 * @return float|null
	 */
	public function getMaxCpcSearch()
	{
		return $this->maxCpcSearch;
	}


	/**
	 * @param float|null $maxCpcSearch
	 * @return Item
	 */
	public function setMaxCpcSearch($maxCpcSearch)
	{
		$this->maxCpcSearch = $maxCpcSearch;

		return $this;
	}


	/**
	 * @return mixed
	 */
	public function getProductLine()
	{
		return $this->productLine;
	}


	/**
	 * @param mixed $productLine
	 * @return Item
	 */
	public function setProductLine($productLine)
	{
		$this->productLine = $productLine;

		return $this;
	}


	/**
	 * @return mixed
	 */
	public function getListPrice()
	{
		return $this->listPrice;
	}


	/**
	 * @param mixed $listPrice
	 * @return Item
	 */
	public function setListPrice($listPrice)
	{
		$this->listPrice = $listPrice;

		return $this;
	}


	/**
	 * @return mixed
	 */
	public function getReleaseDate()
	{
		return $this->releaseDate;
	}


	/**
	 * @param mixed $releaseDate
	 * @return Item
	 */
	public function setReleaseDate(\DateTime $releaseDate)
	{
		$this->releaseDate = $releaseDate;

		return $this;
	}


	/**
	 * @return Image[]
	 */
	public function getImages()
	{
		return $this->images;
	}


	/**
	 * @return ExtraMessage[]
	 */
	public function getExtraMessages()
	{
		return $this->extraMessages;
	}


	/**
	 * @return Parameter[]
	 */
	public function getParameters()
	{
		return $this->parameters;
	}


	/**
	 * @return Delivery|null
	 */
	public function getDelivery()
	{
		return $this->delivery;
	}


	/**
	 * @param Delivery|null $delivery
	 * @return Item
	 */
	public function setDelivery($delivery)
	{
		$this->delivery = $delivery;

		return $this;
	}


	/**
	 * @param Delivery $delivery
	 * @return $this
	 */
	public function addDelivery(Delivery $delivery)
	{
		$this->deliveries[] = $delivery;

		return $this;
	}


	/**
	 * @return Delivery[]
	 */
	public function getDeliveries()
	{
		return $this->deliveries;
	}


}
