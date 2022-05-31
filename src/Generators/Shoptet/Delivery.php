<?php

declare(strict_types=1);

namespace Mk\Feed\Generators\Shoptet;


class Delivery
{
	public const CESKA_POSTA = 'CESKA_POSTA',
		CESKA_POSTA_NA_POSTU = 'CESKA_POSTA_NA_POSTU',
		CESKA_POSTA_DOPORUCENA_ZASILKA = 'CESKA_POSTA_DOPORUCENA_ZASILKA',
		CSAD_LOGISTIK_OSTRAVA = 'CSAD_LOGISTIK_OSTRAVA',
		DPD = 'DPD',
		DHL = 'DHL',
		DSV = 'DSV',
		EMS = 'EMS',
		FOFR = 'FOFR',
		GEBRUDER_WEISS = 'GEBRUDER_WEISS',
		GEIS = 'GEIS',
		GENERAL_PARCEL = 'GENERAL_PARCEL',
		GLS = 'GLS',
		HDS = 'HDS',
		HEUREKAPOINT = 'HEUREKAPOINT',
		INTIME = 'INTIME',
		PPL = 'PPL',
		RADIALKA = 'RADIALKA',
		SEEGMULLER = 'SEEGMULLER',
		TNT = 'TNT',
		TOPTRANS = 'TOPTRANS',
		UPS = 'UPS',
		ULOZENKA = 'ULOZENKA',
		VLASTNI_PREPRAVA = 'VLASTNI_PREPRAVA',
		ZASILKOVNA = 'ZASILKOVNA',
		SLOVENSKA_POSTA = 'SLOVENSKA_POSTA';


	private static array $ids = [
		self::CESKA_POSTA,
		self::CESKA_POSTA_NA_POSTU,
		self::CESKA_POSTA_DOPORUCENA_ZASILKA,
		self::CSAD_LOGISTIK_OSTRAVA,
		self::DPD,
		self::DHL,
		self::DSV,
		self::EMS,
		self::FOFR,
		self::GEBRUDER_WEISS,
		self::GEIS,
		self::GENERAL_PARCEL,
		self::GLS,
		self::HDS,
		self::HEUREKAPOINT,
		self::INTIME,
		self::PPL,
		self::RADIALKA,
		self::SEEGMULLER,
		self::TNT,
		self::TOPTRANS,
		self::UPS,
		self::ULOZENKA,
		self::VLASTNI_PREPRAVA,
		self::ZASILKOVNA,
		self::SLOVENSKA_POSTA,
	];

	private string $id;

	private float $price;

	private ?float $priceCod;


	public function __construct(string $id, float $price, ?float $priceCod = null)
	{
		if (in_array($id, self::$ids, true) === false) {
			throw new \InvalidArgumentException('Delivery "' . $id . '" does not exist.');
		}
		$this->id = $id;
		$this->price = $price;
		$this->priceCod = $priceCod;
	}


	public function getId(): string
	{
		return $this->id;
	}


	public function getPrice(): float
	{
		return $this->price;
	}


	public function getPriceCod(): ?float
	{
		return $this->priceCod;
	}
}
