<?php

declare(strict_types=1);

namespace Mk\Feed\Generators\Shoptet;


class Variant
{
	/** @var Parameter[] */
	protected array $parameters = [];

	protected ?string $vat;

	protected ?float $weight;

	protected ?float $priceVat;

	protected ?string $availability;

	private ?string $code;


	public function getCode(): ?string
	{
		return $this->code;
	}


	public function setCode(?string $code): self
	{
		$this->code = $code;

		return $this;
	}


	/**
	 * @return Parameter[]
	 */
	public function getParameters(): array
	{
		return $this->parameters;
	}


	/**
	 * @param Parameter[] $parameters
	 * @return self
	 */
	public function setParameters(array $parameters): self
	{
		$this->parameters = $parameters;

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


	public function getWeight(): ?float
	{
		return $this->weight;
	}


	public function setWeight(?float $weight): self
	{
		$this->weight = $weight;

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


	public function getAvailability(): ?string
	{
		return $this->availability;
	}


	public function setAvailability(?string $availability): self
	{
		$this->availability = $availability;

		return $this;
	}


	public function addParameter(string $name, $val): self
	{
		$this->parameters[] = new Parameter($name, $val);

		return $this;
	}
}
