<?php

declare(strict_types=1);

namespace Mk\Feed\Generators\Zbozi;


final class ExtraMessage
{
	public const EXTENDED_WARRANTY = 'extended_warranty';

	public const FREE_ACCESSORIES = 'free_accessories';

	public const FREE_CASE = 'free_case';

	public const FREE_DELIVERY = 'free_delivery';

	public const FREE_GIFT = 'free_gift';

	public const FREE_INSTALLATION = 'free_installation';

	public const FREE_STORE_PICKUP = 'free_store_pickup';

	public const VOUCHER = 'voucher';

	/** @var string[] */
	private static array $types = [
		self::EXTENDED_WARRANTY,
		self::FREE_ACCESSORIES,
		self::FREE_CASE,
		self::FREE_DELIVERY,
		self::FREE_GIFT,
		self::FREE_INSTALLATION,
		self::FREE_STORE_PICKUP,
		self::VOUCHER,
	];

	private string $type;


	public function __construct(string $type)
	{
		if (in_array($type, self::$types, true) === false) {
			throw new \InvalidArgumentException('Extra message with type "' . $type . '" does not exist.');
		}
		$this->type = $type;
	}


	public function getType(): string
	{
		return $this->type;
	}
}
