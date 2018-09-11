<?php

namespace Mk\Feed\Generators\Zbozi;

use Mk;
use Nette;

/**
 * Class ExtraMessage
 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\Generators\Zbozi
 */
class ExtraMessage {
    /* Použití smartobject viz php 7.2 to nette 2.4 */
    use \Nette\SmartObject;

    CONST EXTENDED_WARRANTY = 'extended_warranty',
        FREE_ACCESSORIES = 'free_accessories',
        FREE_CASE = 'free_case',
        FREE_DELIVERY = 'free_delivery',
        FREE_GIFT = 'free_gift',
        FREE_INSTALLATION = 'free_installation',
        FREE_STORE_PICKUP = 'free_store_pickup',
        VOUCHER = 'voucher';

    static $types = array(
        self::EXTENDED_WARRANTY,
        self::FREE_ACCESSORIES,
        self::FREE_CASE,
        self::FREE_DELIVERY,
        self::FREE_GIFT,
        self::FREE_INSTALLATION,
        self::FREE_STORE_PICKUP,
        self::VOUCHER,
    );

    /** @var string */
    protected $type;

    /**
     * ExtraMessage constructor.
     * @param $type
     */
    public function __construct($type)
    {
        if (!in_array($type, self::$types)) {
            throw new \InvalidArgumentException("Extra message with type $type doesn\t exist");
        }
        $this->type = (string)$type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

}
