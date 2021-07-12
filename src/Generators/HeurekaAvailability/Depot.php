<?php

declare(strict_types=1);

namespace Mk\Feed\Generators\HeurekaAvailability;


class Depot
{
	protected \DateTime $orderDeadline;

	protected \DateTime $orderDeliveryTime;

	private string $id;

	private int $stock;


	public function __construct(string $id, int $stock, \DateTime $orderDeadline, \DateTime $orderDeliveryTime)
	{
		$this->id = $id;
		$this->stock = $stock;
		$this->orderDeadline = $orderDeadline;
		$this->orderDeliveryTime = $orderDeliveryTime;
	}


	public function getId(): string
	{
		return $this->id;
	}


	public function getStock(): int
	{
		return $this->stock;
	}


	public function getOrderDeadline(): \DateTime
	{
		return $this->orderDeadline;
	}


	public function setOrderDeadline(\DateTime $orderDeadline): Depot
	{
		$this->orderDeadline = $orderDeadline;

		return $this;
	}


	public function getOrderDeliveryTime(): \DateTime
	{
		return $this->orderDeliveryTime;
	}


	public function setOrderDeliveryTime(\DateTime $orderDeliveryTime): Depot
	{
		$this->orderDeliveryTime = $orderDeliveryTime;

		return $this;
	}
}
