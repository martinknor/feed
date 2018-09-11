<?php

namespace Mk\Feed\Generators\Google;

use Mk;
use Nette;

/**
 * Class ProductType
 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\Generators\Google
 */
class ProductType {

    /* Použití smartobject viz php 7.2 to nette 2.4 */
    use \Nette\SmartObject;

    /** @var string */
    protected $text;

    /**
     * ProductType constructor.
     * @param $text
     */
    public function __construct($text)
    {
       
        $this->text = (string)$text;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

}
