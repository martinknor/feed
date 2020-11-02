<?php

declare(strict_types=1);

namespace Mk\Feed\Generators\Custom;


use Mk\Feed\Generators\BaseItem;
use Nette\Utils\DateTime;

/** @see http://sluzby.heureka.cz/napoveda/xml-feed/ */
class Item extends BaseItem
{
	protected ?string $itemId;

	protected string $productName;

	protected ?string $product;

	protected bool $status;

	protected ?string $name;

	protected ?string $nameExt;

	protected ?string $descriptionShort;

	protected ?string $title;

	protected ?string $metaDescription;

	protected ?string $metaKeywords;

	protected ?string $parts;

	protected ?float $priceOriginal;

	protected ?int $soldQty;

	protected ?string $defaultCategory;

	protected ?float $weight;

	protected ?float $cost;

	protected ?float $margin;

	protected ?bool $freeDelivery;

	protected ?string $model;

	protected bool $inSale;

	protected bool $archived;

	protected ?int $minQuantity;

	protected ?int $maxQuantity;

	protected ?string $guarantee;

	protected ?string $unit;

	protected ?string $vat;

	protected ?int $stock;

	protected ?string $sku;

	/** @var string[] */
	protected ?array $suppliers = null;

	protected ?string  $availability;

	protected string $description;

	protected string $url;

	/** @var Image[] */
	protected array $images = [];

	protected ?string $videoUrl;

	protected float $priceVat;

	protected float $priceNoVat;

	protected ?string $itemType;

	/** @var Parameter[] */
	protected array $parameters = [];

	protected ?string $manufacturer;

	protected ?string $categoryText;

	protected ?string $ean;

	protected ?string $isbn;

	protected ?float $heurekaCpc;

	protected ?\DateTime $deliveryDate;

	/** @var Delivery[] */
	protected array $deliveries = [];

	protected ?string $itemGroupId;

	/** @var int[] */
	protected array $accessories = [];

	protected float $dues = 0;

	/** @var Gift[] */
	protected array $gifts = [];


	public function getDues(): float
	{
		return $this->dues;
	}


	public function setDues(float $dues): self
	{
		$this->dues = $dues;

		return $this;
	}


	public function getVideoUrl(): string
	{
		return $this->videoUrl;
	}


	public function setVideoUrl(string $videoUrl): self
	{
		$this->videoUrl = $videoUrl;

		return $this;
	}


	public function addImage(string $url): self
	{
		$this->images[] = new Image($url);

		return $this;
	}


	public function addDelivery(string $id, float $price, ?float $priceCod = null): self
	{
		$this->deliveries[] = new Delivery($id, $price, $priceCod);

		return $this;
	}


	/**
	 * @return Delivery[]
	 */
	public function getDeliveries(): array
	{
		return $this->deliveries;
	}


	public function addParameter(string $name, $val, $unit = null): self
	{
		$this->parameters[] = new Parameter($name, $val, $unit);

		return $this;
	}


	public function addGift(string $name): self
	{
		$this->gifts[] = new Gift($name);

		return $this;
	}


	public function addAccessory(int $itemId): self
	{
		$this->accessories[] = $itemId;

		return $this;
	}


	/**
	 * @return int[]
	 */
	public function getAccessories(): array
	{
		return $this->accessories;
	}


	public function getProductName(): string
	{
		return $this->productName;
	}


	public function setProductName(string $productName): self
	{
		$this->productName = $productName;

		return $this;
	}


	public function getDescription(): string
	{
		return $this->description;
	}


	public function setDescription(string $description): self
	{
		$this->description = $description;

		return $this;
	}


	public function getUrl(): string
	{
		return $this->url;
	}


	public function setUrl(string $url): self
	{
		$this->url = $url;

		return $this;
	}


	public function getPriceVat(): float
	{
		return $this->priceVat;
	}


	public function setPriceVat(float $priceVat): self
	{
		$this->priceVat = $priceVat;

		return $this;
	}


	public function getDeliveryDate(): ?\DateTime
	{
		return $this->deliveryDate;
	}


	/**
	 * @param int|\DateTime|null $deliveryDate
	 * @return self
	 */
	public function setDeliveryDate($deliveryDate): self
	{
		if (!is_int($deliveryDate) && !($deliveryDate instanceof \DateTime)) {
			throw new \InvalidArgumentException('Delivery date must be integer or DateTime, but type "' . \gettype($deliveryDate) . '" given.');
		}
		$this->deliveryDate = DateTime::from($deliveryDate);

		return $this;
	}


	public function getItemId(): ?string
	{
		return $this->itemId;
	}


	public function setItemId(?string $itemId): self
	{
		$this->itemId = $itemId;

		return $this;
	}


	public function getEan(): ?string
	{
		return $this->ean;
	}


	public function setEan(?string $ean): self
	{
		$this->ean = $ean;

		return $this;
	}


	public function getIsbn(): ?string
	{
		return $this->isbn;
	}


	public function setIsbn(?string $isbn): self
	{
		$this->isbn = $isbn;

		return $this;
	}


	public function getItemGroupId(): ?string
	{
		return $this->itemGroupId;
	}


	public function setItemGroupId(?string $itemGroupId): self
	{
		$this->itemGroupId = $itemGroupId;

		return $this;
	}


	public function getManufacturer(): ?string
	{
		return $this->manufacturer;
	}


	public function setManufacturer(?string $manufacturer): self
	{
		$this->manufacturer = $manufacturer;

		return $this;
	}


	public function getCategoryText(): ?string
	{
		return $this->categoryText;
	}


	public function setCategoryText(?string $categoryText): self
	{
		$this->categoryText = $categoryText;

		return $this;
	}


	public function getProduct(): ?string
	{
		return $this->product;
	}


	public function setProduct(?string $product): self
	{
		$this->product = $product;

		return $this;
	}


	public function getItemType(): ?string
	{
		return $this->itemType;
	}


	/**
	 * @return Image[]
	 */
	public function getImages(): array
	{
		return $this->images;
	}


	/**
	 * @return Gift[]
	 */
	public function getGifts(): array
	{
		return $this->gifts;
	}


	/**
	 * @return Parameter[]
	 */
	public function getParameters(): array
	{
		return $this->parameters;
	}


	public function getHeurekaCpc(): ?string
	{
		return $this->heurekaCpc;
	}


	public function setHeurekaCpc(?string $heurekaCpc): self
	{
		$this->heurekaCpc = $heurekaCpc;

		return $this;
	}


	public function getStatus(): ?bool
	{
		return $this->status;
	}


	public function setStatus(bool $status): self
	{
		$this->status = $status;

		return $this;
	}


	public function getName(): ?string
	{
		return $this->name;
	}


	public function setName(?string $name): self
	{
		$this->name = $name;

		return $this;
	}


	public function getNameExt(): ?string
	{
		return $this->nameExt;
	}


	public function setNameExt(?string $nameExt): self
	{
		$this->nameExt = $nameExt;

		return $this;
	}


	public function getDescriptionShort(): ?string
	{
		return $this->descriptionShort;
	}


	public function setDescriptionShort(?string $descriptionShort): self
	{
		$this->descriptionShort = $descriptionShort;

		return $this;
	}


	public function getTitle(): ?string
	{
		return $this->title;
	}


	public function setTitle(?string $title): self
	{
		$this->title = $title;

		return $this;
	}


	public function getMetaDescription(): ?string
	{
		return $this->metaDescription;
	}


	public function setMetaDescription(?string $metaDescription): self
	{
		$this->metaDescription = $metaDescription;

		return $this;
	}


	public function getMetaKeywords(): ?string
	{
		return $this->metaKeywords;
	}


	public function setMetaKeywords(?string $metaKeywords): self
	{
		$this->metaKeywords = $metaKeywords;

		return $this;
	}


	public function getParts(): ?string
	{
		return $this->parts;
	}


	public function setParts(?string $parts): self
	{
		$this->parts = $parts;

		return $this;
	}


	public function getPriceOriginal(): ?float
	{
		return $this->priceOriginal;
	}


	public function setPriceOriginal(?float $priceOriginal): self
	{
		$this->priceOriginal = $priceOriginal;

		return $this;
	}


	public function getSoldQty(): ?int
	{
		return $this->soldQty;
	}


	public function setSoldQty(?int $soldQty): self
	{
		$this->soldQty = $soldQty;

		return $this;
	}


	public function getDefaultCategory(): ?string
	{
		return $this->defaultCategory;
	}


	public function setDefaultCategory(?string $defaultCategory): self
	{
		$this->defaultCategory = $defaultCategory;

		return $this;
	}


	public function getWeight(): ?float
	{
		return $this->weight;
	}


	public function setWeight(?float $weight): self
	{
		$this->weight = $weight;

		return $this;
	}


	public function getCost(): ?float
	{
		return $this->cost;
	}


	public function setCost(?float $cost): self
	{
		$this->cost = $cost;

		return $this;
	}


	public function getMargin(): ?float
	{
		return $this->margin;
	}


	public function setMargin(?float $margin): self
	{
		$this->margin = $margin;

		return $this;
	}


	public function getFreeDelivery(): ?bool
	{
		return $this->freeDelivery;
	}


	public function setFreeDelivery(?bool $freeDelivery): self
	{
		$this->freeDelivery = $freeDelivery;

		return $this;
	}


	public function getModel(): ?string
	{
		return $this->model;
	}


	public function setModel(?string $model): self
	{
		$this->model = $model;

		return $this;
	}


	public function isInSale(): ?bool
	{
		return $this->inSale;
	}


	public function setInSale(bool $inSale): self
	{
		$this->inSale = $inSale;

		return $this;
	}


	public function isArchived(): bool
	{
		return $this->archived;
	}


	public function setArchived(bool $archived): self
	{
		$this->archived = $archived;

		return $this;
	}


	public function getMinQuantity(): ?int
	{
		return $this->minQuantity;
	}


	public function setMinQuantity(?int $minQuantity): self
	{
		$this->minQuantity = $minQuantity;

		return $this;
	}


	public function getMaxQuantity(): ?int
	{
		return $this->maxQuantity;
	}


	public function setMaxQuantity(?int $maxQuantity): self
	{
		$this->maxQuantity = $maxQuantity;

		return $this;
	}


	public function getGuarantee(): ?string
	{
		return $this->guarantee;
	}


	public function setGuarantee(?string $guarantee): self
	{
		$this->guarantee = $guarantee;

		return $this;
	}


	public function getUnit(): ?string
	{
		return $this->unit;
	}


	public function setUnit(?string $unit): self
	{
		$this->unit = $unit;

		return $this;
	}


	public function getAvailability(): ?string
	{
		return $this->availability;
	}


	public function setAvailability(?string $availability): self
	{
		$this->availability = $availability;

		return $this;
	}


	public function getVat(): ?string
	{
		return $this->vat;
	}


	public function setVat(?string $vat): self
	{
		$this->vat = $vat;

		return $this;
	}


	public function getStock(): ?int
	{
		return $this->stock;
	}


	public function setStock(?int $stock): self
	{
		$this->stock = $stock;

		return $this;
	}


	public function getPriceNoVat(): float
	{
		return $this->priceNoVat;
	}


	public function setPriceNoVat(float $priceNoVat): self
	{
		$this->priceNoVat = $priceNoVat;

		return $this;
	}


	public function getSku(): ?string
	{
		return $this->sku;
	}


	public function setSku(?string $sku): self
	{
		$this->sku = $sku;

		return $this;
	}


	/**
	 * @return string[]|null
	 */
	public function getSuppliers(): ?array
	{
		return $this->suppliers;
	}


	public function addSupplier(string $supplier): self
	{
		$this->suppliers[] = $supplier;

		return $this;
	}
}
