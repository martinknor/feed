<?php

namespace Mk\Feed\Generators\Zbozi;

use Mk;
use Nette;

/**
 * Class ExtraMessage
 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\Generators\Zbozi
 */
class CategoryText {

    /* Použití smartobject viz php 7.2 to nette 2.4 */
    use \Nette\SmartObject;

    /** @var string */
    protected $text;

    /**
     * ExtraMessage constructor.
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
